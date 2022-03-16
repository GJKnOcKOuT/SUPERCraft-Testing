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

namespace yii\db\conditions;

use yii\base\InvalidArgumentException;

/**
 * Class BetweenCondition represents a `BETWEEN` condition.
 *
 * @author Dmytro Naumenko <d.naumenko.a@gmail.com>
 * @since 2.0.14
 */
class BetweenCondition implements ConditionInterface
{
    /**
     * @var string $operator the operator to use (e.g. `BETWEEN` or `NOT BETWEEN`)
     */
    private $operator;
    /**
     * @var mixed the column name to the left of [[operator]]
     */
    private $column;
    /**
     * @var mixed beginning of the interval
     */
    private $intervalStart;
    /**
     * @var mixed end of the interval
     */
    private $intervalEnd;


    /**
     * Creates a condition with the `BETWEEN` operator.
     *
     * @param mixed $column the literal to the left of $operator
     * @param string $operator the operator to use (e.g. `BETWEEN` or `NOT BETWEEN`)
     * @param mixed $intervalStart beginning of the interval
     * @param mixed $intervalEnd end of the interval
     */
    public function __construct($column, $operator, $intervalStart, $intervalEnd)
    {
        $this->column = $column;
        $this->operator = $operator;
        $this->intervalStart = $intervalStart;
        $this->intervalEnd = $intervalEnd;
    }

    /**
     * @return string
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * @return mixed
     */
    public function getColumn()
    {
        return $this->column;
    }

    /**
     * @return mixed
     */
    public function getIntervalStart()
    {
        return $this->intervalStart;
    }

    /**
     * @return mixed
     */
    public function getIntervalEnd()
    {
        return $this->intervalEnd;
    }

    /**
     * {@inheritdoc}
     * @throws InvalidArgumentException if wrong number of operands have been given.
     */
    public static function fromArrayDefinition($operator, $operands)
    {
        if (!isset($operands[0], $operands[1], $operands[2])) {
            throw new InvalidArgumentException("Operator '$operator' requires three operands.");
        }

        return new static($operands[0], $operator, $operands[1], $operands[2]);
    }
}
