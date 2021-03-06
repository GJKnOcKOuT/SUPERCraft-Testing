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

class m191106_074648_task_create_table extends Migration {

    private $tabella = null;

    public function safeUp() {
        $this->execute("SET FOREIGN_KEY_CHECKS=0;");
        $this->execute("     
CREATE TABLE IF NOT EXISTS `task_sondaggi` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `command` VARCHAR(255) NULL DEFAULT NULL,
  `status` INT(11) NULL DEFAULT NULL,
  `filename` VARCHAR(255) NULL DEFAULT NULL,
  `created_at` DATETIME NULL DEFAULT NULL COMMENT 'Creato il',
  `updated_at` DATETIME NULL DEFAULT NULL COMMENT 'Aggiornato il',
  `deleted_at` DATETIME NULL DEFAULT NULL COMMENT 'Cancellato il',
  `created_by` INT(11) NULL DEFAULT NULL COMMENT 'Creato da',
  `updated_by` INT(11) NULL DEFAULT NULL COMMENT 'Aggiornato da',
  `deleted_by` INT(11) NULL DEFAULT NULL COMMENT 'Cancellato da',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;");

        $this->execute("SET FOREIGN_KEY_CHECKS=1;");

        return true;
    }

    /**
     *
     * @return boolean
     */
    public function safeDown() {

        $this->execute("SET FOREIGN_KEY_CHECKS = 0;");
        $this->dropTable("task_sondaggi");
        $this->execute("SET FOREIGN_KEY_CHECKS = 1;");

        return true;
    }

}
