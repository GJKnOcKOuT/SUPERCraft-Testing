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
 * @package    arter\amos\organizzazioni\models\base
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

namespace arter\amos\organizzazioni\models\base;

use arter\amos\admin\AmosAdmin;
use arter\amos\community\AmosCommunity;
use arter\amos\community\models\Community;
use arter\amos\community\models\CommunityUserMm;
use arter\amos\core\helpers\Html;
use arter\amos\core\record\NetworkModel;
use arter\amos\organizzazioni\Module;
use yii\helpers\ArrayHelper;

/**
 * Class Profilo
 *
 * This is the base-model class for table "profilo".
 *
 * @property integer $id
 * @property string $name
 * @property string $partita_iva
 * @property string $codice_fiscale
 * @property string $istat_code
 * @property string $presentazione_della_organizzaz
 * @property string $principali_ambiti_di_attivita_
 * @property string $ambiti_tecnologici_su_cui_siet
 * @property string $tipologia_di_organizzazione
 * @property string $forma_legale
 * @property string $sito_web
 * @property string $facebook
 * @property string $twitter
 * @property string $linkedin
 * @property string $google
 * @property string $indirizzo
 * @property string $telefono
 * @property string $fax
 * @property string $email
 * @property string $pec
 * @property string $la_sede_legale_e_la_stessa_del
 * @property string $sede_legale_indirizzo
 * @property string $sede_legale_telefono
 * @property string $sede_legale_fax
 * @property string $sede_legale_email
 * @property string $sede_legale_pec
 * @property string $responsabile
 * @property string $rappresentante_legale
 * @property string $rappresentante_legale_text
 * @property string $referente_operativo
 * @property string $contatto_referente_operativo
 * @property string $parent_id
 * @property string $profilo_enti_type_id
 * @property integer $tipologia_struttura_id
 * @property integer $community_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $deleted_by
 *
 * @property \arter\amos\admin\models\UserProfile $rappresentanteLegale
 * @property \arter\amos\admin\models\UserProfile $referenteOperativo
 * @property \arter\amos\organizzazioni\models\ProfiloTypesPmi $tipologiaDiOrganizzazione
 * @property \arter\amos\organizzazioni\models\ProfiloLegalForm $formaLegale
 * @property \arter\amos\organizzazioni\models\Profilo $parent
 * @property \arter\amos\organizzazioni\models\Profilo $children
 * @property \arter\amos\organizzazioni\models\ProfiloSedi[] $profiloSedi
 * @property \arter\amos\organizzazioni\models\ProfiloSedi[] $otherHeadquarters
 * @property \arter\amos\organizzazioni\models\ProfiloSedi[] $otherActiveHeadquarters
 * @property \arter\amos\organizzazioni\models\ProfiloEntiType $profiloEntiType
 * @property \arter\amos\organizzazioni\models\ProfiloUserMm[] $profiloUserMms
 * @property \arter\amos\core\user\User[] $profiloUsers
 * @property \arter\amos\organizzazioni\models\ProfiloTipoStruttura $tipologiaStruttura
 *
 * @package arter\amos\organizzazioni\models\base
 */
abstract class Profilo extends NetworkModel
{
    /**
     * @var Module $organizzazioniModule
     */
    protected $organizzazioniModule;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profilo';
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->organizzazioniModule = Module::instance();
        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        /** @var \arter\amos\organizzazioni\models\ProfiloEntiType $profiloEntiTypeModel */
        $profiloEntiTypeModel = $this->organizzazioniModule->model('ProfiloEntiType');
        $typeMunicipalityId = $profiloEntiTypeModel::TYPE_MUNICIPALITY;
        $disableFieldChecks = isset($organizzazioniModule->disableFieldChecks) ? $this->organizzazioniModule->disableFieldChecks : false;

        $rules = [
            [[
                'name',
            ], 'required'],
            [['created_at', 'updated_at', 'deleted_at', 'rappresentante_legale'], 'safe'],
            [[
                'created_by',
                'updated_by',
                'deleted_by',
                'parent_id',
                'profilo_enti_type_id',
                'referente_operativo',
                'rappresentante_legale',
                'tipologia_struttura_id'
            ], 'integer'],
            [[
                'presentazione_della_organizzaz',
                'telefono',
                'fax',
                'sede_legale_telefono',
                'sede_legale_fax'
            ], 'string'],
            [[
                'name',
                'partita_iva',
                'codice_fiscale',
                'tipologia_di_organizzazione',
                'forma_legale',
                'sito_web',
                'facebook',
                'twitter',
                'linkedin',
                'google',
                'indirizzo',
                'email',
                'pec',
                'la_sede_legale_e_la_stessa_del',
                'sede_legale_indirizzo',
                'sede_legale_email',
                'sede_legale_pec',
                'responsabile',
                'rappresentante_legale_text',
                'contatto_referente_operativo'
            ], 'string', 'max' => 255],
            [['istat_code'], 'string', 'max' => 10],
            [['logoOrganization'], 'file', 'extensions' => 'jpeg, jpg, png, gif', 'maxFiles' => 1],
            [['allegati'], 'file', 'maxFiles' => 0]
        ];

        if ($this->organizzazioniModule->enableProfiloEntiType === true) {
            $rules[] = [['istat_code'], 'required', 'when' => function ($model) use ($typeMunicipalityId, $disableFieldChecks) {
                if ($this->organizzazioniModule->enableCodeIstatRequired == true) {
                    /** @var \arter\amos\organizzazioni\models\Profilo $model */
                    return ($model->profilo_enti_type_id == $typeMunicipalityId && !$disableFieldChecks);
                } else {
                    return false;
                }
            }, 'whenClient' => "function (attribute, value) {" .
                (($this->organizzazioniModule->enableCodeIstatRequired == true) ? ("
                return $('#" . Html::getInputId($this, 'profilo_enti_type_id') . "').val() == " . $typeMunicipalityId . " && " . !$disableFieldChecks ? 'true' : 'false' . ");") : ("return false;")) .
                "}"
            ];
            $rules[] = [[
                'profilo_enti_type_id',
            ], 'required'];
        }

        return $rules;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'id' => Module::t('amosorganizzazioni', 'ID'),
            'name' => Module::t('amosorganizzazioni', 'Denominazione'),
            'partita_iva' => Module::t('amosorganizzazioni', 'Partita Iva'),
            'codice_fiscale' => Module::t('amosorganizzazioni', 'Codice Fiscale'),
            'istat_code' => Module::t('amosorganizzazioni', 'Istat Code'),
            'presentazione_della_organizzaz' => Module::t('amosorganizzazioni', 'Presentazione'),
            'tipologia_di_organizzazione' => Module::t('amosorganizzazioni', 'Tipologia di organizzazione'),
            'forma_legale' => Module::t('amosorganizzazioni', 'Forma legale'),
            'sito_web' => Module::t('amosorganizzazioni', 'Sito web'),
            'facebook' => Module::t('amosorganizzazioni', 'Facebook'),
            'twitter' => Module::t('amosorganizzazioni', 'Twitter'),
            'linkedin' => Module::t('amosorganizzazioni', 'Linkedin'),
            'google' => Module::t('amosorganizzazioni', 'Google+'),
            'indirizzo' => Module::t('amosorganizzazioni', 'Indirizzo'),
            'addressField' => Module::t('amosorganizzazioni', 'Indirizzo'),
            'telefono' => Module::t('amosorganizzazioni', 'Telefono'),
            'fax' => Module::t('amosorganizzazioni', 'Fax'),
            'email' => Module::t('amosorganizzazioni', 'Email'),
            'pec' => Module::t('amosorganizzazioni', 'PEC'),
            'la_sede_legale_e_la_stessa_del' => Module::t('amosorganizzazioni', 'La sede legale ?? la stessa della sede operativa'),
            'sede_legale_indirizzo' => Module::t('amosorganizzazioni', 'Sede legale indirizzo'),
            'sede_legale_telefono' => Module::t('amosorganizzazioni', 'Sede legale telefono'),
            'sede_legale_fax' => Module::t('amosorganizzazioni', 'Sede legale fax'),
            'sede_legale_email' => Module::t('amosorganizzazioni', 'Sede legale email'),
            'sede_legale_pec' => Module::t('amosorganizzazioni', 'Sede legale PEC'),
            'responsabile' => Module::t('amosorganizzazioni', 'Responsabile'),
            'rappresentante_legale' => Module::t('amosorganizzazioni', 'Rappresentante legale'),
            'rappresentante_legale_text' => Module::t('amosorganizzazioni', 'Rappresentante legale'),
            'referente_operativo' => Module::t('amosorganizzazioni', 'Referente operativo'),
            'contatto_referente_operativo' => Module::t('amosorganizzazioni', 'Contatto referente operativo'),
            'parent_id' => Module::t('amosorganizzazioni', 'Membership organization'),
            'profilo_enti_type_id' => Module::t('amosorganizzazioni', 'Tipologia di ente'),
            'tipologia_struttura_id' => Module::t('amosorganizzazioni', 'Tipologia di Struttura'),
            'community_id' => Module::t('amosorganizzazioni', 'Community id'),
            'created_at' => Module::t('amosorganizzazioni', 'Creato il'),
            'updated_at' => Module::t('amosorganizzazioni', 'Aggiornato il'),
            'deleted_at' => Module::t('amosorganizzazioni', 'Cancellato il'),
            'created_by' => Module::t('amosorganizzazioni', 'Creato da'),
            'updated_by' => Module::t('amosorganizzazioni', 'Aggiornato da'),
            'deleted_by' => Module::t('amosorganizzazioni', 'Cancellato da'),
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRappresentanteLegale()
    {
        return $this->hasOne(AmosAdmin::instance()->createModel('UserProfile')->className(), ['user_id' => 'rappresentante_legale']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReferenteOperativo()
    {
        return $this->hasOne(AmosAdmin::instance()->createModel('UserProfile')->className(), ['user_id' => 'referente_operativo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipologiaDiOrganizzazione()
    {
        return $this->hasOne($this->organizzazioniModule->createModel('ProfiloTypesPmi')->className(), ['id' => 'tipologia_di_organizzazione']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFormaLegale()
    {
        return $this->hasOne($this->organizzazioniModule->createModel('ProfiloLegalForm')->className(), ['id' => 'forma_legale']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne($this->organizzazioniModule->model('Profilo'), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChildren()
    {
        return $this->hasMany($this->organizzazioniModule->model('Profilo'), ['parent_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfiloSedi()
    {
        return $this->hasMany($this->organizzazioniModule->createModel('ProfiloSedi')->className(), ['profilo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOtherHeadquarters()
    {
        return $this->getProfiloSedi()->andWhere(['is_main' => 0]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOtherActiveHeadquarters()
    {
        return $this->getOtherHeadquarters()->andWhere(['active' => 1]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfiloEntiType()
    {
        return $this->hasOne($this->organizzazioniModule->createModel('ProfiloEntiType')->className(), ['id' => 'profilo_enti_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfiloUserMms()
    {
        return $this->hasMany($this->organizzazioniModule->createModel('ProfiloUserMm')->className(), ['profilo_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfiloUsers()
    {
        return $this->hasMany(\arter\amos\core\user\User::className(), ['id' => 'user_id'])->via('profiloUserMms');
    }

    /**
     * @inheritdoc
     */
    public function getCommunityId()
    {
        return $this->community_id;
    }

    /**
     * @inheritdoc
     */
    public function setCommunityId($communityId)
    {
        $this->community_id = $communityId;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommunity()
    {
        $communityModule = AmosCommunity::instance();
        if (!is_null($communityModule)) {
            return $this->hasOne($communityModule->model('Community'), ['id' => 'community_id']);
        }
        return null;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommunityUserMm()
    {
        $communityModule = AmosCommunity::instance();
        if (!is_null($communityModule)) {
            return $this->hasMany(CommunityUserMm::className(), ['community_id' => 'community_id']);
        }
        return null;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipologiaStruttura()
    {
        return $this->hasOne($this->organizzazioniModule->model('ProfiloTipoStruttura'), ['id' => 'tipologia_struttura_id']);
    }
}
