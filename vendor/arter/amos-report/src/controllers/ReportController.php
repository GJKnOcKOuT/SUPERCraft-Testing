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
 * @package    arter\amos\report\controllers
 * @category   Controller
 * @author     Elite Division S.r.l.
 */

namespace arter\amos\report\controllers;

use arter\amos\core\controllers\CrudController;
use arter\amos\core\helpers\Html;
use arter\amos\core\icons\AmosIcons;
use arter\amos\core\user\User;
use arter\amos\core\utilities\Email;
use arter\amos\notificationmanager\models\NotificationsRead;
use arter\amos\report\AmosReport;
use arter\amos\report\models\Report;
use arter\amos\report\models\search\ReportSearch;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/**
 * Class ReportController
 * @package arter\amos\report\controllers
 */
class ReportController extends CrudController
{
    /**
     * @var string $layout
     */
    public $layout = 'list';

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->setModelObj(new Report());
        $this->setModelSearch(new  ReportSearch());

        $this->setAvailableViews([
            'grid' => [
                'name' => 'grid',
                'label' => AmosReport::t('amosreport', '{iconaTabella}' . Html::tag('p', AmosReport::t('amosreport', 'Tabella')), [
                    'iconaTabella' => AmosIcons::show('view-list-alt')
                ]),
                'url' => '?currentView=grid'
            ]
        ]);

        parent::init();
        $this->setUpLayout();
    }

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
                            'index',
                            'read-confirmation'
                        ],
                        'roles' => ['REPORT_ADMINISTRATOR', 'REPORT_CONTRIBUTOR', 'REPORT_MODERATOR']
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
        return $behaviors;
    }

    /**
     * @return string
     * @throws \yii\base\InvalidConfigException
     */
    public function actionCreate()
    {
        $this->setUpLayout('form');
        $model = new Report;
        if (Yii::$app->request->isAjax) {
            if ($model->load(Yii::$app->request->post())) {
                if ($model->validate()) {
                    if ($model->save()) {
                        $this->sendReportNotification($model);
                        $message = '<p>' . AmosReport::t("amosreport", "Your report has been correctly sent.") . '</p>' .
                            '<div class="form-group"><div class="bk-btnFormContainer">' .
                            Html::button(AmosReport::t('amosreport', 'Close'), ['class' => 'btn btn-secondary pull-right', 'data-dismiss' => 'modal']) . '<br/>' .
                            '</div></div>';
                        $retVal = [
                            'success' => 1,
                            'message' => $message
                        ];
                        return json_encode($retVal);
                    }
                } else {
                    return json_encode([]);
                }
            } else {
                $message = '<p>' . AmosReport::t("amosreport", "Error occured while creating the report. Please, try again later.") . '</p>' .
                    '<div class="form-group"><div class="bk-btnFormContainer">' .
                    Html::button(AmosReport::t('amosreport', 'Close'), ['class' => 'btn btn-secondary pull-right', 'data-dismiss' => 'modal']) . '<br/>' .
                    '</div></div>';
                $retVal = [
                    'success' => 0,
                    'message' => $message
                ];
                return json_encode($retVal);
            }
        }
    }

    /**
     * @param null $id
     * @return \yii\web\Response
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\web\NotFoundHttpException
     */
    public function actionReadConfirmation($id = null)
    {
        if (Yii::$app->request->isAjax) {
            $post = Yii::$app->request->post();
            if (!empty($post['report_id'])) {
                $id = $post['report_id'];
                $model = $this->findModel($id);
                $read_by = \Yii::$app->user->id;
                $ok = true;
                if (!empty($post['notification_id'])) {
                    $notificationRead = new \arter\amos\notificationmanager\models\NotificationsRead();
                    $notificationRead->user_id = $read_by;
                    $notificationRead->notification_id = $post['notification_id'];
                    $ok = $notificationRead->save(false);
                }
                $model->read_at = date('Y-m-d H:i:s');
                $model->read_by = $read_by;
                $model->status = 1;
                $ok = $ok && $model->save();

                if ($ok) {
                    $message = '<p>' . AmosReport::t("amosreport", "The report has been correctly updated.") . '</p>' .
                        '<div class="form-group"><div class="bk-btnFormContainer">' .
                        Html::button(AmosReport::t('amosreport', 'Close'), ['class' => 'btn btn-secondary pull-right', 'data-dismiss' => 'modal']) . '<br/>' .
                        '</div></div>';
                    $retVal = [
                        'success' => 1,
                        'message' => $message
                    ];
                    return json_encode($retVal);
                }
            }
        } else {
            $ok = false;
            if (!empty($id)) {
                $model = $this->findModel($id);
                $read_by = \Yii::$app->user->id;
                $ok = true;
                $notification = \arter\amos\notificationmanager\models\Notification::findOne([
                    'class_name' => Report::className(),
                    'content_id' => $model->id,
                ]);
                if (!empty($notification)) {
                    $notificationRead = new NotificationsRead();
                    $notificationRead->user_id = $read_by;
                    $notificationRead->notification_id = $notification->id;
                    $ok = $notificationRead->save(false);
                }
                $model->read_at = date('Y-m-d H:i:s');
                $model->read_by = $read_by;
                $model->status = 1;
                $ok = $ok && $model->save();
            }

            if ($ok) {
                Yii::$app->getSession()->addFlash('success', AmosReport::t('amosreport', 'The report has been correctly updated.'));
            } else {
                Yii::$app->getSession()->addFlash('danger', AmosReport::t('amosreport', 'Error occurred while updating the report'));
            }
            return $this->redirect(Url::previous());
        }
    }

    /**
     * Used for set page title and breadcrumbs.
     * @param string $reportTitle News page title (ie. Created by , ...)
     */
    private function setTitleAndBreadcrumbs($reportTitle)
    {
        Yii::$app->session->set('previousTitle', $reportTitle);
        Yii::$app->session->set('previousUrl', Url::previous());
        Yii::$app->view->title = $reportTitle;
        Yii::$app->view->params['breadcrumbs'][] = ['label' => $reportTitle];
    }

    /**
     * Set a view param used in \arter\amos\core\forms\CreateNewButtonWidget
     */
    private function setCreateNewBtnLabel()
    {
        Yii::$app->view->params['createNewBtnParams'] = [
            'createNewBtnLabel' => 'Add report'
        ];
    }

    /**
     * Action for search all news.
     *
     * @return string
     */
    public function actionIndex($layout = NULL, $currentView = 'grid')
    {
        Url::remember();

        if (empty($currentView)) {
            $currentView = 'grid';
        }

        $this->setDataProvider($this->getModelSearch()->searchAll(Yii::$app->request->getQueryParams()));
        $this->setTitleAndBreadcrumbs(AmosReport::t('amosreport', 'All reports'));
        $this->setCreateNewBtnLabel();
        $this->setCurrentView($this->getAvailableView($currentView));

        $this->setUpLayout('list');
        $this->view->params['currentDashboard'] = $this->getCurrentDashboard();

        return $this->render('index', [
            'dataProvider' => $this->getDataProvider(),
            'model' => $this->getModelSearch(),
            'currentView' => $this->getCurrentView(),
            'availableViews' => $this->getAvailableViews(),
            'url' => ($this->url) ? $this->url : NULL,
            'parametro' => ($this->parametro) ? $this->parametro : NULL
        ]);
    }

    /**
     * @param Report $model
     */
    public function sendReportNotification($model)
    {
        $className = $model->classname;
        $contentModel = $className::findOne($model->context_id);
        $contentCreatorId = $contentModel->created_by;
        $contentCreator = User::findOne($contentCreatorId);

        //update model with content creator information
        $model->creator_id = $contentCreatorId;
        $contentValidator = null;
        if (!is_null($contentModel->getBehavior('workflowLog')) && $contentModel->hasMethod('getValidatedStatus')) {
            $validatorId = $contentModel->getStatusLastUpdateUser($contentModel->getValidatedStatus());
            //update model with content validator information
            $model->validator_id = $validatorId;
            if (!is_null($validatorId)) {
                $contentValidator = User::findOne($validatorId);
            }
        }

        //save the model with creator and/or validator info
        $model->save();

        if (!is_null($contentCreator)) {
            //send mail to content creator
            $tos = [$contentCreator->email];

            // check for model type report monitor role to send a mail copy
            // if exists a role 'MODELNAME_REPORT_MONITOR' (same syntax of 'MODELNAME_CREATOR' standard permission)
            $roleName = strtoupper($contentModel->formName()). '_' . 'REPORT_MONITOR';
            $roleExists = false;
            if(Yii::$app->authManager->getRole($roleName)) {
                $roleExists = true;
                $reportMonitorIds = Yii::$app->authManager->getUserIdsByRole($roleName);
                if (count($reportMonitorIds)) {
                    foreach ($reportMonitorIds as $reportMonitorId) {
                        $reportMonitor = User::findOne($reportMonitorId);
                        if ($reportMonitor) {
                            $email = $reportMonitor->email;
                            if ($email) {
                                $tos = ArrayHelper::merge($tos, [$email]);
                            }
                        }
                    }
                }
            }

            // add validators to mail to mail recipients if model report monitor role not exists
            if(!is_null($contentValidator) && !$roleExists){
                if($contentValidator->id != $contentCreator->id) {
                    $tos[] = $contentValidator->email;
                }
            }

            $reportCreatorProfile = User::findOne($model->created_by)->getProfile();
            $reportCreatorName = $reportCreatorProfile->getNomeCognome();

            /** @var CrudController $controller */
            $controller = \Yii::$app->controller;
            $moduleReport = \Yii::$app->getModule(AmosReport::getModuleName());
            if($moduleReport){
                $contentView = $moduleReport->htmlMailContent;
                $contentViewSubject = $moduleReport->htmlMailSubject;

            }
            else {
                $contentView = "@vendor/arter/amos-report/src/views/report/email/report_notification";
                $contentViewSubject = $contentView . "_subject";
            }

            $subject = $controller->renderMailPartial($contentViewSubject, [
                'reportCreatorName' => $reportCreatorName,
                'contentModel' => $contentModel
            ]);

            $text = $controller->renderMailPartial($contentView, [
                'reportCreatorProfile' => $reportCreatorProfile,
                'report' => $model,
                'contentModel' => $contentModel,
            ]);

            try {
                $this->sendMail(null, $tos, $subject, $text);
            } catch (\Exception $ex) {
                Yii::getLogger()->log($ex->getMessage(), \yii\log\Logger::LEVEL_ERROR);
            }
        }
    }

    /**
     * @param string $from
     * @param array $tos
     * @param string $subject
     * @param string $text
     * @param array $files
     * @param array $bcc
     */
    public function sendMail($from, $tos, $subject, $text, $files = [], $bcc = [])
    {
        /** @var \arter\amos\emailmanager\AmosEmail $mailModule */
        $mailModule = Yii::$app->getModule("email");
        if (isset($mailModule)) {
            if (is_null($from)) {
                if (isset(Yii::$app->params['email-assistenza'])) {
                    //use default platform email assistance
                    $from = Yii::$app->params['email-assistenza'];
                } else {
                    $from = 'assistenza@arter.it';
                }
            }
            Email::sendMail($from, $tos, $subject, $text, $files, $bcc, [], 0, false);
        }
    }

    /**
     * @param null $layout
     * @return bool
     */
    public function setUpLayout($layout = null)
    {
        if ($layout === false) {
            $this->layout = false;
            return true;
        }
        $module = \Yii::$app->getModule('layout');
        if (empty($module)) {
            $this->layout = '@vendor/arter/amos-core/views/layouts/' . (!empty($layout) ? $layout : $this->layout);
            return true;
        }
        $this->layout = (!empty($layout)) ? $layout : $this->layout;
        return true;
    }
}
