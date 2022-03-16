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
 * @package    arter\amos\admin\migrations
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

use arter\amos\core\migration\AmosMigrationWorkflow;

/**
 * Class m180605_103843_admin_userprofile_add_validated_to_tovalidate_transition
 */
class m180605_103843_admin_userprofile_add_validated_to_tovalidate_transition extends AmosMigrationWorkflow
{
    const WORKFLOW_NAME = 'UserProfileWorkflow';
    
    /**
     * @inheritdoc
     */
    protected function setWorkflow()
    {
        return [
            [
                'type' => AmosMigrationWorkflow::TYPE_WORKFLOW_TRANSITION,
                'workflow_id' => self::WORKFLOW_NAME,
                'start_status_id' => 'VALIDATED',
                'end_status_id' => 'TOVALIDATE'
            ]
        ];
    }
}
