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


use yii\db\Migration;

class m170331_083046_alter_bcc_blob extends Migration
{
    const TABLE_SPOOL = '{{%email_spool}}';

    private $tableName;

    public function up()
    {
        try {
            $this->alterColumn($this->tableName, 'bcc', 'LONGBLOB DEFAULT NULL');
        } catch (\Exception $ex) {
            echo $ex->getMessage();
        }

    }

    public function down()
    {
        echo "m170331_083046_alter_bcc_blob.\n";

        return false;
    }

    public function init()
    {
        parent::init();
        $this->tableName = $this->db->getSchema()->getRawTableName(self::TABLE_SPOOL);
    }
}
