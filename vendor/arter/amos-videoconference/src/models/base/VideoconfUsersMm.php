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


namespace arter\amos\videoconference\models\base;

use arter\amos\admin\models\UserProfile;
use Yii;

/** 
* This is the base-model class for table "videoconf_users_mm". 
* 
    * @property integer $id
    * @property integer $videoconf_id
    * @property integer $user_profile_id
    * @property string $created_at
    * @property string $updated_at
    * @property string $deleted_at
    * @property integer $created_by
    * @property integer $updated_by
    * @property integer $deleted_by
    * 
    * @property \arter\amos\admin\models\UserProfile $user
    * @property \arter\amos\videoconference\models\Videoconf $videoconf
    */ 
class VideoconfUsersMm extends \arter\amos\core\record\Record
{ 


/** 
* @inheritdoc 
*/ 
public static function tableName() 
{ 
return 'videoconf_users_mm'; 
} 

/** 
* @inheritdoc 
*/ 
public function rules() 
{ 
return [
            [['videoconf_id', 'user_profile_id'], 'required'],
            [['videoconf_id', 'user_profile_id', 'created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['user_profile_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserProfile::className(), 'targetAttribute' => ['user_profile_id' => 'id']],
            [['videoconf_id'], 'exist', 'skipOnError' => true, 'targetClass' => Videoconf::className(), 'targetAttribute' => ['videoconf_id' => 'id']],
]; 
} 

/** 
* @inheritdoc 
*/ 
public function attributeLabels() 
{ 
return [ 
    'id' => Yii::t('app', 'ID'),
    'videoconf_id' => Yii::t('app', 'Videoconf ID'),
    'user_profile_id' => Yii::t('app', 'User ID'),
    'created_at' => Yii::t('app', 'Created at'),
    'updated_at' => Yii::t('app', 'Updated at'),
    'deleted_at' => Yii::t('app', 'Deleted at'),
    'created_by' => Yii::t('app', 'Created by'),
    'updated_by' => Yii::t('app', 'Updated by'),
    'deleted_by' => Yii::t('app', 'Deleted by'),
]; 
} 

    /** 
    * @return \yii\db\ActiveQuery 
    */ 
    public function getUserProfile()
    { 
    return $this->hasOne(\arter\amos\admin\models\UserProfile::className(), ['id' => 'user_profile_id']);
    } 

    /** 
    * @return \yii\db\ActiveQuery 
    */ 
    public function getVideoconf() 
    { 
    return $this->hasOne(\arter\amos\videoconference\models\Videoconf::className(), ['id' => 'videoconf_id']);
    } 
} 
