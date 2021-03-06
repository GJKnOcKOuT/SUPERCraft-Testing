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
 * @package    arter\amos\comments\models
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

namespace arter\amos\comments\models;

use arter\amos\attachments\behaviors\FileBehavior;
use arter\amos\attachments\models\File;
use arter\amos\comments\AmosComments;
use yii\helpers\ArrayHelper;
use arter\amos\notificationmanager\behaviors\NotifyBehavior;

/**
 * Class CommentReply
 * This is the model class for table "comment_reply".
 *
 * @method \yii\db\ActiveQuery hasOneFile($attribute = 'file', $sort = 'id')
 * @method \yii\db\ActiveQuery hasMultipleFiles($attribute = 'file', $sort = 'id')
 *
 * @package arter\amos\comments\models
 */
class CommentReply extends \arter\amos\comments\models\base\CommentReply
{
    const VIEW_TYPE_POSITION = 'comment_reply';

    /**
     * @var File[] $commentReplyAttachments
     */
    private $commentReplyAttachments;
    
    /**
     * @var File[] $commentReplyAttachmentsForItemView
     */
    private $commentReplyAttachmentsForItemView;
    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'fileBehavior' => [
                'class' => FileBehavior::className()
            ],
            'NotifyBehavior' => [
                'class' => NotifyBehavior::className(),
                'conditions' => [],
            ],
        ]);
    }
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        $maxCommentAttachments = 0;

        /** @var AmosComments $commentsModule */
        $commentsModule = \Yii::$app->getModule(AmosComments::getModuleName());
        if(isset($commentsModule)) {
            $maxCommentAttachments = $commentsModule->maxCommentAttachments;
        }
        return ArrayHelper::merge(parent::rules(), [
            [['commentReplyAttachments'], 'file', 'maxFiles' => $maxCommentAttachments],
        ]);
    }
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'commentReplyAttachments' => AmosComments::t('amoscomments', '#COMMENT_REPLY_ATTACHMENTS'),
        ]);
    }
    
    /**
     * Getter for $this->attachments;
     *
     */
    public function getCommentReplyAttachments()
    {
        if(empty($this->commentReplyAttachments)){
            $this->commentReplyAttachments = $this->hasMultipleFiles('commentReplyAttachments')->one();
        }
        return $this->commentReplyAttachments;
    }


    /**
     * @param $attachments
     */
    public function setCommentReplyAttachments($attachments){
        $this->commentReplyAttachments = $attachments;
    }

    /**
     * @return array|File[]|\yii\db\ActiveRecord[]
     */
    public function getCommentReplyAttachmentsForItemView()
    {
        if(empty($this->commentReplyAttachmentsForItemView)){
            $this->commentReplyAttachmentsForItemView = $this->hasMultipleFiles('commentReplyAttachments')->all();
        }
        return $this->commentReplyAttachmentsForItemView;
    }

    /**
     * @param $attachments
     */
    public function setCommentReplyAttachmentsForItemView($attachments){
        $this->commentReplyAttachmentsForItemView = $attachments;
    }
    
    /**
     * @inheritdoc
     */
    public function afterFind()
    {
        parent::afterFind();
    }
}
