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
 * @package    arter\amos\organizzazioni\controllers
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

namespace arter\amos\organizzazioni\controllers;

use arter\amos\admin\AmosAdmin;
use arter\amos\admin\models\UserProfile;
use arter\amos\community\models\CommunityUserMm;
use arter\amos\core\forms\editors\m2mWidget\controllers\M2MWidgetControllerTrait;
use arter\amos\core\forms\editors\m2mWidget\M2MEventsEnum;
use arter\amos\core\module\BaseAmosModule;
use arter\amos\core\record\Record;
use arter\amos\core\user\User;
use arter\amos\organizzazioni\models\Profilo;
use arter\amos\organizzazioni\models\ProfiloUserMm;
use arter\amos\organizzazioni\Module;
use arter\amos\organizzazioni\utility\EmailUtility;
use arter\amos\organizzazioni\utility\OrganizzazioniUtility;
use Yii;
use yii\base\Event;
use yii\db\ActiveQuery;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\ForbiddenHttpException;

/**
 * Class ProfiloController
 * This is the class for controller "ProfiloController".
 * @package arter\amos\organizzazioni\controllers
 */
class ProfiloController extends base\ProfiloController
{
    /**
     * M2MWidgetControllerTrait
     */
    use M2MWidgetControllerTrait;

    protected $defaultAssociaM2mStatus = '';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        /** @var ProfiloUserMm $profiloUserMmModel */
        $profiloUserMmModel = $this->organizzazioniModule->createModel('ProfiloUserMm');
        $this->defaultAssociaM2mStatus = $profiloUserMmModel::STATUS_INVITE_IN_PROGRESS;

        $this->setMmTableName($this->organizzazioniModule->model('ProfiloUserMm'));
        $this->setStartObjClassName($this->organizzazioniModule->model('Profilo'));
        $this->setMmStartKey('profilo_id');
        $this->setTargetObjClassName(AmosAdmin::instance()->createModel('UserProfile')->className());
        $this->setMmTargetKey('user_id');
        $this->setRedirectAction('update');
        $this->setModuleClassName(Module::className());
        $this->setCustomQuery(true);
        $this->setTargetUrlInvitation('/invitations/invitation/index-all/');
        $this->setInvitationModule(Module::getModuleName());
        $this->on(M2MEventsEnum::EVENT_BEFORE_DELETE_M2M, [$this, 'beforeDeleteM2m']);
        $this->on(M2MEventsEnum::EVENT_AFTER_DELETE_M2M, [$this, 'afterDeleteM2m']);
        $this->on(M2MEventsEnum::EVENT_BEFORE_CANCEL_ASSOCIATE_M2M, [$this, 'beforeCancelAssociateM2m']);
        $this->on(M2MEventsEnum::EVENT_BEFORE_ASSOCIATE_M2M, [$this, 'beforeAssociateM2m']);
        $this->on(M2MEventsEnum::EVENT_AFTER_ASSOCIATE_M2M, [$this, 'afterAssociateM2m']);

        $this->setUpLayout('main');
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => [
                            'user-network',
                            'organization-employees',
                        ],
                        'roles' => ['PROFILO_READ']
                    ],
                    [
                        'allow' => true,
                        'actions' => [
                            'elimina-m2m',
                            'annulla-m2m',
                            'associate-organization-m2m',
                            'join-organization'
                        ],
                        'roles' => ['ASSOCIATE_PROFILO_TO_USER_PERMISSION']
                    ],
                    [
                        'allow' => true,
                        'actions' => [
                            'associate-organizations-to-project-m2m',
                            'associate-organizations-to-project-task-m2m',
                        ],
                        'roles' => ['@']
                    ],
                    [
                        'allow' => true,
                        'actions' => [
                            'change-user-role-area',
                            'create-community',
                            'organization-employees',
                        ],
                        'roles' => ['AMMINISTRATORE_ORGANIZZAZIONI', 'BASIC_USER']
                    ],
                    [
                        'allow' => true,
                        'actions' => [
                            'accept-user',
                            'reject-user',
                        ],
                        'roles' => ['AMMINISTRATORE_ORGANIZZAZIONI', 'CONFIRM_ORGANIZZAZIONI_OR_SEDI_USER_REQUEST']
                    ],
                    [
                        'allow' => true,
                        'actions' => [
                            'associa-m2m',
                        ],
                        'roles' => ['ADD_EMPLOYEE_TO_ORGANIZATION_PERMISSION']
                    ],
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post', 'get']
                ]
            ]
        ]);
    }

    /**
     * @param Profilo $model
     * @return ActiveQuery
     * @throws \yii\base\InvalidConfigException
     */
    public function getAssociaM2mQuery($model)
    {
        /** @var Module $organizzazioniModule */
        $organizzazioniModule = Module::instance();
        $inviteUserOfOrganizationParent = $organizzazioniModule->inviteUserOfOrganizationParent;
        $isSubOrganization = !empty($model->parent_id);

        /** @var ActiveQuery $query */
        $query = $model->getAssociationTargetQuery($model->id);
        $post = Yii::$app->request->post();
        if (isset($post['genericSearch']) && (strlen($post['genericSearch']) > 0)) {
            $userProfileTable = UserProfile::tableName();
            $query->andWhere(['or',
                ['like', $userProfileTable . '.cognome', $post['genericSearch']],
                ['like', $userProfileTable . '.nome', $post['genericSearch']],
                ['like', "CONCAT( " . $userProfileTable . ".nome , ' ', " . $userProfileTable . ".cognome )", $post['genericSearch']],
                ['like', "CONCAT( " . $userProfileTable . ".cognome , ' ', " . $userProfileTable . ".nome )", $post['genericSearch']],
                ['like', $userProfileTable . '.codice_fiscale', $post['genericSearch']],
                ['like', $userProfileTable . '.domicilio_indirizzo', $post['genericSearch']],
                ['like', $userProfileTable . '.indirizzo_residenza', $post['genericSearch']],
                ['like', $userProfileTable . '.domicilio_localita', $post['genericSearch']],
                ['like', $userProfileTable . '.domicilio_cap', $post['genericSearch']],
                ['like', $userProfileTable . '.cap_residenza', $post['genericSearch']],
                ['like', $userProfileTable . '.numero_civico_residenza', $post['genericSearch']],
                ['like', $userProfileTable . '.domicilio_civico', $post['genericSearch']],
                ['like', $userProfileTable . '.telefono', $post['genericSearch']],
                ['like', $userProfileTable . '.cellulare', $post['genericSearch']],
                ['like', $userProfileTable . '.email_pec', $post['genericSearch']],
            ]);
        }

        if ($inviteUserOfOrganizationParent && $isSubOrganization) {
            /** @var ProfiloUserMm $profiloUserMmModel */
            $profiloUserMmModel = $this->organizzazioniModule->createModel('ProfiloUserMm');
            $profiloUserMmTable = $profiloUserMmModel::tableName();
            $query->innerJoin($profiloUserMmTable, $profiloUserMmTable . '.user_id = ' . User::tableName() . '.id')
                ->andWhere([$profiloUserMmTable . '.profilo_id' => $model->parent_id])
                ->andWhere([$profiloUserMmTable . '.deleted_at' => null]);
        }

        return $query;
    }

    /**
     * @param Event $event
     */
    public function beforeAssociateM2m($event)
    {
        if (strstr(Yii::$app->controller->action->id, 'associa-m2m')) {
            $this->setTargetUrl('associa-m2m');
            $this->setMmTableAttributesDefault([
                'status' => $this->defaultAssociaM2mStatus,
            ]);
        }
    }

    /**
     * @param Event $event
     * @throws \yii\base\InvalidConfigException
     */
    public function afterAssociateM2m($event)
    {
        $urlPrevious = Url::previous();
        if (
            !strstr($urlPrevious, 'associate-organization-m2m') &&
            !strstr($urlPrevious, 'associate-organizations-to-project-m2m') &&
            !strstr($urlPrevious, 'associate-organizations-to-project-task-m2m')
        ) {
            $profiloId = Yii::$app->request->get('id');
            $userStatus = Yii::$app->request->get('userStatus');

            /** @var Profilo $profiloModel */
            $profiloModel = $this->organizzazioniModule->createModel('Profilo');

            /** @var ProfiloUserMm $profiloUserMmModel */
            $profiloUserMmModel = $this->organizzazioniModule->createModel('ProfiloUserMm');

            $profilo = $profiloModel::findOne($profiloId);
            $redirectUrl = ['/organizzazioni/profilo/update', 'id' => $profilo->id];

            $loggedUser = User::findOne(Yii::$app->getUser()->id);
            /** @var UserProfile $loggedUserProfile */
            $loggedUserProfile = $loggedUser->getProfile();

            $profiloUserMms = $profiloUserMmModel::find()->andWhere([
                'status' => $this->defaultAssociaM2mStatus,
                'profilo_id' => $profiloId
            ])->all();
            $userStatus = (!is_null($userStatus) ? $userStatus : $profiloUserMmModel::STATUS_WAITING_OK_USER);
            foreach ($profiloUserMms as $profiloUserMm) {
                /** @var ProfiloUserMm $profiloUserMm */
                $profiloUserMm->status = $userStatus;
                $profiloUserMm->save(false);
                $userToInvite = $profiloUserMm->user;
                $emailUtil = new EmailUtility(
                    EmailUtility::INVITATION,
                    $profiloUserMm->role,
                    $profilo,
                    $userToInvite->userProfile->nomeCognome,
                    $loggedUserProfile->nomeCognome,
                    null,
                    $userToInvite->id
                );
                $subject = $emailUtil->getSubject();
                $text = $emailUtil->getText();
                $emailUtil->sendMail(null, $userToInvite->email, $subject, $text, [], []);
            }

            $this->setRedirectArray($redirectUrl);
        }
    }

    /**
     * @param Event $event
     * @throws \yii\base\InvalidConfigException
     */
    public function beforeDeleteM2m($event)
    {
        $profiloId = Yii::$app->request->get('id');
        $userId = Yii::$app->request->get('targetId');

        /** @var Profilo $profiloModel */
        $profiloModel = $this->organizzazioniModule->createModel('Profilo');
        /** @var ProfiloUserMm $profiloUserMmModel */
        $profiloUserMmModel = $this->organizzazioniModule->createModel('ProfiloUserMm');

        /** @var Profilo $profilo */
        $profilo = $profiloModel::findOne($profiloId);

        /** @var ProfiloUserMm $profiloUserMmRow */
        $profiloUserMmRow = $profiloUserMmModel::findOne(['profilo_id' => $profiloId, 'user_id' => $userId]);

        // Remove all cwh permissions for domain = community
        $profilo->setCwhAuthAssignments($profiloUserMmRow, true);
    }

    /**
     * @param Event $event
     */
    public function afterDeleteM2m($event)
    {
        $this->setRedirectArray([Url::previous()]);
    }

    /**
     * @param Event $event
     */
    public function beforeCancelAssociateM2m($event)
    {
        $urlPrevious = Url::previous();
        $id = Yii::$app->request->get('id');

        if (strstr($urlPrevious, 'associate-organization-m2m')) {
            $this->setRedirectArray('/admin/user-profile/update?id=' . $id);
        }
        if (strstr($urlPrevious, 'associate-project-m2m')) {
            $this->setRedirectArray('/project_management/projects/update?id=' . $id . '#tab-organizations');
        }
    }

    /**
     * This method returns the query used in the organization-employees view
     * or OrganizationsMembersWidget to view organization employees.
     * @param Profilo $model
     * @param bool $isUpdate
     * @param array $showRoles
     * @return ActiveQuery
     * @throws \yii\base\InvalidConfigException
     */
    public function getOrganizationEmployeesQuery($model, $isUpdate, $showRoles = [])
    {
        return OrganizzazioniUtility::getOrganizationEmployeesQuery($model, $isUpdate, $showRoles, $this->organizzazioniModule);
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function actionAssociateOrganizationsToProjectM2m()
    {
        if (!empty(\Yii::$app->getModule('project_management'))) {
            $projectId = Yii::$app->request->get('id');
            Url::remember();

            $this->setMmTableName(\arter\amos\projectmanagement\models\ProjectsJoinedOrganizationsMm::className());
            $this->setStartObjClassName(\arter\amos\projectmanagement\models\Projects::className());
            $this->setMmStartKey('projects_id');
            $this->setTargetObjClassName($this->organizzazioniModule->model('Profilo'));
            $this->setMmTargetKey('organization_id');
            $this->setRedirectAction('/project_management/projects/update');
            $this->setOptions(['#' => 'tab-organizations']);
            $this->setTargetUrl('associa_organizations_to_project_m2m');
            $this->setCustomQuery(true);
            $this->setModuleClassName(Module::className());
            $this->setRedirectArray('/project_management/projects/update?id=' . $projectId . '#tab-organizations');
            return $this->actionAssociaM2m($projectId);
        } else {
            throw new \Exception(Module::t('organizations', 'The module project is not enabled'));
        }
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function actionAssociateOrganizationsToProjectTaskM2m()
    {
        if (!empty(\Yii::$app->getModule('project_management'))) {
            $projectTaskId = Yii::$app->request->get('id');
            Url::remember();

            $this->setMmTableName(\arter\amos\projectmanagement\models\ProjectsTasksJoinedOrganizationsMm::className());
            $this->setStartObjClassName(\arter\amos\projectmanagement\models\ProjectsTasks::className());
            $this->setMmStartKey('projects_tasks_id');
            $this->setTargetObjClassName($this->organizzazioniModule->model('Profilo'));
            $this->setMmTargetKey('organization_id');
            $this->setRedirectAction('/project_management/projects-tasks/update');
            $this->setOptions(['#' => 'tab-organizations']);
            $this->setTargetUrl('associa_organizations_to_project_task_m2m');
            $this->setCustomQuery(true);
            $this->setModuleClassName(Module::className());
            $this->setRedirectArray('/project_management/projects-tasks/update?id=' . $projectTaskId . '#tab-organizations');
            return $this->actionAssociaM2m($projectTaskId);
        } else {
            throw new \Exception(Module::t('organizations', 'The module project is not enabled'));
        }
    }

    /**
     * @param int $userId
     * @return ActiveQuery
     * @throws \yii\base\InvalidConfigException
     */
    public function getAssociateOrganizationM2mQuery($userId)
    {
        /** @var Profilo $organization */
        $organization = $this->organizzazioniModule->createModel('Profilo');
        /** @var ProfiloUserMm $modelProfiloUserMm */
        $modelProfiloUserMm = $this->organizzazioniModule->createModel('ProfiloUserMm');
        $profiloTable = $organization::tableName();
        $profiloUserMmTable = $modelProfiloUserMm::tableName();

        /** @var ActiveQuery $queryAssociated */
        $queryAssociated = $modelProfiloUserMm::find();
        $queryAssociated->select([$profiloUserMmTable . '.profilo_id']);
        $queryAssociated->andWhere([$profiloUserMmTable . '.user_id' => $userId]);
        $alreadyAssociatedOrganizationIds = $queryAssociated->column();

        $query = $organization->getUserNetworkAssociationQuery($userId);
        $query->andWhere(['not in', $profiloTable . '.id', $alreadyAssociatedOrganizationIds]);

        $post = Yii::$app->request->post();
        if (isset($post['genericSearch'])) {
            $query->andFilterWhere(['like', $profiloTable . '.name', $post['genericSearch']]);
        }

        return $query;
    }

    /**
     * @return mixed
     */
    public function actionAssociateOrganizationM2m()
    {
        /**
         * Questo ?? uno user profile id. Verificare nel widget UserNetworkWidgetOrganizzazioni
         * dove viene configurato l'M2MWidget il model che gli viene passato (?? uno UserProfile).
         * Verificare in M2MWidget il metodo renderToolbarMittente per capire come viene composto il link dell'associa btn.
         */
        $userProfileId = Yii::$app->request->get('id');
        Url::remember();

        $this->setMmTableName($this->organizzazioniModule->createModel('ProfiloUserMm')->className());
        $this->setStartObjClassName(User::className());
        $this->setMmStartKey('user_id');
        $this->setTargetObjClassName($this->organizzazioniModule->model('Profilo'));
        $this->setMmTargetKey('profilo_id');
        $this->setRedirectAction('update');
        $this->setTargetUrl('associate-organization-m2m');
        $this->setCustomQuery(true);
        $this->setRedirectArray('/admin/user-profile/update?id=' . $userProfileId . '#tab-network');
        /** @var UserProfile $userProfileModel */
        $userProfileModel = AmosAdmin::instance()->createModel('UserProfile');
        $userProfile = $userProfileModel::findOne($userProfileId);
        if (!is_null($userProfile)) {
            if (Yii::$app->user->can('ASSOCIATE_ORGANIZZAZIONI_TO_USER', ['model' => $userProfile])) {
                return $this->actionAssociaM2m($userProfile->user_id);
            } else {
                throw new ForbiddenHttpException(Yii::t('amoscore', 'Non sei autorizzato a visualizzare questa pagina'));
            }
        } else {
            Yii::$app->getSession()->addFlash('danger', Module::t('amosorganizzazioni', '#error_associate_organization_m2m_userprofile_not_found'));
        }
        return $this->actionAnnullaM2m($userProfile->user_id);
    }

    /**
     * @param int $organizationId
     * @param bool $accept
     * @param array|string|null $redirectAction
     * @return \yii\web\Response
     * @throws \ReflectionException
     * @throws \yii\base\InvalidConfigException
     */
    public function actionJoinOrganization($organizationId, $accept = false, $redirectAction = null)
    {
        $defaultAction = 'index';
        $ok = false;

        if (empty($redirectAction)) {
            $urlPrevious = Url::previous();
            $redirectAction = $urlPrevious;
        }
        if (!$organizationId) {
            Yii::$app->getSession()->addFlash('danger', Module::tHtml('amosorganizzazioni', "It is not possible to subscribe the user. Missing parameter organization."));
            return $this->redirect($defaultAction);
        }

        $nomeCognome = ' ';
        $organizationName = '';
        $userId = Yii::$app->request->get('userId');
        if (isset($userId) && ($userId > 0)) {
            $user = User::findOne($userId);
        } else {
            /** @var User $user */
            $user = Yii::$app->user->identity;
            $userId = $user->id;
        }
        $userProfile = $user->userProfile;
        if (!is_null($userProfile)) {
            $nomeCognome = "'" . $userProfile->nomeCognome . "'";
        }

        /** @var Profilo $profiloModel */
        $profiloModel = $this->organizzazioniModule->createModel('Profilo');
        $organization = $profiloModel::findOne($organizationId);
        if (!is_null($organization)) {
            $organizationName = "'" . $organization->name . "'";
        }
        /** @var ProfiloUserMm $profiloUserMm */
        $profiloUserMm = $this->organizzazioniModule->createModel('ProfiloUserMm');
        $userOrganization = $profiloUserMm::findOne(['profilo_id' => $organizationId, 'user_id' => $userId]);

        // Verify if the user is already in the organization user relation table
        if (is_null($userOrganization)) {
            $organizationRefereesIds = OrganizzazioniUtility::getOrganizationReferees($organizationId, true);
            if (in_array($userId, $organizationRefereesIds)) {
                // The user is a legal representative or a operative referee for the organization, then cannot be a member now.
                // In future modify this code if you want to enable the roles in MM table like communities (and remove this comment).
                Yii::$app->getSession()->addFlash('danger', Module::tHtml('amosorganizzazioni', '#join_organization_already_referee', [
                    'nomeCognome' => $nomeCognome,
                    'organizationName' => $organizationName
                ]));
                $action = (isset($redirectAction) ? $redirectAction : $defaultAction);
                return $this->redirect($action);
            } else {
                // Iscrivo l'utente all'organizzazione
                /** @var ProfiloUserMm $userOrganization */
                $userOrganization = $this->organizzazioniModule->createModel('ProfiloUserMm');
                $userOrganization->profilo_id = $organizationId;
                $userOrganization->user_id = $userId;
                if (!$this->organizzazioniModule->enableConfirmUsersJoinRequests) {
                    // If the confirm of an user that request to join an organization is disabled set directly the active status and do anything else.
                    $userOrganization->status = ProfiloUserMm::STATUS_ACTIVE;
                    $message = Module::tHtml('amosorganizzazioni', "You are now linked to the organization") . ' ' . $organizationName;
                } else {
                    // If the confirm of an user that request to join an organization is enabled set the request confirm status and send an email to the legal representative.
                    $userOrganization->status = ProfiloUserMm::STATUS_WAITING_REQUEST_CONFIRM;
                    $message = Module::tHtml('amosorganizzazioni', '#join_organization_request_forwarded_to_referees', [
                        'organizationName' => $organizationName
                    ]);
                    $emailUtil = new EmailUtility(
                        EmailUtility::REGISTRATION_REQUEST,
                        $userOrganization->role,
                        $organization,
                        $userProfile->nomeCognome,
                        '',
                        null,
                        $userProfile->user_id
                    );
                    $organizationRefereesEmails = $emailUtil->getOrganizationRefereesMailList($organizationId);
                    $subject = $emailUtil->getSubject();
                    $text = $emailUtil->getText();
                    foreach ($organizationRefereesEmails as $to) {
                        $emailUtil->sendMail(null, $to, $subject, $text, [], []);
                    }
                }
                $ok = $userOrganization->save(false);

                if ($ok) {
                    $organization->setCwhAuthAssignments($userOrganization);
                    Yii::$app->getSession()->addFlash('success', $message);
                    if (strpos($redirectAction, 'associate-organization-m2m') && !Yii::$app->user->can('ASSOCIATE_ORGANIZZAZIONI_TO_USER', ['model' => $userProfile])) {
                        $redirectAction = '/admin/user-profile/update?id=' . $userProfile->id . '#tab-network';
                    }
                    $action = (isset($redirectAction) ? $redirectAction : $defaultAction);
                    return $this->redirect($action);
                } else {
                    Yii::$app->getSession()->addFlash('danger', Module::tHtml('amosorganizzazioni', '#join_organization_error', [
                        'nomeCognome' => $nomeCognome,
                        'organizationName' => $organizationName
                    ]));
                    return $this->redirect($defaultAction);
                }
            }
        } else {
            if ($userOrganization->status == ProfiloUserMm::STATUS_WAITING_OK_USER) { // User has been invited and decide to accept or reject
                $profilo = $userOrganization->profilo;
                $invitedByUser = User::findOne(['id' => $userOrganization->created_by]);
                if ($accept) {
                    $message = Module::tHtml('amosorganizzazioni', "#join_organization_user_accept", ['organizationName' => $profilo->name]);
                    $userOrganization->status = ProfiloUserMm::STATUS_ACTIVE;
                    $ok = $userOrganization->save(false);

                    // Email to organization referees
                    $emailUtilToManager = new EmailUtility(
                        EmailUtility::ACCEPT_INVITATION,
                        $userOrganization->role,
                        $organization,
                        $userProfile->nomeCognome,
                        '',
                        null,
                        $userProfile->user_id
                    );
                    $subjectToManager = $emailUtilToManager->getSubject();
                    $textToManager = $emailUtilToManager->getText();
                    $emailUtilToManager->sendMail(null, $invitedByUser->email, $subjectToManager, $textToManager, [], []);

                    // Email to new organization member
                    $emailUtilToUser = new EmailUtility(
                        EmailUtility::WELCOME,
                        $userOrganization->role,
                        $organization,
                        $userProfile->nomeCognome,
                        '',
                        null,
                        $userProfile->user_id
                    );
                    $subjectToUser = $emailUtilToUser->getSubject();
                    $textToUser = $emailUtilToUser->getText();
                    $emailUtilToUser->sendMail(null, $user->email, $subjectToUser, $textToUser, [], []);
                } else {
                    $message = Module::tHtml('amosorganizzazioni', "#join_organization_user_reject", ['organizationName' => $profilo->name]);
                    $emailUtil = new EmailUtility(
                        EmailUtility::REJECT_INVITATION,
                        $userOrganization->role,
                        $organization,
                        $userProfile->nomeCognome,
                        '',
                        null,
                        $userProfile->user_id
                    );
                    $subject = $emailUtil->getSubject();
                    $text = $emailUtil->getText();
                    $userOrganization->status = ProfiloUserMm::STATUS_REJECTED;
                    $userOrganization->save(false);
                    $userOrganization->delete();
                    $ok = !$userOrganization->hasErrors();
                    $emailUtil->sendMail(null, $invitedByUser->email, $subject, $text, [], []);
                }
            } elseif ($userOrganization->status == ProfiloUserMm::STATUS_ACTIVE) {
                $this->addFlash('info', Module::tHtml('amosorganizzazioni', '#join_organization_user_already_joined', [
                    'nomeCognome' => $nomeCognome,
                    'organizationName' => $organizationName
                ]));
            } elseif ($userOrganization->status == ProfiloUserMm::STATUS_REJECTED) {
                $this->addFlash('info', Module::tHtml('amosorganizzazioni', '#join_organization_user_rejected', [
                    'nomeCognome' => $nomeCognome,
                    'organizationName' => $organizationName
                ]));
            } else {
                $this->addFlash('info', Module::tHtml('amosorganizzazioni', '#join_organization_user_already_joined', [
                    'nomeCognome' => $nomeCognome,
                    'organizationName' => $organizationName
                ]));
            }

            if ($ok) {
                $this->addFlash('success', $message);
                if (isset($redirectAction)) {
                    return $this->redirect($redirectAction);
                } else {
                    return $this->redirect($defaultAction);
                }
            } else {
                $this->addFlash('danger', Module::tHtml('amosorganizzazioni', "Error occured while subscribing the user") . $nomeCognome . Module::tHtml('amosorganizzazioni', "to community") . $communityName);
                return $this->redirect($defaultAction);
            }
        }
    }

    /**
     * Organization referees accepts the user membership request to an organization
     *
     * @param $profiloId
     * @param $userId
     * @return \yii\web\Response
     */
    public function actionAcceptUser($profiloId, $userId)
    {
        return $this->redirect($this->acceptOrRejectUser($profiloId, $userId, true));
    }

    /**
     * Organization referees rejects the user membership request to an organization
     *
     * @param int $profiloId
     * @param int $userId
     * @return \yii\web\Response
     */
    public function actionRejectUser($profiloId, $userId)
    {
        return $this->redirect($this->acceptOrRejectUser($profiloId, $userId, false));
    }

    /**
     * @param int $profiloId
     * @param int $userId
     * @param bool $acccept - true if User membership request has been accepted by organization referees, false if rejected
     * @return string
     */
    private function acceptOrRejectUser($profiloId, $userId, $acccept)
    {
        /** @var ProfiloUserMm $profiloUserMm */
        $profiloUserMm = $this->organizzazioniModule->createModel('ProfiloUserMm');
        $userOrganization = $profiloUserMm::findOne(['profilo_id' => $profiloId, 'user_id' => $userId]);
        $redirectUrl = '';

        if (!is_null($userOrganization)) {
            $refereeName = '';
            $nomeCognome = " ";
            $organizationName = '';
            $userOrganizationRole = $userOrganization->role;
            $redirectUrl = Url::previous();

            $user = User::findOne($userId);
            $userProfile = $user->userProfile;
            if (!is_null($userProfile)) {
                $nomeCognome = "'" . $userProfile->nomeCognome . "'";
            }

            /** @var Profilo $profiloModel */
            $profiloModel = $this->organizzazioniModule->createModel('Profilo');
            $organization = $profiloModel::findOne($profiloId);
            if (!is_null($organization)) {
                $organizationName = "'" . $organization->name . "'";
            }

            if ($acccept) {
                $emailType = EmailUtility::WELCOME;
                $userOrganization->status = $profiloUserMm::STATUS_ACTIVE;
                $userOrganization->save(false);
                $organization->setCwhAuthAssignments($userOrganization);
                $messagePlaceholder = '#join_organization_user_accepted';
            } else {
                $emailType = EmailUtility::REGISTRATION_REJECTED;
                $userOrganization->status = $profiloUserMm::STATUS_REJECTED;
                $userOrganization->save(false);
                $userOrganization->delete();
                /** @var User $loggedUser */
                $loggedUser = Yii::$app->user->identity;
                $loggedUserProfile = $loggedUser->userProfile;
                $refereeName = $loggedUserProfile->getNomeCognome();
                $messagePlaceholder = '#join_organization_user_rejected_successfully';
            }

            $emailUtil = new EmailUtility(
                $emailType,
                $userOrganizationRole,
                $organization,
                $userProfile->nomeCognome,
                $refereeName,
                null,
                $userProfile->user_id
            );
            $subject = $emailUtil->getSubject();
            $text = $emailUtil->getText();
            $emailUtil->sendMail(null, $user->email, $subject, $text, [], []);

            $message = Module::tHtml('amosorganizzazioni', $messagePlaceholder, [
                'nomeCognome' => $nomeCognome,
                'organizationName' => $organizationName
            ]);
            $this->addFlash('success', $message);
        }
        return $redirectUrl;
    }

    /**
     * @param int $userId
     * @param bool $isUpdate
     * @return string
     */
    public function actionUserNetwork($userId, $isUpdate = false)
    {
        if (\Yii::$app->request->isAjax) {
            $this->setUpLayout(false);

            return $this->render('user-network', [
                'userId' => $userId,
                'isUpdate' => $isUpdate
            ]);
        }
        return '';
    }

    /**
     * Employees of an organization m2m widget - Ajax call to redraw the widget
     *
     * @param int $id
     * @param string $classname
     * @param array $params
     * @return string
     * @throws \yii\base\InvalidConfigException
     */
    public function actionOrganizationEmployees($id, $classname, array $params)
    {
        if (\Yii::$app->request->isAjax) {
            $this->setUpLayout(false);

            /** @var Record $object */
            $object = \Yii::createObject($classname);
            $model = $object->findOne($id);
            $showAdditionalAssociateButton = $params['showAdditionalAssociateButton'];
            $viewEmail = $params['viewEmail'];
            $checkManagerRole = $params['checkManagerRole'];
            $addPermission = $params['addPermission'];
            $manageAttributesPermission = $params['manageAttributesPermission'];
            $forceActionColumns = $params['forceActionColumns'];
            $actionColumnsTemplate = $params['actionColumnsTemplate'];
            $viewM2MWidgetGenericSearch = $params['viewM2MWidgetGenericSearch'];
            $enableModal = $params['enableModal'];
            $gridId = $params['gridId'];
            $organizationManagerRoleName = $params['organizationManagerRoleName'];

            return $this->render('organization-employees', [
                'model' => $model,
                'showRoles' => isset($params['showRoles']) ? $params['showRoles'] : [],
                'showAdditionalAssociateButton' => $showAdditionalAssociateButton,
                'additionalColumns' => isset($params['additionalColumns']) ? $params['additionalColumns'] : [],
                'viewEmail' => $viewEmail,
                'checkManagerRole' => $checkManagerRole,
                'addPermission' => $addPermission,
                'manageAttributesPermission' => $manageAttributesPermission,
                'forceActionColumns' => $forceActionColumns,
                'actionColumnsTemplate' => $actionColumnsTemplate,
                'viewM2MWidgetGenericSearch' => $viewM2MWidgetGenericSearch,
                'targetUrlParams' => isset($params['targetUrlParams']) ? $params['targetUrlParams'] : [],
                'enableModal' => $enableModal,
                'gridId' => $gridId,
                'organizationManagerRoleName' => $organizationManagerRoleName,
            ]);
        }
        return null;
    }

    /**
     * @param int $profiloId
     * @param int $userId
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionChangeUserRoleArea($profiloId, $userId)
    {
        /** @var ProfiloUserMm $profiloUserMm */
        $profiloUserMm = $this->organizzazioniModule->createModel('ProfiloUserMm');
        $profiloUserMm = $profiloUserMm::findOne(['profilo_id' => $profiloId, 'user_id' => $userId]);
        /** @var UserProfile $userProfileModel */
        $userProfileModel = AmosAdmin::instance()->createModel('UserProfile');
        /** @var UserProfile $userProfile */
        $userProfile = $userProfileModel::findOne(['user_id' => $userId]);
        $this->model = $this->findModel($profiloId);

        if (Yii::$app->user->can('USERPROFILE_UPDATE', ['model' => $userProfile]) || Yii::$app->user->can('ADMIN') || Yii::$app->user->can('AMMINISTRATORE_ORGANIZZAZIONI')) {
            if (Yii::$app->getRequest()->isAjax && Yii::$app->request->isPost) {
                $post = Yii::$app->request->post();
                if (!is_null($profiloUserMm) && isset($post['user_profile_role']) && isset($post['user_profile_area'])) {
                    $profiloUserMm->user_profile_role_id = $post['user_profile_role'];
                    $profiloUserMm->user_profile_area_id = $post['user_profile_area'];
                    $ok = $profiloUserMm->save(false);
                    if ($ok) {
                        $profiloName = '';
                        if (!is_null($this->model)) {
                            $profiloName = $this->model->name;
                        }
                        $message = "'" . $userProfile->nomeCognome . "' " . Module::tHtml('amosorganizzazioni', 'is now') .
                            " " . $profiloUserMm->userProfileRole->name . " " .
                            Module::tHtml('amosorganizzazioni', 'of') . " '" . $profiloName . "'";
                        $this->addFlash('success', $message);
                    }
                }
            }
        } else {
            $this->addFlash('danger', BaseAmosModule::t('amoscore', '#unauthorized_flash_message'));
        }
    }

    /**
     * @param int|null $id Profilo Organizzazione id
     * @return \yii\web\Response
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionCreateCommunity($id = null)
    {
        Url::remember();

        /** @var Profilo $model */
        $model = $this->findModel($id);

        if (is_null($model->community_id)) {
            $managerStatus = CommunityUserMm::STATUS_ACTIVE;//$this->getManagerStatus($model, $oldAttributes);
            $ok = OrganizzazioniUtility::createCommunity($model, $managerStatus);

            if ($ok) {
                // If it's the first validation, check if the logged user is the same as the manager.
                // In that case set the manager in the active status.
                $managers = OrganizzazioniUtility::findOrganizzazioneManagers($model);

                foreach ($managers as $eventManager) {
                    /** @var CommunityUserMm $eventManager */
                    if (($eventManager->user_id == Yii::$app->getUser()->getId()) && ($eventManager->status != CommunityUserMm::STATUS_ACTIVE)) {
                        $eventManager->status = CommunityUserMm::STATUS_ACTIVE;
                        $eventManager->save();
                    }
                }
            }

            if ($model->save(false) && $ok) {
                Yii::$app->getSession()->addFlash('success', Module::t('amosorganizzazioni', '#community_create_success'));
            } else {
                Yii::$app->getSession()->addFlash('danger', Module::t('amosorganizzazioni', '#community_create_error'));
            }
        } else {
            Yii::$app->getSession()->addFlash('info', Module::t('amosorganizzazioni', '#community_create_already_exists'));
        }

        return $this->redirect($model->getFullViewUrl());
    }
}
