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

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace yii\db\oci\conditions;

use yii\db\conditions\InCondition;
use yii\db\ExpressionInterface;

/**
 * {@inheritdoc}
 */
class InConditionBuilder extends \yii\db\conditions\InConditionBuilder
{
    /**
     * Method builds the raw SQL from the $expression that will not be additionally
     * escaped or quoted.
     *
     * @param ExpressionInterface|InCondition $expression the expression to be built.
     * @param array $params the binding parameters.
     * @return string the raw SQL that will not be additionally escaped or quoted.
     */
    public function build(ExpressionInterface $expression, array &$params = [])
    {
        $splitCondition = $this->splitCondition($expression, $params);
        if ($splitCondition !== null) {
            return $splitCondition;
        }

        return parent::build($expression, $params);
    }

    /**
     * Oracle DBMS does not support more than 1000 parameters in `IN` condition.
     * This method splits long `IN` condition into series of smaller ones.
     *
     * @param ExpressionInterface|InCondition $condition the expression to be built.
     * @param array $params the binding parameters.
     * @return null|string null when split is not required. Otherwise - built SQL condition.
     */
    protected function splitCondition(InCondition $condition, &$params)
    {
        $operator = $condition->getOperator();
        $values = $condition->getValues();
        $column = $condition->getColumn();

        if ($values instanceof \Traversable) {
            $values = iterator_to_array($values);
        }

        if (!is_array($values)) {
            return null;
        }

        $maxParameters = 1000;
        $count = count($values);
        if ($count <= $maxParameters) {
            return null;
        }

        $slices = [];
        for ($i = 0; $i < $count; $i += $maxParameters) {
            $slices[] = $this->queryBuilder->createConditionFromArray([$operator, $column, array_slice($values, $i, $maxParameters)]);
        }
        array_unshift($slices, ($operator === 'IN') ? 'OR' : 'AND');

        return $this->queryBuilder->buildCondition($slices, $params);
    }
}
