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
 * @package    arter\amos\sondaggi\models\base
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

namespace arter\amos\sondaggi\models\base;

use arter\amos\core\user\User;
use Yii;
use arter\amos\sondaggi\AmosSondaggi;

/**
 * This is the base-model class for table "sondaggi_risposte_sessioni".
 *
 * @property integer $id
 * @property string $session_id
 * @property string $unique_id
 * @property string $begin_date
 * @property string $end_date
 * @property string $session_tmp
 * @property integer $completato
 * @property integer $user_id
 * @property integer $sondaggi_id
 * @property integer $entita_id
 * @property integer $sondaggi_accessi_servizi_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $deleted_by
 * @property integer $version
 *
 * @property \arter\amos\sondaggi\models\SondaggiRisposte[] $sondaggiRispostes
 * @property \arter\amos\sondaggi\models\Sondaggi $sondaggi
 * @property \common\models\User $user
 */
class SondaggiRisposteSessioni extends \arter\amos\core\record\Record {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'sondaggi_risposte_sessioni';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['begin_date', 'end_date', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['session_tmp'], 'string'],
            [['completato', 'user_id', 'sondaggi_id', 'entita_id', 'created_by', 'updated_by', 'deleted_by', 'version'], 'integer'],
            [['sondaggi_id'], 'required'],
            [['session_id', 'unique_id'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => AmosSondaggi::t('amossondaggi', 'ID'),
            'session_id' => AmosSondaggi::t('amossondaggi', 'Id Sessione'),
            'unique_id' => AmosSondaggi::t('amossondaggi', 'Id Unico'),
            'begin_date' => AmosSondaggi::t('amossondaggi', 'Inizio compilazione'),
            'end_date' => AmosSondaggi::t('amossondaggi', 'Fine compilazione'),
            'session_tmp' => AmosSondaggi::t('amossondaggi', 'Tmp Sessione'),
            'completato' => AmosSondaggi::t('amossondaggi', 'Completato'),
            'user_id' => AmosSondaggi::t('amossondaggi', 'Utente'),
            'sondaggi_id' => AmosSondaggi::t('amossondaggi', 'Sondaggio'),
            'entita_id' => AmosSondaggi::t('amossondaggi', 'Attività'),
            'created_at' => AmosSondaggi::t('amossondaggi', 'Creato il'),
            'updated_at' => AmosSondaggi::t('amossondaggi', 'Aggiornato il'),
            'deleted_at' => AmosSondaggi::t('amossondaggi', 'Cancellato il'),
            'created_by' => AmosSondaggi::t('amossondaggi', 'Creato da'),
            'updated_by' => AmosSondaggi::t('amossondaggi', 'Aggiornato da'),
            'deleted_by' => AmosSondaggi::t('amossondaggi', 'Cancellato da'),
            'version' => AmosSondaggi::t('amossondaggi', 'Versione'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSondaggiRispostes() {
        return $this->hasMany(\arter\amos\sondaggi\models\SondaggiRisposte::className(), ['sondaggi_risposte_sessioni_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSondaggi() {
        return $this->hasOne(\arter\amos\sondaggi\models\Sondaggi::className(), ['id' => 'sondaggi_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
//    public function getPeiAccessiServiziFacilitazione() {
//        return $this->hasOne(\backend\modules\peipoint\models\AccessiServiziFacilitazione::className(), ['id' => 'sondaggi_accessi_servizi_id']);
//    }

}
