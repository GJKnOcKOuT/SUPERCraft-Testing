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
 * @package    arter\amos\community\migrations
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

use arter\amos\community\models\Community;
use arter\amos\community\rules\DeleteOwnCommunitiesRule;
use arter\amos\community\rules\UpdateOwnCommunitiesRule;
use arter\amos\core\migration\AmosMigrationPermissions;
use yii\helpers\ArrayHelper;
use yii\rbac\Permission;

/**
 * Class m170426_081216_add_new_community_roles
 */
class m170426_081216_add_new_community_roles extends AmosMigrationPermissions
{
    /**
     * @inheritdoc
     */
    protected function setRBACConfigurations()
    {
        return ArrayHelper::merge(
            $this->setPluginRoles(),
            $this->setModelPermissions(),
            $this->setWorkflowPermissions()
        );
    }

    private function setPluginRoles()
    {
        return [
            [
                'name' => 'COMMUNITY_CREATOR',
                'type' => Permission::TYPE_ROLE,
                'description' => 'Community creator role for community plugin',
                'ruleName' => null,
                'parent' => ['AMMINISTRATORE_COMMUNITY']
            ],
            [
                'name' => 'COMMUNITY_VALIDATOR',
                'type' => Permission::TYPE_ROLE,
                'description' => 'Community validator role for community plugin',
                'ruleName' => null,
                'parent' => ['AMMINISTRATORE_COMMUNITY']
            ],
            [
                'name' => 'COMMUNITY_READER',
                'type' => Permission::TYPE_ROLE,
                'description' => 'Platform community reader role for community plugin',
                'ruleName' => null,
                'parent' => ['AMMINISTRATORE_COMMUNITY']
            ],
        ];
    }

    private function setModelPermissions()
    {
        return [

            // Permessi per il model Community
            [
                'name' => 'COMMUNITY_CREATE',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Creation permission for model Community',
                'ruleName' => null,
                'parent' => ['COMMUNITY_CREATOR'],
                'dontRemove' => true
            ],
            [
                'name' => 'COMMUNITY_READ',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Read permission for model Community',
                'ruleName' => null,
                'parent' => ['COMMUNITY_CREATOR', 'COMMUNITY_READER', 'COMMUNITY_VALIDATOR'],
                'dontRemove' => true
            ],
            [
                'name' => 'COMMUNITY_UPDATE',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Update permission for model Community',
                'ruleName' => null,
                'parent' => [UpdateOwnCommunitiesRule::className(), 'COMMUNITY_VALIDATOR'],
                'dontRemove' => true
            ],
            [
                'name' => 'COMMUNITY_DELETE',
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Delete permission for model Community',
                'ruleName' => null,
                'parent' => [DeleteOwnCommunitiesRule::className()],
                'dontRemove' => true
            ],
            [
                'name' => UpdateOwnCommunitiesRule::className(),
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permission to modify own community',
                'ruleName' => UpdateOwnCommunitiesRule::className(),
                'parent' => ['COMMUNITY_CREATOR']
            ],
            [
                'name' => DeleteOwnCommunitiesRule::className(),
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permission to delete own community',
                'ruleName' => DeleteOwnCommunitiesRule::className(),
                'parent' => ['COMMUNITY_CREATOR']
            ]
        ];
    }

    private function setWorkflowPermissions()
    {
        return [
            [
                'name' => Community::COMMUNITY_WORKFLOW_STATUS_DRAFT,
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permession workflow community staus draft',
                'ruleName' => null,
                'parent' => ['COMMUNITY_CREATOR'],
                'dontRemove' => true
            ],
            [
                'name' => Community::COMMUNITY_WORKFLOW_STATUS_TO_VALIDATE,
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permession workflow community staus to validate',
                'ruleName' => null,
                'parent' => ['COMMUNITY_CREATOR', 'COMMUNITY_VALIDATOR'],
                'dontRemove' => true
            ],
            [
                'name' => Community::COMMUNITY_WORKFLOW_STATUS_VALIDATED,
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permession workflow community staus validated',
                'ruleName' => null,
                'parent' => ['COMMUNITY_VALIDATOR'],
                'dontRemove' => true
            ],
            [
                'name' => Community::COMMUNITY_WORKFLOW_STATUS_NOT_VALIDATED,
                'type' => Permission::TYPE_PERMISSION,
                'description' => 'Permession workflow community staus not validated',
                'ruleName' => null,
                'parent' => ['COMMUNITY_VALIDATOR'],
                'dontRemove' => true
            ]
        ];
    }
}
