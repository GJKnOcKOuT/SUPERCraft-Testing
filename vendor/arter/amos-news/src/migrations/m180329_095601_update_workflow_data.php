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
 * @package    arter\amos\news\migrations
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

/**
 * Class m180329_095601_update_workflow_data
 */
class m180329_095601_update_workflow_data extends \arter\amos\core\migration\AmosMigration
{
    const MODULE_NAME = 'news';

    /**
     * @inheritdoc
     */
    public function safeUp()
    {

        $this->delete('sw_transition', 'workflow_id LIKE "%News%"');

        $this->db->createCommand("
        
        INSERT INTO `sw_transition` (`workflow_id`, `start_status_id`, `end_status_id`) VALUES
        ('NewsWorkflow',	'BOZZA',	'DAVALIDARE'),
        ('NewsWorkflow',	'DAVALIDARE',	'BOZZA'),
        ('NewsWorkflow',	'DAVALIDARE',	'VALIDATO'),
        ('NewsWorkflow',	'VALIDATO',	'BOZZA');
        
        ")->execute();

        $this->delete('sw_metadata', 'workflow_id LIKE "%News%"');

        $this->db->createCommand("
        
        INSERT INTO `sw_metadata` (`workflow_id`, `status_id`, `key`, `value`) VALUES
        ('NewsWorkflow',	'BOZZA',	'class',	'btn btn-navigation-primary'),
        ('NewsWorkflow',	'BOZZA',	'DAVALIDARE_description',	'richiedi un intervento al redattore'),
        ('NewsWorkflow',	'BOZZA',	'DAVALIDARE_label',	'Rifiuta pubblicazione'),
        ('NewsWorkflow',	'BOZZA',	'DAVALIDARE_message',	'Vuoi rifiutare questa notizia?'),
        ('NewsWorkflow',	'BOZZA',	'description',	'Notizia in modifica'),
        ('NewsWorkflow',	'BOZZA',	'label',	'Puoi ancora modificare la notizia e inviare la richiesta di pubblicazione'),
        ('NewsWorkflow',	'BOZZA',	'VALIDATO_description',	'riporta la notizia in \"bozza\" e richiedi un intervento al redattore'),
        ('NewsWorkflow',	'BOZZA',	'VALIDATO_label',	'Togli dalla pubblicazione'),
        ('NewsWorkflow',	'DAVALIDARE',	'class',	'btn btn-navigation-primary'),
        ('NewsWorkflow',	'DAVALIDARE',	'description',	'invia la richiesta di validazione della notizia. La notizia non potr?? pi?? essere modificata'),
        ('NewsWorkflow',	'DAVALIDARE',	'label',	'La notizia ?? in attesa di approvazione per la pubblicazione e non pu?? essere modificata'),
        ('NewsWorkflow',	'DAVALIDARE',	'BOZZA_label',	'Richiedi Pubblicazione'),
        ('NewsWorkflow',	'DAVALIDARE',	'message',	'Vuoi richiedere la pubblicazione di questa notizia?'),
        ('NewsWorkflow',	'VALIDATO',	'class',	'btn btn-navigation-primary'),
        ('NewsWorkflow',	'VALIDATO',	'DAVALIDARE_description',	'pubblica la notizia'),
        ('NewsWorkflow',	'VALIDATO',	'DAVALIDARE_label',	'Pubblica'),
        ('NewsWorkflow',	'VALIDATO',	'description',	'La notizia verr?? validata'),
        ('NewsWorkflow',	'VALIDATO',	'label',	'La notizia ?? stata pubblicata con successo'),
        ('NewsWorkflow',	'VALIDATO',	'message',	'Vuoi pubblicare questa notizia?'),
        ('NewsWorkflow',	'VALIDATO',	'order',	'1');
        
        ")->execute();

        $this->delete('sw_status', 'workflow_id LIKE "%News%"');

        $this->db->createCommand("
        
        INSERT INTO `sw_status` (`id`, `workflow_id`, `label`, `sort_order`) VALUES
        ('BOZZA',	'NewsWorkflow',	'Modifica in corso',	0),
        ('DAVALIDARE',	'NewsWorkflow',	'Richiedi pubblicazione',	1),
        ('VALIDATO',	'NewsWorkflow',	'Validato',	2);
        
        ")->execute();

        return true;

    }

    public function safeDown()
    {

        echo "Reverting new workflow state updates is not expected.\n";
        return true;

    }
}
