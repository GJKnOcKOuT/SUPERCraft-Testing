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
 * @package    arter\amos\ticket\models\base
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

namespace arter\amos\ticket\models\base;

use arter\amos\community\models\Community;
use arter\amos\core\record\Record;
use arter\amos\core\validators\StringHtmlValidator;
use arter\amos\ticket\AmosTicket;
use yii\helpers\ArrayHelper;

/**
 * Class TicketCategorie
 *
 * This is the base-model class for table "ticket_categorie".
 *
 * @property integer $id
 * @property string $titolo
 * @property string $sottotitolo
 * @property string $descrizione_breve
 * @property string $descrizione
 * @property integer $abilita_ticket
 * @property integer $attiva
 * @property integer $tecnica
 * @property string $email_tecnica
 * @property integer $categoria_padre_id
 * @property boolean $abilita_per_community
 * @property boolean $enable_dossier_id
 * @property boolean $enable_phone
 * @property string $technical_assistance_description
 * @property integer $community_id
 * @property boolean $filemanager_mediafile_id
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $deleted_by
 * @property integer $version
 *
 * @property \arter\amos\ticket\models\TicketCategorie $categoriaPadre
 * @property \arter\amos\ticket\models\base\TicketCategorieUsersMm[] $ticketCategorieUsersMms
 * @property Community $community
 * @property string $nomeCompleto
 *
 * @package  arter\amos\ticket\models\base
 */
class TicketCategorie extends Record
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ticket_categorie';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titolo'], 'required'],
            [['tecnica'], 'validateCategory'],
            [['descrizione', 'technical_assistance_description'], 'string'],
            [[
                'abilita_ticket',
                'attiva',
                'tecnica',
                'created_by',
                'updated_by',
                'deleted_by',
                'version',
                'categoria_padre_id',
                'abilita_per_community',
                'enable_dossier_id',
                'enable_phone',
                'community_id'
            ], 'integer'],
            [['created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['titolo', 'sottotitolo', 'descrizione_breve', 'email_tecnica'], 'string', 'max' => 255],
            [['descrizione'], StringHtmlValidator::className(), 'max' => 300],
        ];
    }

    public function validateCategory()
    {
        if ($this->tecnica && empty($this->email_tecnica)) {
            $this->addError("email_tecnica", 'Email tecnica obbligatoria se la categoria ?? una categoria tecnica');
        }
        if ($this->abilita_ticket) {
            /* if(!$this->tecnica && empty($this->ticketCategorieUsersMms)) {
              $this->addError("abilita_ticket", 'Se la categoria (non tecnica) ?? abilitata per l\'inserimento dei ticket, ci deve essere almeno un referente');
              } */
            if (!empty($this->categorieFiglie)) {
                $this->addError("abilita_ticket", 'Solo le categorie \'foglie\' possono essere abilitata per l\'inserimento dei ticket');
            }
        }

        if ($this->categoria_padre_id) {
            $categoriaPadre = TicketCategorie::findOne($this->categoria_padre_id);
            if ($categoriaPadre->abilita_ticket) {
                $this->addError("categoria_padre_id", "La categoria 'padre' ?? abilitata per l'inserimento dei ticket, quindi deve essere una foglia (non pu?? avere categorie figlie)");
            }

            // IFL-464: rimosso controllo per far inserire FAQ su qualsiasi categoria, sia essa padre o figlia.
            /*if (!empty($categoriaPadre->ticketFaq)) {
                $this->addError("categoria_padre_id", "La categoria 'padre' ha delle faq associate, quindi deve essere una foglia (non pu?? avere categorie figlie)");
            }*/
        }
    }

    /* Chiamata dal controller durante la creazione o modifica di una categoria */
    public function validateReferenti($idReferenti)
    {
        if (!$this->tecnica && $this->abilita_ticket) {
            if (empty($idReferenti)) {
                $this->addError("abilita_ticket", 'Se la categoria (non tecnica) ?? abilitata per l\'inserimento dei ticket, ci deve essere almeno un referente');
                return false;
            }
        }
        return true;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'id' => AmosTicket::t('amosticket', 'Id'),
            'titolo' => AmosTicket::t('amosticket', 'Titolo'),
            'sottotitolo' => AmosTicket::t('amosticket', 'Sottotitolo'),
            'descrizione_breve' => AmosTicket::t('amosticket', 'Descrizione breve'),
            'descrizione' => AmosTicket::t('amosticket', 'Descrizione'),
            'abilita_ticket' => AmosTicket::t('amosticket', 'Abilita creazione ticket'),
            'attiva' => AmosTicket::t('amosticket', 'Attiva'),
            'tecnica' => AmosTicket::t('amosticket', 'Tecnica'),
            'email_tecnica' => AmosTicket::t('amosticket', 'Indirizzo email per categoria tecnica'),
            'created_at' => AmosTicket::t('amosticket', 'Creato il'),
            'updated_at' => AmosTicket::t('amosticket', 'Aggiornato il'),
            'deleted_at' => AmosTicket::t('amosticket', 'Cancellato il'),
            'created_by' => AmosTicket::t('amosticket', 'Creato da'),
            'updated_by' => AmosTicket::t('amosticket', 'Aggiornato da'),
            'deleted_by' => AmosTicket::t('amosticket', 'Cancellato da'),
            'version' => AmosTicket::t('amosticket', 'Versione numero'),
            'categoria_padre_id' => AmosTicket::t('amosticket', 'Categoria padre'),
            'abilita_per_community' => AmosTicket::t('amosticket', '#is_category_for_community'),
            'enable_dossier_id' => AmosTicket::t('amosticket', 'Enable Dossier Id'),
            'enable_phone' => AmosTicket::t('amosticket', 'Enable Phone'),
            'nomeCompleto' => AmosTicket::t('amosticket', 'Categoria'),
            'technical_assistance_description' => AmosTicket::t('amosticket', 'Technical Assistance Description'),
        ]);
    }

    /**
     * This is the relation between the category and the father category.
     * Return an ActiveQuery related to TicketCategorie model.
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategoriaPadre()
    {
        return $this->hasOne(\arter\amos\ticket\models\TicketCategorie::className(), ['id' => 'categoria_padre_id']);
    }

    /**
     * Relation between category and sons categories
     * Returns an ActiveQuery related to model TicketCategorie.
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategorieFiglie()
    {
        return $this->hasMany(\arter\amos\ticket\models\TicketCategorie::className(), ['categoria_padre_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTicketCategorieUsersMms()
    {
        return $this->hasMany(\arter\amos\ticket\models\base\TicketCategorieUsersMm::className(), ['ticket_categoria_id' => 'id']);
    }

    public function getTicketFaq()
    {
        return $this->hasMany(\arter\amos\ticket\models\TicketFaq::className(), ['ticket_categoria_id' => 'id']);
    }

    public function getTicket()
    {
        return $this->hasMany(\arter\amos\ticket\models\Ticket::className(), ['ticket_categoria_id' => 'id']);
    }

    public function getNomeCompleto()
    {
        $nomeCompleto = $this->titolo;
        if ($this->categoria_padre_id) {
            $categoriaPadre = \arter\amos\ticket\models\TicketCategorie::findOne($this->categoria_padre_id);
            if ($categoriaPadre) {
                $nomeCompleto = $categoriaPadre->getNomeCompleto() . " > " . $nomeCompleto;
            }
        }
        return $nomeCompleto;
    }
}
