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


use arter\amos\events\models\Event;
use arter\amos\events\models\EventParticipantCompanion;
use yii\db\Migration;

/**
 * Class m190529_112230_alter_table_event__event_participant_companion
 */
class m190529_112230_alter_table_event__event_participant_companion extends Migration
{
    private 
        $tableEventName,
        $tableEventParticipantCompanionName;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $this->tableEventName = Event::tableName();
        $this->tableEventParticipantCompanionName = EventParticipantCompanion::tableName();
    }

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = \Yii::$app->db->schema->getTableSchema($this->tableEventName);
        if (!isset($table->columns['email_subscribe_view'])) {
            $this->addColumn($this->tableEventName, 'email_subscribe_view', $this->string(400)->null()->comment('Event confirm mail layout')->after('ticket_layout_view'));
        }
        
        $table = \Yii::$app->db->schema->getTableSchema($this->tableEventParticipantCompanionName);
        if (!isset($table->columns['user_id'])) {
            $this->addColumn($this->tableEventParticipantCompanionName, 'user_id', $this->integer()->null()->comment('FK user id')->after('event_accreditation_list_id'));
            $this->addForeignKey('event_participant_companion_user_id_fk', $this->tableEventParticipantCompanionName, 'user_id', 'user', 'id', 'NO ACTION', 'NO ACTION');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn(Event::tableName(), 'email_subscribe_view');
        $this->dropColumn(EventParticipantCompanion::tableName(), 'user_id');
        $this->dropForeignKey(EventParticipantCompanion::tableName(), 'event_participant_companion_user_id_fk');
    }

}
