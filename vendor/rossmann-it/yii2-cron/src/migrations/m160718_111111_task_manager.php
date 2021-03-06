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

/**
 * Updates tasks table
 * @author rossmann-it
 */
class m160718_111111_task_manager extends Migration {

    /**
     * for Oracle you need to overwrite the typeMap in \yii\db\oci\QueryBuilder
     * to get an equivalent for AUTO_INCREMENT, for example
     * 'NUMBER(10) GENERATED BY DEFAULT ON NULL AS IDENTITY PRIMARY KEY'
     */
    public function safeUp() {
        $this->addColumn('tasks', 'locked', $this->boolean()->notNull()->defaultValue(0));
    }

    public function safeDown() {
        $this->dropColumn('tasks', 'locked');
    }
}
