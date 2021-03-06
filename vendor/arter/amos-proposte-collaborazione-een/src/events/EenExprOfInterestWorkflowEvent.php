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

namespace arter\amos\een\events;


use arter\amos\admin\models\UserProfile;
use arter\amos\een\models\EenExprOfInterest;
use arter\amos\een\models\EenStaff;
use arter\amos\een\utility\EenMailUtility;
use arter\amos\een\utility\EenUtility;
use Yii;
use yii\base\Event;
use yii\base\Exception;
use yii\db\Expression;
use yii\helpers\ArrayHelper;

/**
 * Class CorsiRichiesteRettificaWorkflowEvent
 * @package backend\modules\corsi\events\worflow
 */
class EenExprOfInterestWorkflowEvent
{

    /**
     * @param Event $event
     */
    public function afterEnterStatus(Event $event)
    {
        /** @var  $exprOfInterest EenExprOfInterest*/
        $exprOfInterest = $event->data;
        if($exprOfInterest->status != EenExprOfInterest::EEN_EXPR_WORKFLOW_STATUS_CLOSED) {
            $exprOfInterest->sub_status = null;
        }
        $exprOfInterest->save(false);

        $status = $exprOfInterest->status;
        if($status == EenExprOfInterest::EEN_EXPR_WORKFLOW_STATUS_TAKENOVER){
            $staff = EenStaff::findOne(['user_id' => \Yii::$app->user->id]);
            if(empty($exprOfInterest->een_staff_id) && $staff){
                $exprOfInterest->een_staff_id = $staff->id;
                $exprOfInterest->save(false);
            }
            EenMailUtility::sendEmailWorkflowTakeOver($exprOfInterest);

        }else if($status == EenExprOfInterest::EEN_EXPR_WORKFLOW_STATUS_CLOSED){
            if($exprOfInterest->sub_status == EenExprOfInterest::EEN_SUB_STATUS_USER_NOT_INTERESTED){
                EenMailUtility::sendEmailNotInterested($exprOfInterest);
            }else {
                EenMailUtility::sendEmailWorkflowClosed($exprOfInterest);
            }
        }
        else if($status == EenExprOfInterest::EEN_EXPR_WORKFLOW_STATUS_SUSPENDED){
            // at the creation of the eoi don't send the notification for the passing of status
            if($exprOfInterest->getEenExprOfInterestHistory()->count() > 0) {
                EenMailUtility::sendEmailWorkflowSuspended($exprOfInterest);
            }
        }

    }





}