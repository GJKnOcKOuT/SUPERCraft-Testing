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
 * @package    arter\amos\admin\models\search
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

namespace arter\amos\admin\models\search;

use arter\amos\admin\models\UserProfileArea;

/**
 * Class UserProfileAreaSearch
 * @package arter\amos\admin\models\search
 */
class UserProfileAreaSearch extends UserProfileArea
{
    /**
     * This search method retrieve all elements in the table. You can specify if you want
     * only the enabled elements by set to true the "onlyEnabled" param. You can set the
     * order by the "order" param equal to che orderBy method of an ActiveQuery.
     * The query find the element ordered by default by the "order" field ASC.
     * @param bool $onlyEnabled Default to true
     * @param array $order Default to ['order' => SORT_ASC]
     * @return UserProfileArea[]
     */
    public static function searchAll($onlyEnabled = true, $order = null)
    {
        $defaultOrder = ['order' => SORT_ASC];
        $queryOrder = ((!is_null($order) && is_array($order) && isset($order['order']) && is_numeric($order['order'])) ? $order : $defaultOrder);
        /** @var \yii\db\ActiveQuery $query */
        $query = UserProfileArea::find();
        $query->orderBy($queryOrder);
        if ($onlyEnabled) {
            $query->andWhere(['enabled' => 1]);
        }
        return $query->asArray()->all();
    }
}