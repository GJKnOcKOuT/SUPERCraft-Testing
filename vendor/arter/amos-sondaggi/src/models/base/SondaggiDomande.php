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

use Yii;
use arter\amos\sondaggi\AmosSondaggi;

/**
 * This is the base-model class for table "sondaggi_domande".
 *
 * @property integer $id
 * @property integer $sondaggi_map_id
 * @property string $introduzione
 * @property string $introduzione_condizionata
 * @property integer $domanda_condizionata
 * @property integer $domanda_condizionata_testo_libero
 * @property string $domanda
 * @property string $tooltip
 * @property integer $obbligatoria
 * @property integer $inline
 * @property integer $sondaggi_id
 * @property integer $ordinamento
 * @property integer $min_int_multipla
 * @property integer $max_int_multipla
 * @property string $nome_classe_validazione
 * @property string $modello_risposte_id
 * @property integer $sondaggi_domande_pagine_id
 * @property integer $sondaggi_domande_tipologie_id
 * @property integer $abilita_ordinamento_risposte
 * @property integer $domanda_per_criteri
 * @property integer $punteggio_max
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $deleted_by
 * @property integer $version
 *
 * @property \arter\amos\sondaggi\models\SondaggiDomandeRuleMm[] $sondaggiDomandeRuleMms
 * @property \arter\amos\sondaggi\models\SondaggiDomande $domandaCondizionataTestoLibero
 * @property \arter\amos\sondaggi\models\SondaggiMap $mapField
 * @property \arter\amos\sondaggi\models\Sondaggi $sondaggi
 * @property \arter\amos\sondaggi\models\SondaggiDomandePagine $sondaggiDomandePagine
 * @property \arter\amos\sondaggi\models\SondaggiDomandeTipologie $sondaggiDomandeTipologie
 * @property \arter\amos\sondaggi\models\SondaggiDomandeCondizionate[] $sondaggiDomandeCondizionates
 * @property \arter\amos\sondaggi\models\SondaggiRispostePredefinite[] $sondaggiRispostePredefinitesCondizionate
 * @property \arter\amos\sondaggi\models\SondaggiRisposte[] $sondaggiRispostes
 * @property \arter\amos\sondaggi\models\SondaggiRispostePredefinite[] $sondaggiRispostePredefinites
 */
class SondaggiDomande extends \arter\amos\core\record\Record
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sondaggi_domande';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['domanda_condizionata', 'obbligatoria', 'inline', 'sondaggi_id', 'ordinamento', 'min_int_multipla', 'max_int_multipla',
                'sondaggi_domande_pagine_id', 'sondaggi_domande_tipologie_id', 'created_by', 'updated_by', 'deleted_by',
                'version', 'sondaggi_map_id', 'domanda_condizionata_testo_libero', 'domanda_per_criteri', 'punteggio_max',
                'abilita_ordinamento_risposte', 'modello_risposte_id'], 'integer'],
            [['domanda', 'tooltip', 'introduzione', 'introduzione_condizionata'], 'string'],
            [['nome_classe_validazione'], 'string', 'max' => 255],
            [['domanda', 'sondaggi_id', 'sondaggi_domande_pagine_id', 'sondaggi_domande_tipologie_id'], 'required'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => AmosSondaggi::t('amossondaggi', 'ID'),
            'domanda_condizionata' => AmosSondaggi::t('amossondaggi', 'Domanda condizionata'),
            'domanda_condizionata_testo_libero' => AmosSondaggi::t('amossondaggi',
                'Domanda condizionata ad una risposta libera (se presente o meno)'),
            'domanda' => AmosSondaggi::t('amossondaggi', 'Domanda'),
            'obbligatoria' => AmosSondaggi::t('amossondaggi', 'Obbligatoria'),
            'inline' => AmosSondaggi::t('amossondaggi', 'Visualizzazione risposte'),
            'sondaggi_id' => AmosSondaggi::t('amossondaggi', 'Sondaggio'),
            'sondaggi_map_id' => AmosSondaggi::t('amossondaggi',
                'Mappa il valore che inserir?? l\'utente in uno dei seguenti campi'),
            'introduzione' => AmosSondaggi::t('amossondaggi',
                'Descrizione introduttiva, verr?? visualizzata prima della domanda (non vincolata alla presenza della stessa)'),
            'introduzione_condizionata' => AmosSondaggi::t('amossondaggi',
                'Descrizione introduttiva vincolata, verr?? visualizzata prima della domanda (?? vincolata alla presenza della stessa)'),
            'ordinamento' => AmosSondaggi::t('amossondaggi', 'Ordinamento'),
            'min_int_multipla' => AmosSondaggi::t('amossondaggi', 'Selezioni minime'),
            'max_int_multipla' => AmosSondaggi::t('amossondaggi', 'Selezioni massime'),
            'nome_classe_validazione' => AmosSondaggi::t('amossondaggi', 'Nome della classe Validatrice'),
            'modello_risposte_id' => AmosSondaggi::t('amossondaggi', 'Modello'),     
            'sondaggi_domande_pagine_id' => AmosSondaggi::t('amossondaggi', 'Pagina'),
            'sondaggi_domande_tipologie_id' => AmosSondaggi::t('amossondaggi', 'Tipo risposta'),
            'abilita_ordinamento_risposte' => AmosSondaggi::t('amossondaggi', 'Abilita ordinamento delle risposte'),
            'created_at' => AmosSondaggi::t('amossondaggi', 'Creato il'),
            'updated_at' => AmosSondaggi::t('amossondaggi', 'Aggiornato il'),
            'deleted_at' => AmosSondaggi::t('amossondaggi', 'Cancellato il'),
            'created_by' => AmosSondaggi::t('amossondaggi', 'Creato da'),
            'updated_by' => AmosSondaggi::t('amossondaggi', 'Aggiornato da'),
            'deleted_by' => AmosSondaggi::t('amossondaggi', 'Cancellato da'),
            'version' => AmosSondaggi::t('amossondaggi', 'Versione'),
            'domanda_per_criteri' => AmosSondaggi::t('amossondaggi', 'Utilizza le risposte come criterio di valutazione'),
            'punteggio_max' => AmosSondaggi::t('amossondaggi', 'Punteggio massimo in caso di domanda per criteri'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSondaggi()
    {
        return $this->hasOne(\arter\amos\sondaggi\models\Sondaggi::className(), ['id' => 'sondaggi_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSondaggiDomandePagine()
    {
        return $this->hasOne(\arter\amos\sondaggi\models\SondaggiDomandePagine::className(),
                    ['id' => 'sondaggi_domande_pagine_id'])
                ->andWhere([\arter\amos\sondaggi\models\SondaggiDomandePagine::tableName().'.deleted_at' => null]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSondaggiDomandeTipologie()
    {
        return $this->hasOne(\arter\amos\sondaggi\models\SondaggiDomandeTipologie::className(),
                ['id' => 'sondaggi_domande_tipologie_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSondaggiDomandeCondizionates()
    {
        return $this->hasMany(\arter\amos\sondaggi\models\SondaggiDomandeCondizionate::className(),
                    ['sondaggi_domande_id' => 'id'])
                ->andWhere([\arter\amos\sondaggi\models\SondaggiDomandeCondizionate::tableName().'.deleted_at' => null]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSondaggiRispostePredefinitesCondizionate()
    {
        return $this->hasOne(\arter\amos\sondaggi\models\SondaggiRispostePredefinite::className(),
                ['id' => 'sondaggi_risposte_predefinite_id'])->viaTable('sondaggi_domande_condizionate',
                ['sondaggi_domande_id' => 'id'],
                function ($query) {
                /* @var $query \yii\db\ActiveQuery */

                $query->andWhere(['sondaggi_domande_condizionate.deleted_at' => null]);
            });
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSondaggiRispostes()
    {
        return $this->hasMany(\arter\amos\sondaggi\models\SondaggiRisposte::className(),
                ['sondaggi_domande_id' => 'id'])->andWhere([\arter\amos\sondaggi\models\SondaggiRisposte::tableName().'.deleted_at' => null]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSondaggiRispostePredefinites()
    {
        return $this->hasMany(\arter\amos\sondaggi\models\SondaggiRispostePredefinite::className(),
                ['sondaggi_domande_id' => 'id'])->andWhere([\arter\amos\sondaggi\models\SondaggiRispostePredefinite::tableName().'.deleted_at' => null]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMapField()
    {
        return $this->hasOne(\arter\amos\sondaggi\models\SondaggiMap::className(), ['id' => 'sondaggi_map_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModello()
    {
        return $this->hasOne(\arter\amos\sondaggi\models\SondaggiModelliPredefiniti::className(), ['id' => 'modello_risposte_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSondaggiDomandeRuleMms()
    {
        return $this->hasMany(\arter\amos\sondaggi\models\SondaggiDomandeRuleMm::className(),
                ['sondaggi_domande_id' => 'id']);
    }

    /**
    * @return \yii\db\ActiveQuery
    */
    public function getDomandaCondizionataTestoLibero()
    {
    return $this->hasOne(\arter\amos\sondaggi\models\SondaggiDomande::className(), ['id' => 'domanda_condizionata_testo_libero']);
    }
}