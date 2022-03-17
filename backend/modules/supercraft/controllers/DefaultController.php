<?php
/**
 * Copyright 2020 Art-ER S. Cons. P.A.
 * EROI - Emilia Romagna Open Innovation is based on:
 * https://www.open2.0.regione.lombardia.it
 *
 * @package    backend\modules\tickets\controllers
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

namespace backend\modules\supercraft\controllers;

use arter\amos\core\controllers\BaseController;
use arter\amos\dashboard\controllers\TabDashboardControllerTrait;
use yii\filters\AccessControl;
use yii\filters\AccessRule;
use yii\filters\VerbFilter;
use backend\modules\tickets\models\Menu;


/**
 * Class DefaultController
 * @package backend\modules\supercraft\controllers
 */
class DefaultController extends BaseController
{
    use TabDashboardControllerTrait;

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => [
                    'class' => AccessRule::className(),
                ],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => [
                            'index',
                            'captcha'

                        ],
                        //'roles' => ['@']
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post', 'get']
                ]
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->initDashboardTrait();
        $this->setModelObj(new Menu());
        parent::init();
        $this->setUpLayout('main');
    }


    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

}



