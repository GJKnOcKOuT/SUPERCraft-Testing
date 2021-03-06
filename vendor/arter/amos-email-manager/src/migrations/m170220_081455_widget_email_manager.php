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

use arter\amos\emailmanager\widgets\icons\WidgetIconEmailManager;
use yii\db\Migration;

class m170220_081455_widget_email_manager extends Migration
{
    private $perms;
    private $tabella = null;

    public function __construct()
    {
        $this->tabella = '{{%auth_item}}';
        parent::__construct();
    }

    private function setPermissionConfs()
    {
        $this->perms = array(

            array(
                'name' => WidgetIconEmailManager::className(),
                'type' => '2',
                'description' => 'Permesso di visualizzazione del widget Gestione email',
            )
        );
    }

    public function safeUp()
    {
        $this->setPermissionConfs();

        foreach ($this->perms as $singlePerm) {
            $cmd = $this->db->createCommand();
            $cmd->setSql("SELECT name FROM auth_item WHERE name LIKE '" . $singlePerm['name'] . "'");
            $authItems = $cmd->queryColumn();

            if (empty($authItems)) {
                $this->createNewPermission($singlePerm['name'], $singlePerm['type'], $singlePerm['description']);
                echo "Nuova permission " . $singlePerm['name'] . " creata.\n";
            } else {
                echo "Permission " . $singlePerm['name'] . " esistente. Skippo...\n";
            }
        }


        $this->batchInsert('{{%auth_item_child}}', ['parent', 'child'], [
            ['ADMIN', WidgetIconEmailManager::className()],
        ]);

        $now = date("Y-m-d H:i:s");
        $module = 'email';
        $status = 1;
        $userId = 1;
        $this->batchInsert('{{%amos_widgets}}', ['classname', 'type', 'module', 'status', 'child_of', 'created_by', 'created_at', 'updated_by', 'updated_at'], [
            [
                WidgetIconEmailManager::className(),
                'ICON',
                $module,
                $status,
                null,
                $userId,
                $now,
                $userId,
                $now
            ]
        ]);
    }

    /**
     * Metodo privato per la creazione della singola permission nella tabella auth_item
     *
     * @param string $name Nome univoco della permission
     * @param string $type Tipo della permission (0, 1, 2)
     * @param string $description Descrizione della permission
     */
    private function createNewPermission($name, $type, $description)
    {
        $this->insert($this->tabella, [
            'name' => $name,
            'type' => $type,
            'description' => $description
        ]);
    }

    public function safeDown()
    {
        $this->setPermissionConfs();

        foreach ($this->perms as $singlePerm) {
            $cmd = $this->db->createCommand();
            $cmd->setSql("SELECT name FROM auth_item WHERE name LIKE '" . addslashes(addslashes($singlePerm['name'])) . "'");
            $authItems = $cmd->queryColumn();

            if (!empty($authItems)) {
                $this->deletePermission($singlePerm['name']);
                echo "Permission " . $singlePerm['name'] . " eliminata.\n";
            } else {
                echo "Permission " . addslashes(addslashes($singlePerm['name'])) . " non trovata. Skippo...\n";
            }
        }
    }

    /**
     * Metodo privato per l'eliminazione di una permission dalla tabella auth_item
     *
     * @param string $name Nome univoco della permission
     */
    private function deletePermission($name)
    {
        $this->delete($this->tabella, [
            'name' => $name
        ]);
    }
}
