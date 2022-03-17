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

use arter\amos\core\migration\AmosMigrationPermissions;
use yii\rbac\Permission;

/**
 * Class m180611_115155_userprofile_notvalidated_workflow_status_permissions
 */
class m180611_115155_userprofile_notvalidated_workflow_status_permissions extends AmosMigrationPermissions
{
    const WORKFLOW_NAME = 'UserProfileWorkflow';
    
    /**
     * @inheritdoc
     */
    protected function setRBACConfigurations()
    {
        return [
            [
                'name' => self::WORKFLOW_NAME . '/NOTVALIDATED',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'UserProfileWorkflow status permission: Not Validated',
                'parent' => ['ADMIN', 'FACILITATOR']
            ]
        ];
    }
}
