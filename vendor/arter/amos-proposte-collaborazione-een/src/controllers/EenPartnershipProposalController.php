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
 * @package    arter\amos\een\controllers
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

namespace arter\amos\een\controllers;

use arter\amos\core\controllers\CrudController;
use arter\amos\core\helpers\Html;
use arter\amos\core\icons\AmosIcons;
use arter\amos\core\user\User;
use arter\amos\core\utilities\Email;
use arter\amos\cwh\AmosCwh;
use arter\amos\dashboard\controllers\TabDashboardControllerTrait;
use arter\amos\een\AmosEen;
use arter\amos\een\assets\ProposteCollaborazioneEenAsset;
use arter\amos\een\models\EenPartnershipProposal;
use arter\amos\een\models\InfoReqModel;
use arter\amos\een\models\ProposalForm;
use arter\amos\een\models\search\EenPartnershipProposalSearch;
use arter\amos\een\utility\EenMailUtility;
use arter\amos\een\widgets\icons\WidgetIconEenDashboard;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/**
 * Class EenPartnershipProposalController
 * @package arter\amos\een\controllers
 */
class EenPartnershipProposalController extends CrudController
{
    /**
     * Trait used for initialize the news dashboard
     */
    use TabDashboardControllerTrait;

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $behaviors = ArrayHelper::merge(parent::behaviors(), [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => [
                            'own-interest',
                            'send-interest',
                            'archived',
                            'create-proposal'
                        ],
                        'roles' => ['EEN_READER']
                    ],
                ],

            ],
        ]);
        return $behaviors;
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->initDashboardTrait();

        $this->setModelObj(new EenPartnershipProposal());
        $this->setModelSearch(new EenPartnershipProposalSearch());

        ProposteCollaborazioneEenAsset::register(Yii::$app->view);

        $this->setAvailableViews([
            'list' => [
                'name' => 'list',
                'label' => AmosEen::t('amoseen',
                    '{iconaLista}' . Html::tag('p', AmosEen::tHtml('amoseen', 'Lista')), [
                        'iconaLista' => AmosIcons::show('view-list')
                    ]),
                'url' => '?currentView=list'
            ],
            'grid' => [
                'name' => 'grid',
                'label' => AmosEen::t('amoseen',
                    '{iconaTabella}' . Html::tag('p', AmosEen::tHtml('amoseen', 'Tabella')), [
                        'iconaTabella' => AmosIcons::show('view-list-alt')
                    ]),
                'url' => '?currentView=grid'
            ],
            /*'icon' => [
                'name' => 'icon',
                'label' => T::tApp('{iconaElenco}'.Html::tag('p','Icone'), [
                    'iconaElenco' => AmosIcons::show('grid')
                ]),
                'url' => '?currentView=icon'
            ],
            'map' => [
                'name' => 'map',
                'label' => T::tApp('{iconaMappa}'.Html::tag('p','Mappa'), [
                    'iconaMappa' => AmosIcons::show('map')
                ]),
                'url' => '?currentView=map'
            ],
            'calendar' => [
                'name' => 'calendar',
                'intestazione' => '', //codice HTML per l'intestazione che verr?? caricato prima del calendario,
                                      //per esempio si pu?? inserire una funzione $model->getHtmlIntestazione() creata ad hoc
                'label' => T::tApp('{iconaCalendario}'.Html::tag('p','Calendario'), [
                    'iconaMappa' => AmosIcons::show('calendar')
                ]),
                'url' => '?currentView=calendar'
            ],*/
        ]);

        parent::init();
    }

    /**
     * Lists all ProposteDiCollaborazioneEen models.
     * @return mixed
     */
    public function actionIndex($layout = null)
    {
        Url::remember();
        $this->setUpLayout('list');
        $this->view->params['currentDashboard'] = $this->getCurrentDashboard();

        $this->setTitleAndBreadcrumbs(AmosEen::t('amoseen', 'Tutte le Proposte een'));

        $this->setIndexParams();

        $this->setDataProvider($this->getModelSearch()->searchAll(\Yii::$app->request->getQueryParams()));
        
        if ($layout) {
            $this->setUpLayout($layout);
        }
        return $this->render('index', [
            'dataProvider' => $this->getDataProvider(),
            'model' => $this->getModelSearch(),
            'currentView' => $this->getCurrentView(),
            'availableViews' => $this->getAvailableViews(),
            'url' => ($this->url) ? $this->url : NULL,
            'parametro' => ($this->parametro) ? $this->parametro : NULL,
            'countryTypes' => $this->getModel()->getCountryTypes()
        ]);
    }

    /**
     * Displays a single ProposteDiCollaborazioneEen model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', ['model' => $this->findModel($id)]);
    }

    /**
     * Action for search all news.
     *
     * @return string
     */
    public function actionOwnInterest($currentView = null)
    {
        Url::remember();

        if (empty($currentView)) {
            $currentView = 'list';
        }
        $this->setDataProvider($this->getModelSearch()->searchOwnInterest(\Yii::$app->request->getQueryParams()));

        $this->setUpLayout('list');

        $this->view->params['currentDashboard'] = $this->getCurrentDashboard();

        $this->setIndexParams();

        $this->setTitleAndBreadcrumbs(AmosEen::t('amoseen', 'Proposte een di mio interesse index'));

        $this->setCurrentView($this->getAvailableView($currentView));

        return $this->render('index', [
            'dataProvider' => $this->getDataProvider(),
            'model' => $this->getModelSearch(),
            'currentView' => $this->getCurrentView(),
            'availableViews' => $this->getAvailableViews(),
            'url' => ($this->url) ? $this->url : null,
            'parametro' => ($this->parametro) ? $this->parametro : null,
            'countryTypes' => $this->getModel()->getCountryTypes()

        ]);
    }

    /**
     * Action for search archived proposal.
     *
     * @return string
     */
    public function actionArchived($currentView = null)
    {
        Url::remember();

        if (empty($currentView)) {
            $currentView = 'list';
        }
        $this->setDataProvider($this->getModelSearch()->searchArchived(\Yii::$app->request->getQueryParams()));

        $this->setUpLayout('list');
        $this->view->params['currentDashboard'] = $this->getCurrentDashboard();
        $this->setIndexParams();

        $this->setTitleAndBreadcrumbs(AmosEen::t('amoseen', 'Proposte een archiviate'));
        $this->setCurrentView($this->getAvailableView($currentView));


        return $this->render('index', [
            'dataProvider' => $this->getDataProvider(),
            'model' => $this->getModelSearch(),
            'currentView' => $this->getCurrentView(),
            'availableViews' => $this->getAvailableViews(),
            'url' => ($this->url) ? $this->url : null,
            'parametro' => ($this->parametro) ? $this->parametro : null,
            'countryTypes' => $this->getModel()->getCountryTypes()
        ]);
    }

    /**
     * Used for set page title and breadcrumbs.
     * @param string $eenPageTitle News page title (ie. Created by news, ...)
     */
    private function setTitleAndBreadcrumbs($eenPageTitle)
    {
        $this->setNetworkDashboardBreadcrumb();
        \Yii::$app->session->set('previousTitle', $eenPageTitle);
        \Yii::$app->session->set('previousUrl', Url::previous());
        \Yii::$app->view->title = $eenPageTitle;
        \Yii::$app->view->params['breadcrumbs'][] = ['label' => $eenPageTitle];
    }


    public function setNetworkDashboardBreadcrumb()
    {
        /** @var AmosCwh $moduleCwh */
        $moduleCwh = \Yii::$app->getModule('cwh');
        $scope = null;
        if (!empty($moduleCwh)) {
            $scope = $moduleCwh->getCwhScope();
        }
        if (!empty($scope)) {
            if (isset($scope['community'])) {
                $communityId = $scope['community'];
                $community = \arter\amos\community\models\Community::findOne($communityId);
                $dashboardCommunityTitle = AmosEen::t('amosnews', "Dashboard") . ' ' . $community->name;
                $dasbboardCommunityUrl = \Yii::$app->urlManager->createUrl(['community/join', 'id' => $communityId]);
                \Yii::$app->view->params['breadcrumbs'][] = [
                    'label' => $dashboardCommunityTitle,
                    'url' => $dasbboardCommunityUrl
                ];
            }
        }
    }


    /**
     * @param null $currentView
     * @return string
     */
    public function actionSendInterest($currentView = null)
    {

        $post = Yii::$app->request->post();
        if ($post) {
            $model = new InfoReqModel($post['InfoReqModel']);
            $een = EenPartnershipProposal::find()->andWhere(['id' => $model->een])->one();
            $from = '';
            if (isset(Yii::$app->params['email-assistenza'])) {
                //use default platform email assistance
                $from = Yii::$app->params['email-assistenza'];
            }
            $bcc = [Yii::$app->user->getIdentity()->email];
            $module = AmosEen::instance();
            $to = [$module->mailToSendInterest];
            $content = $this->renderPartial("/email/inforeq", ['model' => $een, 'inforeq' => $model]);
            Email::sendMail(
                $from,
                $to,
                AmosEen::t('amoseen', '#mailsubject') . ' ' . $een->reference_external,
                $content, [], $bcc
            );
        }

        return $this->render('sendemail');
    }

    /**
     * This method is useful to set all common params for all list views.
     */
    protected function setIndexParams()
    {
        $this->view->params['currentDashboard'] = $this->getCurrentDashboard();
        $this->child_of = WidgetIconEenDashboard::className();

    }

    /**
     * @return string
     */
    public function actionCreateProposal(){
        $model = new ProposalForm();
        $model->user_id = \Yii::$app->user->id;

        if(\Yii::$app->request->post() && $model->load(\Yii::$app->request->post())){
            $user = User::findOne(\Yii::$app->user->id);
            $ok = EenMailUtility::sendEmailProposalRequest($model, $user);
            if($ok){
                \Yii::$app->session->addFlash('success', "Proposta inviata correttamente");
                return $this->redirect('index');
            }
            //send email
        }
        return $this->render('create_proposal', ['model' => $model]);
    }

}