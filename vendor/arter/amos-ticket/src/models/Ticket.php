<?php
/**
 * Copyright 2020 Art-ER S. Cons. P.A.
 * EROI - Emilia Romagna Open Innovation is based on:
 * https://www.open2.0.regione.lombardia.it
 *
 * @see http://example.com Developers'community
 * @license GPLv3
 * @license https://opensource.org/licenses/gpl-3.0.html GNU General Public License version 3
 *
 * @package    arter\amos\ticket\models
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

namespace arter\amos\ticket\models;

use arter\amos\admin\AmosAdmin;
use arter\amos\admin\models\UserProfile;
use arter\amos\attachments\behaviors\FileBehavior;
use arter\amos\comments\models\Comment;
use arter\amos\comments\models\CommentInterface;
use arter\amos\core\interfaces\ModelLabelsInterface;
use arter\amos\core\interfaces\ViewModelInterface;
use arter\amos\core\record\Record;
use arter\amos\workflow\behaviors\WorkflowLogFunctionsBehavior;
use arter\amos\ticket\AmosTicket;
use arter\amos\ticket\i18n\grammar\TicketGrammar;
use arter\amos\ticket\utility\EmailUtil;
use arter\amos\ticket\utility\TicketUtility;
use raoul2000\workflow\base\SimpleWorkflowBehavior;
use Yii;
use yii\base\Event;
use yii\db\ActiveQuery;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/**
 * Class Ticket
 * This is the model class for table "ticket".
 *
 * @property string $firstOpeningDate
 * @property \arter\amos\admin\models\UserProfile $ticketReferee
 * @property TicketCategorie $forwardCategory
 * @property string $ticketClosingDate
 * @property \arter\amos\admin\models\UserProfile $ticketClosingReferee
 * @property \arter\amos\admin\models\UserProfile $closedUserProfile
 *
 * @package arter\amos\ticket\models
 */
class Ticket extends \arter\amos\ticket\models\base\Ticket implements CommentInterface, ModelLabelsInterface, ViewModelInterface
{
    // Workflow ID
    const TICKET_WORKFLOW = 'TicketWorkflow';

    // Workflow states IDS
    const TICKET_WORKFLOW_STATUS_WAITING = 'TicketWorkflow/WAITING';
    const TICKET_WORKFLOW_STATUS_PROCESSING = 'TicketWorkflow/PROCESSING';
    const TICKET_WORKFLOW_STATUS_CLOSED = 'TicketWorkflow/CLOSED';
    const PARTNERSHIP_TYPE_ORGANIZATION = 'organization';
    const PARTNERSHIP_TYPE_HEADQUARTER = 'headquarter';

    public $closed_at_from;
    public $closed_at_to;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        if ($this->isNewRecord) {
            $this->status = $this->getWorkflowSource()->getWorkflow(self::TICKET_WORKFLOW)->getInitialStatusId();
        }

        $this->on('afterChangeStatusFrom{' . self::TICKET_WORKFLOW_STATUS_WAITING . '}to{' . self::TICKET_WORKFLOW_STATUS_PROCESSING . '}', [$this, 'goingFromWaitingToProcessing']);
        $this->on('afterChangeStatusFrom{' . self::TICKET_WORKFLOW_STATUS_PROCESSING . '}to{' . self::TICKET_WORKFLOW_STATUS_CLOSED . '}', [$this, 'goingFromProcessingToClosed']);
        $this->on('afterEnterStatus{' . self::TICKET_WORKFLOW_STATUS_WAITING . '}', [$this, 'goingToWaiting']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return ArrayHelper::merge(
            parent::rules(),
            [
                [['ticketOrganization'], 'safe'],
            ]
        );
    }

    /**
     * @return string
     */
    public function getTicketOrganization()
    {
        return ($this->partnership_id ? ($this->partnership_type . '-' . $this->partnership_id) : '');
    }

    /**
     * @param string $ticketOrganization
     */
    public function setTicketOrganization($ticketOrganization)
    {
        if (!empty($ticketOrganization)) {
            list(
                $this->partnership_type,
                $this->partnership_id
                ) = explode('-', $ticketOrganization);
        }
    }

    /**
     * Azioni di creazione ticket: ?? stato creato dall'operatore o ?? stato inoltrato da altri
     * Pu?? essere un ticket di una categoria tecnica
     *
     * @param Event $event an instance of raoul2000\workflow\events\WorkflowEvent
     */
    public function goingToWaiting($event)
    {
        $categoria = TicketCategorie::findOne($this->ticket_categoria_id);
        $partnershipMsg = '';
        if ($this->partnership_id) {
            $partnership = $this->partnership;
            if (!is_null($partnership)) {
                $partnershipMsg = $this->getAttributeLabel('partnership_id') . ': ' . $partnership->name;
            }
        }

        if ($categoria->tecnica) {
            EmailUtil::sendEmailCategoriaTecnica($this, $categoria, $partnershipMsg);
            EmailUtil::sendEmailTecnicaOperatore($this);
        } elseif ($this->forwarded_from_id) {
            if ($this->forward_notify) {
                EmailUtil::sendEmailForwardReferenti($this, $partnershipMsg);
            }
            EmailUtil::sendEmailForwardOperatore($this, $partnershipMsg);
        } else {
            EmailUtil::sendEmailNewTicketReferenti($this, $categoria, $partnershipMsg);
        }
    }

    /**
     * Azioni di presa in carico
     *
     * @param Event $event an instance of raoul2000\workflow\events\WorkflowEvent
     */
    public function goingFromWaitingToProcessing($event)
    {
    }

    /**
     * Azioni di chiusura: ?? stato chiuso definitivamente
     * Se viene inoltrato o ?? di una categoria tecnica la mail l'email di chiusura
     * non va mandata. Viene gi?? stata mandata un altro tipo di email
     *
     * @param Event $event
     * @throws \ReflectionException
     * @throws \yii\base\InvalidConfigException
     */
    public function goingFromProcessingToClosed($event)
    {
        if (!$this->ticketCategoria->tecnica) {
            $partnershipMsg = '';
            if ($this->partnership_id) {
                $partnership = $this->partnership;
                if (!is_null($partnership)) {
                    $partnershipMsg = $this->getAttributeLabel('partnership_id') . ': ' . $partnership->name;
                }
            }

            $model_ticket_forwarded_to = Ticket::find()->andWhere(['forwarded_from_id' => $this->id])->one();
            if (empty($model_ticket_forwarded_to)) {
                EmailUtil::sendEmailChiusuraOperatore($this, $partnershipMsg);
            }
        }
    }

    /**
     * @inheritdoc
     */
    public function isCommentable()
    {
        return ($this->status != self::TICKET_WORKFLOW_STATUS_CLOSED);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTicketComments()
    {
        return $this->hasMany(
            \arter\amos\comments\models\Comment::className(),
            ['context_id' => 'id']
        )
            ->andWhere(['context' => \arter\amos\ticket\models\Ticket::className()]);
    }

    /**
     * @return ActiveQuery
     */
    public function getLastComments()
    {
        return $this->hasOne(
            \arter\amos\comments\models\Comment::className(),
            ['context_id' => 'id']
        )
            ->andWhere(['context' => \arter\amos\ticket\models\Ticket::className()])
            ->orderBy(['created_at' => SORT_DESC])
            ->limit(3);
    }

    /**
     * @param \arter\amos\comments\models\Comment $comment
     * @return ActiveQuery
     */
    public function getCommentCreatorUser(Comment $comment)
    {
        return $comment->getCreatedUserProfile();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClosedUserProfile()
    {
        $modelClass = \arter\amos\admin\AmosAdmin::instance()->createModel('UserProfile');
        return $this->hasOne($modelClass::className(), ['user_id' => 'closed_by']);
    }

    /**
     * Il primo commento che non ?? del creatore del ticket
     *
     * @return Record
     */
    public function getFirstAnswer()
    {
        return $this->hasOne(\arter\amos\comments\models\Comment::className(), ['context_id' => 'id'])
            ->andWhere(['context' => \arter\amos\ticket\models\Ticket::className()])
            ->andWhere(['<>', 'created_by', $this->created_by])
            ->orderBy(['created_at' => SORT_ASC])->limit(1)
            ->one();
    }

    /**
     * L'ultimo commento che non ?? del creatore del ticket
     *
     * @return Record
     */
    public function getLastAnswer()
    {
        return $this->hasOne(\arter\amos\comments\models\Comment::className(), ['context_id' => 'id'])
            ->andWhere(['context' => \arter\amos\ticket\models\Ticket::className()])
            ->andWhere(['<>', 'created_by', $this->created_by])
            ->orderBy(['created_at' => SORT_DESC])
            ->limit(1)
            ->one();
    }

    /**
     * La lista dei responsabili del ticket
     *
     * @param bool $alsoAdmin
     * @return array
     * @throws \yii\base\InvalidConfigException
     */
    public function getReferenti($alsoAdmin = true/* , $print = false */)
    {
        return TicketUtility::getReferenti($this->ticket_categoria_id, $alsoAdmin/* , $print */);
    }

    /**
     * Torna true se l'utente $user_id ?? uno dei referenti del ticket
     *
     * @param int $user_id
     * @param bool $alsoAdmin
     * @return bool
     * @throws \yii\base\InvalidConfigException
     */
    public function isReferente($user_id, $alsoAdmin = true/* , $print = false */)
    {
        $referenti = $this->getReferenti($alsoAdmin/* , $print */);
        foreach ($referenti as $referente) {
            if ($referente->user_id == $user_id) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return array
     */
    public function getStatusToRenderToHide()
    {
        $statusToRender = [
            //self::TICKET_WORKFLOW_STATUS_PROCESSING => AmosTicket::t('amosticket', 'Modifica in corsoooo'),
        ];

        $hideDraftStatus = [];
        //$hideDraftStatus[] = self::TICKET_WORKFLOW_STATUS_WAITING;
        //$hideDraftStatus[] = self::TICKET_WORKFLOW_STATUS_CLOSED;
        return ['statusToRender' => $statusToRender, 'hideDraftStatus' => $hideDraftStatus];
    }

    /**
     * Visibile se ?? l'antenato di un ticket visibile (per ora solo un livello)
     * @param null $user
     * @return bool
     * @throws \yii\base\InvalidConfigException
     */
    public function isAncestorVisible($user = null)
    {
        if (!$user) {
            $user = Yii::$app->getUser();
        }

        $model_ticket_forwarded_to = self::find()
            ->andWhere(['forwarded_from_id' => $this->id])
            ->one();
        if (!is_null($model_ticket_forwarded_to)) {
            return $user->can('TICKET_READ', ['model' => $model_ticket_forwarded_to]);
        }

        return false;
    }

    /**
     * E' l'antenato di un ticket
     * @return bool
     * @throws \yii\base\InvalidConfigException
     */
    public function isAncestor()
    {
        $model_ticket_forwarded_to = self::find()->andWhere(['forwarded_from_id' => $this->id])->one();

        return !is_null($model_ticket_forwarded_to);
    }

    /** @var \arter\amos\comments\AmosComments $commentModule * /
     * $count_comments = $commentModule->countComments($this);
     * }
     * $panels = ArrayHelper::merge($panels,
     * StatsToolbarPanels::getCommentsPanel($this, $count_comments, $disableLink));
     * }
     * } catch (\Exception $ex) {
     * Yii::getLogger()->log($ex->getMessage(), Logger::LEVEL_ERROR);
     * }
     * return $panels;
     * }
     */
    /**
     * @inheritdoc ContentModelInterface
     * public function getGridViewColumns()
     * {
     * return [
     * 'titolo' => [
     * 'attribute' => 'titolo',
     * 'headerOptions' => [
     * 'id' => AmosTicket::t('amosticket', 'titolo'),
     * ],
     * 'contentOptions' => [
     * 'headers' => AmosTicket::t('amosticket', 'titolo'),
     * ],
     * ],
     * 'created_by' => [
     * 'attribute' => 'createdUserProfile',
     * 'headerOptions' => [
     * 'id' => AmosTicket::t('amosticket', 'creato da'),
     * ],
     * 'contentOptions' => [
     * 'headers' => AmosTicket::t('amosticket', 'creato da'),
     * ]
     * ],
     * 'created_at' => [
     * 'attribute' => 'created_at',
     * 'format' => 'date',
     * 'headerOptions' => [
     * 'id' => AmosTicket::t('amosticket', 'data apertura'),
     * ],
     * 'contentOptions' => [
     * 'headers' => AmosTicket::t('amosticket', 'data apertura'),
     * ]
     * ],
     * ];
     * }
     */
    /**
     * @inheritdoc ContentModelInterface
     * public function getPublicatedFrom()
     * {
     * return $this->created_at;
     * }
     */
    /**
     * @inheritdoc ContentModelInterface
     * public function getPublicatedAt()
     * {
     * return $this->deleted_at;
     * }
     */
    /**
     * @inheritdoc ContentModelInterface
     * This is the relation between the category and the parent category.
     * Return an ActiveQuery related to TicketCategorie model.
     *
     * @return \yii\db\ActiveQuery
     * public function getCategory()
     * {
     * return $this->hasOne(\arter\amos\ticket\models\TicketCategorie::className(), ['id' => 'ticket_categoria_id']);
     * }
     *
     *
     * public function getPluginWidgetClassname()
     * {
     * return WidgetIconTicketDashboard::className();
     * }
     */

    /**
     * @inheritdoc
     */
    public function representingColumn()
    {
        return ['titolo'];
    }

    /**
     *
     * @return type
     */
    public function attributeHints()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::className(),
                    'rules' => [
                        [
                            'allow' => true,
                            'actions' => [
                                'faq-ticket',
                                'own-waiting-ticket',
                                'own-processed-ticket',
                                'own-closed-ticket',
                            ],
                            'roles' => ['OPERATORE_TICKET']
                        ],
                        [
                            'allow' => true,
                            'actions' => [
                                'faq-ticket',
                                'own-waiting-ticket',
                                'own-processed-ticket',
                                'own-closed-ticket',
                            ],
                            'roles' => ['REFERENTE_TICKET', 'AMMINISTRATORE_TICKET']
                        ],
                    ]
                ],
                'fileBehavior' => [
                    'class' => FileBehavior::className()
                ],
                'workflow' => [
                    'class' => SimpleWorkflowBehavior::className(),
                    'defaultWorkflowId' => self::TICKET_WORKFLOW,
                    'propagateErrorsToModel' => true
                ],
                'WorkflowLogFunctionsBehavior' => [
                    'class' => WorkflowLogFunctionsBehavior::className(),
                ],
            ]
        );
    }

    /**
     * Returns the text hint for the specified attribute.
     *
     * @param string $attribute the attribute name
     * @return string the attribute hint
     * @see attributeHints
     */
    public function getAttributeHint($attribute)
    {
        $hints = $this->attributeHints();

        return isset($hints[$attribute]) ? $hints[$attribute] : null;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(),
            [
                'closed_at_from' => 'Da closed_at',
                'closed_at_to' => 'A  closed_at',
                'ticketOrganization' => AmosTicket::t('amosticket', '#ticket_organization'),
            ]
        );
    }

    /**
     *
     * @return type
     */
    public static function getEditFields()
    {
        $labels = self::attributeLabels();

        return [
            [
                'slug' => 'titolo',
                'label' => $labels['titolo'],
                'type' => 'text'
            ],
            [
                'slug' => 'status',
                'label' => $labels['status'],
                'type' => 'string'
            ],
            [
                'slug' => 'closed_by',
                'label' => $labels['closed_by'],
                'type' => 'integer'
            ],
            [
                'slug' => 'closed_at',
                'label' => $labels['closed_at'],
                'type' => 'date'
            ],
            [
                'slug' => 'ticket_categoria_id',
                'label' => $labels['ticket_categoria_id'],
                'type' => 'integer'
            ],
            [
                'slug' => 'version',
                'label' => $labels['version'],
                'type' => 'integer'
            ],
        ];
    }

    /**
     * @return string
     * @var \arter\amos\comments\models\Comment $firstAnswer
     *
     */
    public function getFirstOpeningDate()
    {
        $firstAnswer = $this->getFirstAnswer();

        return (!is_null($firstAnswer) ? $firstAnswer->created_at : '');
    }

    /**
     * @return UserProfile
     * @var \arter\amos\comments\models\Comment $lastAnswer
     *
     */
    public function getTicketReferee()
    {
        $lastAnswer = $this->getLastAnswer();

        return (!is_null($lastAnswer) ? $lastAnswer->createdUserProfile : null);
    }

    /**
     * @return TicketCategorie|null
     */
    public function getForwardCategory()
    {
        return $this->forwarded_from_id
            ? $this->ticketCategoria
            : null;
    }

    /**
     * @return string
     */
    public function getTicketClosingDate()
    {
        $closingDateTime = $this->getStatusLastUpdateTime(self::TICKET_WORKFLOW_STATUS_CLOSED);

        return !is_null($closingDateTime)
            ? $closingDateTime
            : '';
    }

    /**
     * @return UserProfile|null
     */
    public function getTicketClosingReferee()
    {
        $closingUserId = $this->getStatusLastUpdateUser(self::TICKET_WORKFLOW_STATUS_CLOSED);
        if (!is_null($closingUserId)) {
            /** @var UserProfile $userProfile */
            $userProfile = AmosAdmin::instance()->createModel('UserProfile');
            $closingUserProfile = $userProfile::findOne(['user_id' => $closingUserId]);

            return $closingUserProfile;
        }

        return null;
    }

    /**
     * @return TicketGrammar
     */
    public function getGrammar()
    {
        return new TicketGrammar();
    }

    /**
     * @inheritdoc
     */
    public function getViewUrl()
    {
        return 'ticket/ticket/view';
    }

    /**
     * @inheritdoc
     */
    public function getFullViewUrl()
    {
        return Url::toRoute(["/" . $this->getViewUrl(), "id" => $this->id]);
    }

    /**
     * @inheritdoc
     */
    public function getWorkflowStatusLabel()
    {
        return AmosTicket::t('amosticket', parent::getWorkflowStatusLabel());
    }
}
