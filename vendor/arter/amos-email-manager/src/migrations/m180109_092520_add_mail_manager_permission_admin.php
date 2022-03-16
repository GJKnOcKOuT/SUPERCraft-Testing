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
 * @package    arter\amos\email
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

use arter\amos\core\migration\AmosMigrationPermissions;
use yii\rbac\Permission;

/**
 * Class m180109_092520_add_mail_manager_permission_admin
 */
class m180109_092520_add_mail_manager_permission_admin extends AmosMigrationPermissions
{

    /**
     * @inheritdoc
     */
    protected function setRBACConfigurations()
    {

        return [
            [
                'name' => 'AMMINISTRATORE_EMAIL_MANAGER',
                'update' => true,
                'newValues' => [
                    'addParents' => ['ADMIN']
                ]
            ],

        ];
    }
}