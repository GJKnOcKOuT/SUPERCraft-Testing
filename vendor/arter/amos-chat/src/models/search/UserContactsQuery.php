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
 * @package    arter\amos\chat
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

namespace arter\amos\chat\models\search;

use arter\amos\chat\ModelDataProvider;
use arter\amos\chat\models\User;
use yii\db\ActiveQuery;
use arter\amos\admin\models\UserContact;

/**
 * Class UserContactsQuery
 * @package arter\amos\chat\models\search
 */
class UserContactsQuery extends User
{
    /**
     * @param int $userId Logged user id.
     * @return ModelDataProvider
     */
    public static function getUserContacts($userId)
    {
        $query = static::findUserContacts($userId);

        return new ModelDataProvider([
            'query' => $query,
            'key' => 'id'
        ]);
    }

    /**
     * @param $userId
     * @return array|bool
     */
    public static function getCommunityUsers($userId){
        $ids_community = false;
        $moduleCwh = \Yii::$app->getModule('cwh');
        if (isset($moduleCwh) && !empty($moduleCwh->getCwhScope())) {
            $scope = $moduleCwh->getCwhScope();
            if (isset($scope['community'])) {
                $community = \arter\amos\community\models\Community::findOne($scope['community']);
                $queryUsersMm = $community->getCommunityUserMms();
                $queryUsersMm->andWhere("user_profile.user_id != :userId", ['userId' => $userId]);
                $rs = $queryUsersMm->all();
                $ids_community = [-1];
                foreach($rs as $single){
                    $ids_community[] = $single['user_id'];
                }
            }
        }

        return $ids_community;
    }

    /**
     * @param $userId
     * @return ActiveQuery
     */
    public static function findUserContacts($userId)
    {
        $query = null;
        $onlyNetworkUsers = \Yii::$app->getModule('chat')->onlyNetworkUsers;

        //check if the scope is a community
        $ids_community = self::getCommunityUsers($userId);
        if($ids_community){
            //if it need to show the network users
            if($onlyNetworkUsers){
                $queryContacts = self::getQueryContacts($userId);
                $rsContacts = $queryContacts->all();
                foreach($rsContacts as $single){
                    if(!in_array($single['id'], $ids_community)){
                        $ids_community[] = $single['id'];
                    }
                }
            }

            $query = User::find()
                ->joinWith("profile")
                ->where(['in', 'user.id', $ids_community])
                ->andWhere(['attivo' => 1])
                ->orderBy("cognome, nome");
        }
        //else if only network users
        else if($onlyNetworkUsers){
            $query = self::getQueryContacts($userId);
            $query->orderBy("cognome, nome");
        }
        //else all the users
        else {
            $query = User::find()
                ->joinWith("profile")
                ->andWhere("user_id != :userId", ['userId' => $userId])
                ->andWhere(['attivo' => 1])
                ->orderBy("cognome, nome");

        }

        return $query;
    }

    /**
     * @param $userId
     * @return mixed
     */
    private static function getQueryContacts($userId){
        $contactsInvited =
            User::find()->innerJoin('user_contact', 'user.id = user_contact.contact_id')
                ->innerJoin('user_profile', 'user_profile.user_id = user.id')
                ->andWhere('user_contact.deleted_at IS NULL AND user_profile.deleted_at IS NULL')
                ->andWhere("user_contact.user_id = ".$userId)->andWhere([ 'user_contact.status' => UserContact::STATUS_ACCEPTED])
                ->andWhere(['attivo' => 1]);

        $contactsInviting =
            User::find()->innerJoin('user_contact', 'user.id = user_contact.user_id')
                ->innerJoin('user_profile', 'user_profile.user_id = user.id')
                ->andWhere('user_contact.deleted_at IS NULL AND user_profile.deleted_at IS NULL')
                ->andWhere("user_contact.contact_id = ".$userId)->andWhere(['user_contact.status' => UserContact::STATUS_ACCEPTED])
                ->andWhere(['attivo' => 1]);

        return $contactsInvited->union($contactsInviting);
    }
}