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
 * @package    arter\amos\discussioni\migrations
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

use arter\amos\core\migration\AmosMigrationWorkflow;

/**
 * Class m180620_115428_user_profile_workflow_refactor_metadata_v2
 */
class m180620_115428_user_profile_workflow_refactor_metadata_v2 extends AmosMigrationWorkflow
{

    // PER OGNI WORKFLOW ID CONST
    const WORKFLOW_NAME = 'UserProfileWorkflow';
    const WORKFLOW_DRAFT = 'DRAFT';
    const WORKFLOW_TOVALIDATE = 'TOVALIDATE';
    const WORKFLOW_VALIDATED = 'VALIDATED';

    /**
     * @inheritdoc
     */
    protected function setWorkflow()
    {
        return array_merge($this->removeMetadata(), $this->addMetadata());
    }

    private function removeMetadata() {

        return [
            // USERPROFILE WORKFLOW
            // "DRAFT" status
            [
                'type' => AmosMigrationWorkflow::TYPE_WORKFLOW_METADATA,
                'workflow_id' => self::WORKFLOW_NAME,
                'status_id' => self::WORKFLOW_DRAFT,
                'key' => 'buttonLabel',
                'value' => '#' . self::WORKFLOW_DRAFT . '_buttonLabel',
                'remove' => true,
            ],
            [
                'type' => AmosMigrationWorkflow::TYPE_WORKFLOW_METADATA,
                'workflow_id' => self::WORKFLOW_NAME,
                'status_id' => self::WORKFLOW_DRAFT,
                'key' => 'description',
                'value' => '#' . self::WORKFLOW_DRAFT . '_description',
                'remove' => true,
            ],
            [
                'type' => AmosMigrationWorkflow::TYPE_WORKFLOW_METADATA,
                'workflow_id' => self::WORKFLOW_NAME,
                'status_id' => self::WORKFLOW_DRAFT,
                'key' => 'label',
                'value' => '#' . self::WORKFLOW_DRAFT . '_label',
                'remove' => true,
            ],
            [
                'type' => AmosMigrationWorkflow::TYPE_WORKFLOW_METADATA,
                'workflow_id' => self::WORKFLOW_NAME,
                'status_id' => self::WORKFLOW_DRAFT,
                'key' => self::WORKFLOW_TOVALIDATE . '_buttonLabel',
                'value' => '#' . self::WORKFLOW_DRAFT . '_' . self::WORKFLOW_TOVALIDATE . '_buttonLabel',
                'remove' => true,
            ],
            [
                'type' => AmosMigrationWorkflow::TYPE_WORKFLOW_METADATA,
                'workflow_id' => self::WORKFLOW_NAME,
                'status_id' => self::WORKFLOW_DRAFT,
                'key' => self::WORKFLOW_TOVALIDATE . '_description',
                'value' => '#' . self::WORKFLOW_DRAFT . '_' . self::WORKFLOW_TOVALIDATE . '_description',
                'remove' => true,
            ],
            [
                'type' => AmosMigrationWorkflow::TYPE_WORKFLOW_METADATA,
                'workflow_id' => self::WORKFLOW_NAME,
                'status_id' => self::WORKFLOW_DRAFT,
                'key' => self::WORKFLOW_VALIDATED.'_buttonLabel',
                'value' => '#'.self::WORKFLOW_DRAFT.'_'.self::WORKFLOW_VALIDATED.'_buttonLabel',
                'remove' => true,
            ],
            [
                'type' => AmosMigrationWorkflow::TYPE_WORKFLOW_METADATA,
                'workflow_id' => self::WORKFLOW_NAME,
                'status_id' => self::WORKFLOW_DRAFT,
                'key' => self::WORKFLOW_VALIDATED.'_description',
                'value' => '#'.self::WORKFLOW_DRAFT.'_'.self::WORKFLOW_VALIDATED.'_description',
                'remove' => true,
            ],
            [
                'type' => AmosMigrationWorkflow::TYPE_WORKFLOW_METADATA,
                'workflow_id' => self::WORKFLOW_NAME,
                'status_id' => self::WORKFLOW_DRAFT,
                'key' => 'simplifiedMessage',
                'value' => '#'.self::WORKFLOW_DRAFT.'_simplifiedMessage',
                'remove' => true,
            ],
            // TOVALIDATE
            [
                'type' => AmosMigrationWorkflow::TYPE_WORKFLOW_METADATA,
                'workflow_id' => self::WORKFLOW_NAME,
                'status_id' => self::WORKFLOW_TOVALIDATE,
                'key' => 'buttonLabel',
                'value' => '#' . self::WORKFLOW_TOVALIDATE . '_buttonLabel',
                'remove' => true,
            ],
            [
                'type' => AmosMigrationWorkflow::TYPE_WORKFLOW_METADATA,
                'workflow_id' => self::WORKFLOW_NAME,
                'status_id' => self::WORKFLOW_TOVALIDATE,
                'key' => 'description',
                'value' => '#' . self::WORKFLOW_TOVALIDATE . '_description',
                'remove' => true,
            ],
            [
                'type' => AmosMigrationWorkflow::TYPE_WORKFLOW_METADATA,
                'workflow_id' => self::WORKFLOW_NAME,
                'status_id' => self::WORKFLOW_TOVALIDATE,
                'key' => 'label',
                'value' => '#' . self::WORKFLOW_TOVALIDATE . '_label',
                'remove' => true,
            ],
            [
                'type' => AmosMigrationWorkflow::TYPE_WORKFLOW_METADATA,
                'workflow_id' => self::WORKFLOW_NAME,
                'status_id' => self::WORKFLOW_TOVALIDATE,
                'key' => 'message',
                'value' => '#' . self::WORKFLOW_TOVALIDATE . '_message',
                'remove' => true,
            ],
            [
                'type' => AmosMigrationWorkflow::TYPE_WORKFLOW_METADATA,
                'workflow_id' => self::WORKFLOW_NAME,
                'status_id' => self::WORKFLOW_TOVALIDATE,
                'key' => 'simplifiedMessage',
                'value' => '#' . self::WORKFLOW_TOVALIDATE . '_simplifiedMessage',
                'remove' => true,
            ],
            [
                'type' => AmosMigrationWorkflow::TYPE_WORKFLOW_METADATA,
                'workflow_id' => self::WORKFLOW_NAME,
                'status_id' => self::WORKFLOW_TOVALIDATE,
                'key' => self::WORKFLOW_VALIDATED . '_description',
                'value' => '#' . self::WORKFLOW_TOVALIDATE . '_' . self::WORKFLOW_VALIDATED . '_description',
                'remove' => true,
            ],
            // VALIDATED
            [
                'type' => AmosMigrationWorkflow::TYPE_WORKFLOW_METADATA,
                'workflow_id' => self::WORKFLOW_NAME,
                'status_id' => self::WORKFLOW_VALIDATED,
                'key' => 'buttonLabel',
                'value' => '#' . self::WORKFLOW_VALIDATED . '_buttonLabel',
                'remove' => true,
            ],
            [
                'type' => AmosMigrationWorkflow::TYPE_WORKFLOW_METADATA,
                'workflow_id' => self::WORKFLOW_NAME,
                'status_id' => self::WORKFLOW_VALIDATED,
                'key' => 'description',
                'value' => '#' . self::WORKFLOW_VALIDATED . '_description',
                'remove' => true,
            ],
            [
                'type' => AmosMigrationWorkflow::TYPE_WORKFLOW_METADATA,
                'workflow_id' => self::WORKFLOW_NAME,
                'status_id' => self::WORKFLOW_VALIDATED,
                'key' => 'label',
                'value' => '#' . self::WORKFLOW_VALIDATED . '_label',
                'remove' => true,
            ],
            [
                'type' => AmosMigrationWorkflow::TYPE_WORKFLOW_METADATA,
                'workflow_id' => self::WORKFLOW_NAME,
                'status_id' => self::WORKFLOW_VALIDATED,
                'key' => 'message',
                'value' => '#' . self::WORKFLOW_VALIDATED . '_message',
                'remove' => true,
            ],
            [
                'type' => AmosMigrationWorkflow::TYPE_WORKFLOW_METADATA,
                'workflow_id' => self::WORKFLOW_NAME,
                'status_id' => self::WORKFLOW_VALIDATED,
                'key' => 'simplifiedMessage',
                'value' => '#' . self::WORKFLOW_VALIDATED . '_simplifiedMessage',
                'remove' => true,
            ],
            // -----------------------------------------------------------
        ];

    }

    private function addMetadata() {

        return [
            // USERPROFILE WORKFLOW
            // "DRAFT" status
            [
                'type' => AmosMigrationWorkflow::TYPE_WORKFLOW_METADATA,
                'workflow_id' => self::WORKFLOW_NAME,
                'status_id' => self::WORKFLOW_DRAFT,
                'key' => 'buttonLabel',
                'value' => '#' . self::WORKFLOW_DRAFT . '_buttonLabel_v2'
            ],
            [
                'type' => AmosMigrationWorkflow::TYPE_WORKFLOW_METADATA,
                'workflow_id' => self::WORKFLOW_NAME,
                'status_id' => self::WORKFLOW_DRAFT,
                'key' => 'description',
                'value' => '#' . self::WORKFLOW_DRAFT . '_description_v2'
            ],
            [
                'type' => AmosMigrationWorkflow::TYPE_WORKFLOW_METADATA,
                'workflow_id' => self::WORKFLOW_NAME,
                'status_id' => self::WORKFLOW_DRAFT,
                'key' => 'label',
                'value' => '#' . self::WORKFLOW_DRAFT . '_label_v2'
            ],
            [
                'type' => AmosMigrationWorkflow::TYPE_WORKFLOW_METADATA,
                'workflow_id' => self::WORKFLOW_NAME,
                'status_id' => self::WORKFLOW_DRAFT,
                'key' => self::WORKFLOW_TOVALIDATE . '_buttonLabel',
                'value' => '#' . self::WORKFLOW_DRAFT . '_' . self::WORKFLOW_TOVALIDATE . '_buttonLabel_v2'
            ],
            [
                'type' => AmosMigrationWorkflow::TYPE_WORKFLOW_METADATA,
                'workflow_id' => self::WORKFLOW_NAME,
                'status_id' => self::WORKFLOW_DRAFT,
                'key' => self::WORKFLOW_TOVALIDATE . '_description',
                'value' => '#' . self::WORKFLOW_DRAFT . '_' . self::WORKFLOW_TOVALIDATE . '_description_v2'
            ],
            [
                'type' => AmosMigrationWorkflow::TYPE_WORKFLOW_METADATA,
                'workflow_id' => self::WORKFLOW_NAME,
                'status_id' => self::WORKFLOW_DRAFT,
                'key' => self::WORKFLOW_VALIDATED.'_buttonLabel',
                'value' => '#'.self::WORKFLOW_DRAFT.'_'.self::WORKFLOW_VALIDATED.'_buttonLabel_v2'
            ],
            [
                'type' => AmosMigrationWorkflow::TYPE_WORKFLOW_METADATA,
                'workflow_id' => self::WORKFLOW_NAME,
                'status_id' => self::WORKFLOW_DRAFT,
                'key' => self::WORKFLOW_VALIDATED.'_description',
                'value' => '#'.self::WORKFLOW_DRAFT.'_'.self::WORKFLOW_VALIDATED.'_description_v2'
            ],
            [
                'type' => AmosMigrationWorkflow::TYPE_WORKFLOW_METADATA,
                'workflow_id' => self::WORKFLOW_NAME,
                'status_id' => self::WORKFLOW_DRAFT,
                'key' => 'simplifiedMessage',
                'value' => '#'.self::WORKFLOW_DRAFT.'_simplifiedMessage_v2'
            ],
            // TOVALIDATE
            [
                'type' => AmosMigrationWorkflow::TYPE_WORKFLOW_METADATA,
                'workflow_id' => self::WORKFLOW_NAME,
                'status_id' => self::WORKFLOW_TOVALIDATE,
                'key' => 'buttonLabel',
                'value' => '#' . self::WORKFLOW_TOVALIDATE . '_buttonLabel_v2'
            ],
            [
                'type' => AmosMigrationWorkflow::TYPE_WORKFLOW_METADATA,
                'workflow_id' => self::WORKFLOW_NAME,
                'status_id' => self::WORKFLOW_TOVALIDATE,
                'key' => 'description',
                'value' => '#' . self::WORKFLOW_TOVALIDATE . '_description_v2'
            ],
            [
                'type' => AmosMigrationWorkflow::TYPE_WORKFLOW_METADATA,
                'workflow_id' => self::WORKFLOW_NAME,
                'status_id' => self::WORKFLOW_TOVALIDATE,
                'key' => 'label',
                'value' => '#' . self::WORKFLOW_TOVALIDATE . '_label_v2'
            ],
            [
                'type' => AmosMigrationWorkflow::TYPE_WORKFLOW_METADATA,
                'workflow_id' => self::WORKFLOW_NAME,
                'status_id' => self::WORKFLOW_TOVALIDATE,
                'key' => 'message',
                'value' => '#' . self::WORKFLOW_TOVALIDATE . '_message_v2'
            ],
            [
                'type' => AmosMigrationWorkflow::TYPE_WORKFLOW_METADATA,
                'workflow_id' => self::WORKFLOW_NAME,
                'status_id' => self::WORKFLOW_TOVALIDATE,
                'key' => 'simplifiedMessage',
                'value' => '#' . self::WORKFLOW_TOVALIDATE . '_simplifiedMessage_v2'
            ],
            [
                'type' => AmosMigrationWorkflow::TYPE_WORKFLOW_METADATA,
                'workflow_id' => self::WORKFLOW_NAME,
                'status_id' => self::WORKFLOW_TOVALIDATE,
                'key' => self::WORKFLOW_VALIDATED . '_description',
                'value' => '#' . self::WORKFLOW_TOVALIDATE . '_' . self::WORKFLOW_VALIDATED . '_description_v2'
            ],
            // VALIDATED
            [
                'type' => AmosMigrationWorkflow::TYPE_WORKFLOW_METADATA,
                'workflow_id' => self::WORKFLOW_NAME,
                'status_id' => self::WORKFLOW_VALIDATED,
                'key' => 'buttonLabel',
                'value' => '#' . self::WORKFLOW_VALIDATED . '_buttonLabel_v2'
            ],
            [
                'type' => AmosMigrationWorkflow::TYPE_WORKFLOW_METADATA,
                'workflow_id' => self::WORKFLOW_NAME,
                'status_id' => self::WORKFLOW_VALIDATED,
                'key' => 'description',
                'value' => '#' . self::WORKFLOW_VALIDATED . '_description_v2'
            ],
            [
                'type' => AmosMigrationWorkflow::TYPE_WORKFLOW_METADATA,
                'workflow_id' => self::WORKFLOW_NAME,
                'status_id' => self::WORKFLOW_VALIDATED,
                'key' => 'label',
                'value' => '#' . self::WORKFLOW_VALIDATED . '_label_v2'
            ],
            [
                'type' => AmosMigrationWorkflow::TYPE_WORKFLOW_METADATA,
                'workflow_id' => self::WORKFLOW_NAME,
                'status_id' => self::WORKFLOW_VALIDATED,
                'key' => 'message',
                'value' => '#' . self::WORKFLOW_VALIDATED . '_message_v2'
            ],
            [
                'type' => AmosMigrationWorkflow::TYPE_WORKFLOW_METADATA,
                'workflow_id' => self::WORKFLOW_NAME,
                'status_id' => self::WORKFLOW_VALIDATED,
                'key' => 'simplifiedMessage',
                'value' => '#' . self::WORKFLOW_VALIDATED . '_simplifiedMessage_v2'
            ],
            // -----------------------------------------------------------
        ];

    }

}
