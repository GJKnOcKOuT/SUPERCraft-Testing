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


namespace arter\amos\utility\models;

use arter\amos\dashboard\models\AmosWidgets;
use arter\amos\admin\models\UserProfile;
use Yii;
use yii\db\ActiveRecord;
use yii\db\Query;

/**
 * This is the model class for table "bullet_counters".
 *
 * @property int $id
 * @property int $widget_icon_id Widgets con relativo bullet counter
 * @property int $user_id User profile reference
 * @property int $counter
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at Cancellato il
 * @property int $created_by Creato da
 * @property int $updated_by Aggiornato da
 * @property int $deleted_by Cancellato da
 *
 * @property UserProfile $user
 */
class BulletCounters extends ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bullet_counters';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['widget_icon_id', 'user_id', 'counter', 'created_by', 'updated_by', 'deleted_by', 'pre_counter'],
                'integer'],
            [['created_at', 'updated_at', 'deleted_at', 'microtime'], 'safe'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserProfile::className(), 'targetAttribute' => [
                    'user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'widget_icon_id' => 'Widget Icon ID',
            'user_id' => 'User ID',
            'counter' => 'Counter',
            'pre_counter' => 'Pre Counter',
            'microtime' => 'Microtime',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'deleted_by' => 'Deleted By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserProfile()
    {
        return $this->hasOne(UserProfile::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public static function getAmosWidgetsIconNameID($moduleName = null, $widgetIconClassname = null)
    {

        return AmosWidgets::find()
                ->select('id')
                ->andWhere([
                    'module' => $moduleName,
                    'classname' => $widgetIconClassname,
                    'type' => AmosWidgets::TYPE_ICON
                ])
                ->asArray()
                ->one();
    }

    /**
     * Get widget icon counter for specified $userId
     * @param integer $userId
     * @param string $moduleName
     * @param string $widgetIconClassname
     * @param boolean $reset
     * @param string $father
     * @param string $child
     * @return int
     */
    public static function getAmosWidgetIconCounter($userId, $moduleName, $widgetIconClassname, $reset = false,
                                                    $father = null, $child = null, $saveMicrotime = true)
    {
        $moduleCwh = \Yii::$app->getModule('cwh');
        if (!empty($moduleCwh) && !empty($moduleCwh->getCwhScope())) {
            return 0;
        }
        $wid    = BulletCounters::getAmosWidgetsIconNameID($moduleName, $widgetIconClassname);
        $rs     = BulletCounters::find()
            ->andWhere([
                'widget_icon_id' => $wid['id'],
                'user_id' => $userId
            ])
            ->one();
        $bc     = 0;
        $bcTime = 0;

        if (!(empty($rs))) {
            if ($reset === true && $rs->counter > 0) {
                if (!empty($child)) {
                    $widc = BulletCounters::getAmosWidgetsIconNameID($moduleName, $child);
                    $rsc  = BulletCounters::find()
                        ->andWhere([
                            'widget_icon_id' => $widc['id'],
                            'user_id' => $userId
                        ])
                        ->one();
                    if (!empty($rsc)) {
                        BulletCounters::resetOtherAmosWidgetIconCounter($rsc);
                    }
                } else if ($rs->counter > 0 && !empty($father) && $father != $widgetIconClassname) {
                    $widf = BulletCounters::getAmosWidgetsIconNameID($moduleName, $father);
                    $rsf  = BulletCounters::find()
                        ->andWhere([
                            'widget_icon_id' => $widf['id'],
                            'user_id' => $userId
                        ])
                        ->one();
                    if (!empty($rsf)) {
                        BulletCounters::resetOtherAmosWidgetIconCounter($rsf, $rs->counter);
                    }
                }
                $bc = $rs->counter;
                BulletCounters::resetAmosWidgetIconCounter($rs);
            } else {
                if (!empty($father) && $father != $widgetIconClassname) {
                    $widf = BulletCounters::getAmosWidgetsIconNameID($moduleName, $father);
                    $rsf  = BulletCounters::find()
                        ->select('microtime')
                        ->andWhere([
                            'widget_icon_id' => $widf['id'],
                            'user_id' => $userId
                        ])
                        ->asArray()
                        ->one();
                    if (!empty($rsf)) {
                        $bcTime = $rsf['microtime'];
                    }
                } else if (!empty($child)) {
                    $widc = BulletCounters::getAmosWidgetsIconNameID($moduleName, $child);
                    $rsc  = BulletCounters::find()
                        ->select('microtime')
                        ->andWhere([
                            'widget_icon_id' => $widc['id'],
                            'user_id' => $userId
                        ])
                        ->asArray()
                        ->one();
                    if (!empty($rsc)) {
                        $bcTime = $rsc['microtime'];
                    }
                }

                if ($rs->microtime < $bcTime && $rs->microtime > 0) {
                    $bc = $rs->counter;
                } else {
                    $bc = $rs->pre_counter;
                }
                BulletCounters::resetPreCounter($rs, $saveMicrotime);
            }
        }

        return $bc;
    }

    /**
     *
     * @param type $bullet
     */
    public static function resetAmosWidgetIconCounter($bullet)
    {
        $bullet->pre_counter = 0;
        $bullet->counter     = 0;
        if ($bullet->microtime == 0) {
            $bullet->microtime = microtime(true);
        }
        $bullet->save();
    }

    /**
     *
     * @param type $bullet
     * @param type $sub
     */
    public static function resetOtherAmosWidgetIconCounter($bullet, $sub = 0)
    {
        if ($sub == 0) {
            $bullet->counter = 0;
        } else {
            $bullet->counter = $parent['counter'] - $sub;
            if ($bullet->counter < 0) {
                $bullet->counter = 0;
            }
        }
        $bullet->save();
    }

    /**
     *
     * @param type $bullet
     * @param type $saveMicrotime
     */
    public static function resetPreCounter($bullet, $saveMicrotime = true)
    {
        $bullet->pre_counter = $bullet->counter;
        if ($bullet->microtime == 0 && $saveMicrotime == true) {
            $bullet->microtime = microtime(true);
        }
        $bullet->save();
    }
}