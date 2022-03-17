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
 * @package    arter\amos\sondaggi\migrations
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

use arter\amos\core\migration\AmosMigrationPermissions;
use yii\rbac\Permission;

/**
 * Class m180911_081424_new_compila_sondaggi_widgets_permissions
 */
class m180911_081424_new_compila_sondaggi_widgets_permissions extends AmosMigrationPermissions
{
    /**
     * @inheritdoc
     */
    protected function setRBACConfigurations()
    {
        $prefixStr = 'Permissions for the dashboard for the widget ';
        return [
            [
                'name' => 'COMPILATORE_SONDAGGI',
                'update' => true,
                'newValues' => [
                    'addParents' => ['AMMINISTRAZIONE_SONDAGGI']
                ]
            ],
            [
                'name' => \arter\amos\sondaggi\widgets\icons\WidgetIconCompilaSondaggiOwnInterest::className(),
                'type' => Permission::TYPE_PERMISSION,
                'description' => $prefixStr . 'WidgetIconCompilaSondaggiOwnInterest',
                'parent' => ['COMPILATORE_SONDAGGI']
            ],
            [
                'name' => \arter\amos\sondaggi\widgets\icons\WidgetIconCompilaSondaggiAll::className(),
                'type' => Permission::TYPE_PERMISSION,
                'description' => $prefixStr . 'WidgetIconCompilaSondaggiAll',
                'parent' => ['COMPILATORE_SONDAGGI']
            ]
        ];
    }
}
