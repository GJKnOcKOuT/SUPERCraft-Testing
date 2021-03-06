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
 * @package    arter-mobile-bridge
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */
namespace arter\amos\mobile\bridge\modules\v1\models\base;

use common\components\record\Record;
use Yii;

/**
 * This is the model class for table "access_tokens".
 *
 */
class AccessTokens extends \arter\amos\core\record\Record
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'access_tokens';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'logout_by', 'created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['device_info'], 'string'],
            [['logout_at', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['access_token', 'ip'], 'string', 'max' => 32],
            [['location'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'access_token' => Yii::t('app', 'Access Token'),
            'user_id' => Yii::t('app', 'User id'),
            'device_info' => Yii::t('app', 'Device info'),
            'ip' => Yii::t('app', 'IP info'),
            'location' => Yii::t('app', 'Location'),
            'logout_at' => Yii::t('app', 'Logout At'),
            'logout_by' => Yii::t('app', 'Logout By'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'deleted_at' => Yii::t('app', 'Deleted At'),
            'deleted_by' => Yii::t('app', 'Deleted By'),
        ];
    }
}
