<?php
/**
 * Copyright 2020 Art-ER S. Cons. P.A.
 * EROI - Emilia Romagna Open Innovation is based on:
 * https://www.open2.0.regione.lombardia.it
 *
 * @see https://repo.art-er.it Developers' community
 * @license GPLv3
 * @license https://opensource.org/licenses/gpl-3.0.html GNU General Public License version 3
 *
 * @package    arter
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */


namespace arter\amos\mobile\bridge\modules\v1\controllers;

use arter\amos\admin\models\UserProfile;
use arter\amos\discussioni\models\search\DiscussioniTopicSearch;
use arter\amos\events\models\search\EventSearch;
use arter\amos\mobile\bridge\modules\v1\actions\entitydata\parsers\DiscussioniParser;
use arter\amos\mobile\bridge\modules\v1\actions\entitydata\parsers\EventParser;
use arter\amos\mobile\bridge\modules\v1\actions\entitydata\parsers\NewsParser;
use arter\amos\mobile\bridge\modules\v1\actions\entitydata\parsers\SondaggiParser;
use arter\amos\news\models\search\NewsSearch;
use arter\amos\notificationmanager\base\NotifyWidgetDoNothing;
use arter\amos\sondaggi\models\search\SondaggiSearch;
use Exception;
use Yii;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\StringHelper;
use yii\log\Logger;
use yii\rest\Controller;

class DashboardController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        $behaviours = parent::behaviors();
        unset($behaviours['authenticator']);

        return ArrayHelper::merge($behaviours, [
                    'authenticator' => [
                        'class' => CompositeAuth::className(),
                        'authMethods' => [
                            'bearerAuth' => [
                                'class' => HttpBearerAuth::className(),
                            ]
                        ],
                    ],
                    'verbFilter' => [
                        'class' => VerbFilter::className(),
                        'actions' => [
                            'current-user-profile' => ['get'],
                            'last-news' => ['get'],
                            'last-discussions' => ['get'],
                            'last-events' => ['get'],
                        ],
                    ],
        ]);
    }

    /**
     * 
     * @return array
     */
    public function actionCurrentUserProfile() {
        $userprofile = [];

        try {
            $userModel = \Yii::$app->user->identity->profile;
            if (!is_null($userModel)) {
                $userprofile = static::parseItem($userModel);
            }
        } catch (Exception $ex) {
            Yii::getLogger()->log($ex->getMessage(), Logger::LEVEL_ERROR);
        }

        return $userprofile;
    }

    /**
     * 
     * @param UserProfile $item
     * @return array
     */
    public static function parseItem($item) {
        $adminModule = Yii::$app->getModule('admin');
        if (!is_null($adminModule)) {
            //The base class name
            $baseClassName = StringHelper::basename($adminModule->model('UserProfile'));

            //Read permission name
            $readPremission = strtoupper($baseClassName . '_READ');

            //Edit permission name
            $editPremission = strtoupper($baseClassName . '_UPDATE');

            //Can user view element
            $canView = \Yii::$app->user->can($readPremission, ['model' => $item]);

            if ($canView) {
                //Define temp item
                $newItem = [];

                //Need id column
                $newItem['id'] = $item->id;

                //Get the list of description fields
                $newItem['representingColumn'] = $item->representingColumn();

                //Creator profile
                $owner = UserProfile::findOne(['id' => $item->created_by]);

                //Image
                $image = $item->userProfileImage;

                //Fill fields from item usable in app
                $newItem['fields'] = [
                    'nome' => $item->nome,
                    'cognome' => $item->cognome,
                    'codice_fiscale' => $item->codice_fiscale,
                    'sesso' => $item->sesso,
                    'presentazione_breve' => $item->presentazione_breve,
                    'presentazione_personale' => $item->presentazione_personale,
                    'nascita_data' => $item->nascita_data,
                    'privacy' => $item->privacy,
                    'indirizzo_residenza' => $item->indirizzo_residenza,
                    'cap_residenza' => $item->cap_residenza,
                    'numero_civico_residenza' => $item->numero_civico_residenza,
                    'created_at' => $item->created_at,
                    'created_by' => $item->created_by,
                    'comments_enabled' => true,
                    'owner' => [
                        'nome' => $owner->nome,
                        'cognome' => $owner->cognome,
                        'presentazione_breve' => $owner->presentazione_breve,
                        'avatarUrl' => $owner->avatarWebUrl,
                    ],
                    'userImageUrl' => $image ? \Yii::$app->getUrlManager()->createAbsoluteUrl($image->getWebUrl()) : null,
                ];

                //Remove id as is not needed
                unset($newItem['fields']['id']);

                //Can edit
                $newItem['canEdit'] = \Yii::$app->user->can($editPremission, ['model' => $item]);

                return $newItem;
            }
        }

        return [];
    }

    /**
     * 
     */
    public function actionLastNews() {
        $list = [];
        try {
            $search = new NewsSearch();
            $search->setNotifier(new NotifyWidgetDoNothing());
            $listaNews = $search->ultimeNews($_GET, 3)->getModels();
            foreach ($listaNews as $item) {
                $newItem = NewsParser::parseItem($item);
                if (!empty($newItem)) {
                    //Insert New Item
                    $list[] = $newItem;
                }
            }
        } catch (Exception $ex) {
            Yii::getLogger()->log($ex->getMessage(), Logger::LEVEL_ERROR);
        }
        return $list;
    }

    /**
     * 
     */
    public function actionLastDiscussions() {
        $list = [];
        try {
            $search = new DiscussioniTopicSearch();
            $search->setNotifier(new NotifyWidgetDoNothing());
            $listaDiscu = $search->ultimeDiscussioni($_GET, 3)->getModels();
            foreach ($listaDiscu as $item) {
                $newItem = DiscussioniParser::parseItem($item);
                if (!empty($newItem)) {
                    //Insert New Item
                    $list[] = $newItem;
                }
            }
        } catch (Exception $ex) {
            Yii::getLogger()->log($ex->getMessage(), Logger::LEVEL_ERROR);
        }
        return $list;
    }

    /**
     * 
     * @return array
     */
    public function actionLastEvents() {
        $list = [];
        try {
            $search = new EventSearch();
            $search->setNotifier(new NotifyWidgetDoNothing());
            $listaEvents = $search->searchAll($_GET, 3)->getModels();
            foreach ($listaEvents as $item) {
                $newItem = EventParser::parseItem($item);
                if (!empty($newItem)) {
                    //Insert New Item
                    $list[] = $newItem;
                }
            }
        } catch (Exception $ex) {
            Yii::getLogger()->log($ex->getMessage(), Logger::LEVEL_ERROR);
        }
        return $list;
    }

    /**
     * 
     * @return array
     */
    public function actionLastSondaggi() {
        $list = [];
        try {
            $search = new SondaggiSearch();
            $search->setNotifier(new NotifyWidgetDoNothing());

            $listaSondaggi = $search->ultimiSondaggi($_GET, 3)->getModels();

            foreach ($listaSondaggi as $item) {
                $newItem = SondaggiParser::parseItem($item);
                if (!empty($newItem)) {
                    //Insert New Item
                    $list[] = $newItem;
                }
            }
        } catch (Exception $ex) {
            Yii::getLogger()->log($ex->getMessage(), Logger::LEVEL_ERROR);
        }
        return $list;
    }

}
