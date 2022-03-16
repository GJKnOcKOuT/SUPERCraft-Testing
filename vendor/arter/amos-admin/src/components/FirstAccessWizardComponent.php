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
 * @package    arter\amos\admin\components
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

namespace arter\amos\admin\components;

use arter\amos\admin\AmosAdmin;
use arter\amos\admin\models\UserProfile;
//use yii\base\BootstrapInterface;
use yii\base\Component;

//use yii\base\Event;

/**
 * Class FirstAccessWizardComponent
 * @package arter\amos\admin\components
 */
class FirstAccessWizardComponent extends Component /* implements BootstrapInterface */
{

    /**
     * @param string $moduleClassName
     */
    public function showWizard($moduleClassName = null)
    {
        /** @var \arter\amos\core\user\User $loggedUser */
        $loggedUser        = \Yii::$app->getUser()->identity;
        /** @var \arter\amos\admin\models\UserProfile $loggedUserProfile */
        $loggedUserProfile = $loggedUser->getProfile();
        $adminModule       = \Yii::$app->getModule(AmosAdmin::getModuleName());
        if (!$loggedUserProfile->validato_almeno_una_volta && ($loggedUserProfile->status == UserProfile::USERPROFILE_WORKFLOW_STATUS_DRAFT)
            && !in_array($loggedUser->email, $adminModule->excludeWizardByMails)) {
            if (is_null($moduleClassName)) {
                $moduleClassName = AmosAdmin::className();
            }
            /** @var \arter\amos\core\module\AmosModule $moduleClassName */
            return \Yii::$app->controller->redirect(['/'.$moduleClassName::getModuleName().'/first-access-wizard/introduction',
                    'id' => $loggedUser->profile->id]);
        }
        return null;
    }

    /**
     * @param null $moduleClassName
     * @return null|\yii\web\Response
     */
    public function showMessageCompleteProfile($moduleClassName = null)
    {

        /** @var \arter\amos\core\user\User $loggedUser */
        $loggedUser        = \Yii::$app->getUser()->identity;
        /** @var \arter\amos\admin\models\UserProfile $loggedUserProfile */
        $loggedUserProfile = $loggedUser->getProfile();
        if (!$loggedUserProfile->validato_almeno_una_volta && ($loggedUserProfile->status == UserProfile::USERPROFILE_WORKFLOW_STATUS_DRAFT)) {
            if (is_null($moduleClassName)) {
                $moduleClassName = AmosAdmin::className();
            }
            /** @var \arter\amos\core\module\AmosModule $moduleClassName */
            return \Yii::$app->controller->redirect(['/'.$moduleClassName::getModuleName().'/user-profile/complete-profile']);
        }
        return null;
    }

    /**
     * @param $url
     * @return \yii\web\Response
     */
    public function redirectToUrl($url)
    {
        return \Yii::$app->controller->redirect($url);
    }
//    /**
//     * @param \yii\web\Application $app
//     */
//    public function bootstrap($app)
//    {
//        Event::on(\yii\web\User::className(), \yii\web\User::EVENT_AFTER_LOGIN, [new FirstAccessWizardComponent(), 'showWizard']);
//    }
}