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

use arter\amos\core\migration\AmosMigrationPermissions;

/**
 * Class m170914_135007_add_validatore_news_to_validator_role
 */
class m180522_171607_delete_community_manager_rule extends AmosMigrationPermissions
{
    /**
     * @inheritdoc
     */
    protected function setRBACConfigurations()
    {
        return [
            [
                'name' => \arter\amos\discussioni\rules\DeleteCommunityManagerDiscussioniRule::className(),
                'type' => \yii\rbac\Permission::TYPE_PERMISSION,
                'description' => 'Regola per cancellare una discussionw se sei CM',
                'ruleName' =>  \arter\amos\discussioni\rules\DeleteCommunityManagerDiscussioniRule::className(),
                'parent' => ['CREATORE_DISCUSSIONI'],
                'children' => ['DISCUSSIONITOPIC_DELETE']
            ]
        ];
    }
}
