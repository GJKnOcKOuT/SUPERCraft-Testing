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

use arter\amos\discussioni\models\DiscussioniTopic;
use arter\amos\events\models\Event;
use arter\amos\events\models\EventInvitation;
use arter\amos\events\models\search\EventSearch;
use arter\amos\mobile\bridge\modules\v1\actions\entitydata\parsers\DiscussioniParser;
use arter\amos\mobile\bridge\modules\v1\actions\entitydata\parsers\EventParser;
use arter\amos\mobile\bridge\modules\v1\actions\entitydata\parsers\NewsParser;
use arter\amos\mobile\bridge\modules\v1\actions\entitydata\parsers\PartecipantsParser;
use arter\amos\mobile\bridge\modules\v1\actions\entitydata\parsers\SondaggiParser;
use arter\amos\news\models\News;
use arter\amos\sondaggi\models\search\SondaggiSearch;
use Exception;
use Yii;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\log\Logger;
use yii\rest\Controller;

class EventController extends Controller
{

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
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
                        'events-list' => ['get'],
                        'event-detail' => ['get'],
                        'event-news-list' => ['get'],
                        'event-discussions-list' => ['get'],
                        'event-qr-code' => ['get'],
                        'event-user-role' => ['get'],
                    ],
                ],
        ]);
    }

    /**
     * 
     * @return type
     */
    public function actionEventsList($offset = null, $limit = null, $from_date = null, $to_date = null)
    {
        $list = [];
        try {
            $params = [];
            $search = new EventSearch();
            if (!is_null($offset)) {
                $params['offest'] = $offset;
            }
            if (!is_null($limit)) {
                $params['limit'] = $limit;
            }
            if (!is_null($from_date)) {
                $search->begin_date_hour;
            }
            $cwh = $this->loadCwh();
            $cwh->resetCwhScopeInSession();
            $dataProvider = $search->searchOwnInterest($params);
            $listModel = $dataProvider->getModels();
            foreach ($listModel as $model) {
                $list[] = EventParser::parseItem($model);
            }
        } catch (Exception $ex) {
            Yii::getLogger()->log($ex->getMessage(), Logger::LEVEL_ERROR);
        }
        return $list;
    }

    /**
     * 
     * @param type $event_id
     * @return type
     */
    public function actionEventDetail($event_id)
    {
        $ditail = [];

        try {
            $ditail = EventParser::parseItem(Event::findOne(['id' => $event_id]));
        } catch (Exception $ex) {
            Yii::getLogger()->log($ex->getMessage(), Logger::LEVEL_ERROR);
        }
        return $ditail;
    }

    /**
     * 
     * @param type $event_id
     * @param type $offset
     * @param type $limit
     * @return array
     */
    public function actionEventNewsList($event_id, $offset = null, $limit = null)
    {
        $list = [];
        try {
            $event = Event::findOne(['id' => $event_id]);
            if (!is_null($event)) {
                $cwh = $this->loadCwh();
                $old_scope = $cwh->getCwhScope();
                $cwh->setCwhScopeInSession([
                    'community' => $event->community_id
                ]);
                $namespace = News::className();
                $bodyParams = [
                    'namespace' => $namespace,
                    'offset' => $offset,
                    'limit' => $limit
                ];
                $list = NewsParser::getItems($namespace, $bodyParams);
                $cwh->setCwhScopeInSession($old_scope);
            }
        } catch (Exception $ex) {
            Yii::getLogger()->log($ex->getMessage(), Logger::LEVEL_ERROR);
        }
        return $list;
    }

    /**
     * 
     * @param type $event_id
     * @param type $offset
     * @param type $limit
     * @return type
     */
    public function actionEventDiscussionsList($event_id, $offset = null, $limit = null)
    {
        $list = [];
        try {
            $event = Event::findOne(['id' => $event_id]);
            if (!is_null($event)) {
                $cwh = $this->loadCwh();
                $old_scope = $cwh->getCwhScope();
                $cwh->setCwhScopeInSession([
                    'community' => $event->community_id
                ]);
                $namespace = DiscussioniTopic::className();
                $bodyParams = [
                    'namespace' => $namespace,
                    'offset' => $offset,
                    'limit' => $limit
                ];
                $list = DiscussioniParser::getItems($namespace, $bodyParams);
                $cwh->setCwhScopeInSession($old_scope);
            }
        } catch (Exception $ex) {
            Yii::getLogger()->log($ex->getMessage(), Logger::LEVEL_ERROR);
        }
        return $list;
    }

    /**
     * 
     * @param type $event_id
     * @param type $offset
     * @param type $limit
     * @return type
     */
    public function actionEventSondaggiList($event_id, $offset = null, $limit = null)
    {
        $list = [];
        try {
            $event = Event::findOne(['id' => $event_id]);
            if (!is_null($event)) {
                $cwh = $this->loadCwh();
                $old_scope = $cwh->getCwhScope();
                $cwh->setCwhScopeInSession([
                    'community' => $event->community_id
                ]);
                $params = [];
                $search = new SondaggiSearch();
                if (!is_null($offset)) {
                    $params['offest'] = $offset;
                }
                if (!is_null($limit)) {
                    $params['limit'] = $limit;
                }

                $dataProvider = $search->searchOwnInterest($params);
                $listModel = $dataProvider->getModels();
                foreach ($listModel as $model) {
                    $list[] = SondaggiParser::parseItem($model);
                }
                $cwh->setCwhScopeInSession($old_scope);
            }
        } catch (Exception $ex) {
            Yii::getLogger()->log($ex->getMessage(), Logger::LEVEL_ERROR);
        }
        return $list;
    }

    /**
     * 
     * @return type
     * @throws Exception
     */
    private function loadCwh()
    {
        $cwh = null;

        $cwh = Yii::$app->getModule('cwh');
        if (is_null($cwh)) {
            throw new \Exception('CWH not present');
        }

        return $cwh;
    }

    /**
     * 
     * @param integer $event_id
     * @return typepartecipants
     */
    public function actionEventPartecipantsList($event_id)
    {
        $list = [];
        try {
            $event = Event::findOne(['id' => $event_id]);
            if (!is_null($event)) {
                $partecipants = $event->communityUserMm;
                foreach ($partecipants as $partecipant) {
                    $list[] = PartecipantsParser::parseItem($partecipant);
                }
            }
        } catch (Exception $ex) {
            Yii::getLogger()->log($ex->getMessage(), Logger::LEVEL_ERROR);
        }
        return $list;
    }

    /**
     * 
     * @param type $event_id
     * @param type $participant_id
     * @param type $companion_id
     */
    public function actionEventQrCode($event_id, $user_id)
    {
        try {
            $event = Event::findOne(['id' => $event_id]);
            if (!is_null($event)) {
                $partecipantsQuery = $event->getCommunityUserMm();
                $partecipantsQuery->andWhere(['user_id' => $user_id]);
                $partecipant = $partecipantsQuery->one();
                if (!is_null($partecipant)) {
                    $invitation = EventInvitation::findOne(['event_id' => $event_id, 'user_id' => $user_id]);
                    if ($invitation) {
                        return \QRcode::svg(Url::base(true) . Url::toRoute(['register-participant', 'eid' => $event_id, 'pid' => $user_id, 'iid' => $invitation->id]), "qrcode", false, QR_ECLEVEL_H, 200);
                    }
                }
            }
        } catch (Exception $ex) {
            Yii::getLogger()->log($ex->getMessage(), Logger::LEVEL_ERROR);
        }

        return null;
    }
    
    /**
     * 
     * @param type $event_id
     * @return type
     */
    public function actionEventUserRole($event_id)
    {
        try {
            $event = Event::findOne(['id' => $event_id]);
            if (!is_null($event)) {
                $partecipantsQuery = $event->getCommunityUserMm();
                $partecipantsQuery->andWhere(['user_id' => \Yii::$app->getUser()->id]);
                $partecipant = $partecipantsQuery->one();
                if (!is_null($partecipant)) {
                    return ['role' => $partecipant->role];
                }
            }
        } catch (Exception $ex) {
            Yii::getLogger()->log($ex->getMessage(), Logger::LEVEL_ERROR);
        }

        return null;
    }
}
