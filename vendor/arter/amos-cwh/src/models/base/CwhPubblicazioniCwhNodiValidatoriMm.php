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
 * @package    arter\amos\cwh\models\base
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

namespace arter\amos\cwh\models\base;

use arter\amos\cwh\AmosCwh;
use yii\helpers\ArrayHelper;

/**
 * Class CwhPubblicazioniCwhNodiValidatoriMm
 *
 * This is the base-model class for table "cwh_pubblicazioni_cwh_nodi_validatori_mm".
 *
 * @property integer $id
 * @property integer $cwh_pubblicazioni_id
 * @property integer $cwh_config_id
 * @property integer $cwh_network_id
 * @property string $cwh_nodi_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $deleted_by
 * @property integer $version
 *
 * @property \arter\amos\cwh\models\CwhNodi $cwhNodi
 * @property \arter\amos\cwh\models\CwhPubblicazioni $cwhPubblicazioni
 * @property \arter\amos\cwh\models\CwhConfig $cwhConfig
 *
 * @package arter\amos\cwh\models\base
 */
class CwhPubblicazioniCwhNodiValidatoriMm extends \arter\amos\core\record\Record
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cwh_pubblicazioni_cwh_nodi_validatori_mm';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cwh_pubblicazioni_id', 'cwh_nodi_id', 'cwh_config_id', 'cwh_network_id'], 'required'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['created_by', 'updated_by', 'deleted_by', 'cwh_pubblicazioni_id', 'cwh_config_id', 'cwh_network_id'], 'integer'],
            [['cwh_nodi_id'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'cwh_pubblicazioni_id' => AmosCwh::t('amoscwh', 'Cwh Pubblicazioni ID'),
            'cwh_nodi_id' => AmosCwh::t('amoscwh', 'Cwh Nodi ID'),
            'cwh_config_id' => AmosCwh::t('amoscwh', 'Cwh Config ID'),
            'cwh_network_id' => AmosCwh::t('amoscwh', 'Cwh Network ID'),
            'created_at' => AmosCwh::t('amoscwh', 'Creato il'),
            'updated_at' => AmosCwh::t('amoscwh', 'Aggiornato il'),
            'deleted_at' => AmosCwh::t('amoscwh', 'Cancellato il'),
            'created_by' => AmosCwh::t('amoscwh', 'Creato da'),
            'updated_by' => AmosCwh::t('amoscwh', 'Aggiornato da'),
            'deleted_by' => AmosCwh::t('amoscwh', 'Cancellato da'),
            'version' => AmosCwh::t('amoscwh', 'Versione numero'),
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCwhNodi()
    {
        return $this->hasOne(\arter\amos\cwh\models\CwhNodi::className(), ['id' => 'cwh_nodi_id', 'cwh_config_id' => 'cwh_config_id', 'record_id' => 'cwh_network_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCwhPubblicazioni()
    {
        return $this->hasOne(\arter\amos\cwh\models\CwhPubblicazioni::className(), ['id' => 'cwh_pubblicazioni_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCwhConfig()
    {
        return $this->hasOne(\arter\amos\cwh\models\CwhConfig::className(), ['id' => 'cwh_config_id']);
    }
}
