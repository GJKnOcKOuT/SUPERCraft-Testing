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

/* SVN FILE: $Id$ */
/**
 * SassIfNode class file.
 * @author      Chris Yates <chris.l.yates@gmail.com>
 * @copyright   Copyright (c) 2010 PBM Web Development
 * @license      http://phamlp.googlecode.com/files/license.txt
 * @package      PHamlP
 * @subpackage  Sass.tree
 */

/**
 * SassIfNode class.
 * Represents Sass If, Else If and Else statements.
 * Else If and Else statement nodes are chained below the If statement node.
 * @package      PHamlP
 * @subpackage  Sass.tree
 */
class SassIfNode extends SassNode
{
  const MATCH_IF = '/^@if\s*(.+)$/i';
  const MATCH_ELSE = '/@else(\s*if\s*(.+))?/i';
  const IF_EXPRESSION = 1;
  const ELSE_IF = 1;
  const ELSE_EXPRESSION = 2;
  /**
   * @var SassIfNode the next else node.
   */
  private $else;
  /**
   * @var string expression to evaluate
   */
  private $expression;

  /**
   * SassIfNode constructor.
   * @param object $token source token
   * @param boolean $if true for an "if" node, false for an "else if | else" node
   * @return SassIfNode
   */
  public function __construct($token, $if=true)
  {
    parent::__construct($token);
    if ($if) {
      preg_match(self::MATCH_IF, $token->source, $matches);
      $this->expression = $matches[SassIfNode::IF_EXPRESSION];
    } else {
      preg_match(self::MATCH_ELSE, $token->source, $matches);
      $this->expression = (sizeof($matches)==1 ? null : $matches[SassIfNode::ELSE_EXPRESSION]);
    }
  }

  /**
   * Adds an "else" statement to this node.
   * @param SassIfNode "else" statement node to add
   * @return SassIfNode this node
   */
  public function addElse($node)
  {
    if ($this->else === null) {
      $node->parent  = $this;
      $node->root    = $this->root;
      $this->else    = $node;
    } else {
      $this->else->addElse($node);
    }

    return $this;
  }

  /**
   * Parse this node.
   * @param SassContext $context the context in which this node is parsed
   * @return array parsed child nodes
   */
  public function parse($context)
  {
    if ($this->isElse() || $this->evaluate($this->expression, $context)->toBoolean()) {
      $children = $this->parseChildren($context);
    } elseif (!empty($this->else)) {
      $children = $this->else->parse($context);
    } else {
      $children = array();
    }

    return $children;
  }

  /**
   * Returns a value indicating if this node is an "else" node.
   * @return true if this node is an "else" node, false if this node is an "if"
   * or "else if" node
   */
  private function isElse()
  {
    return ($this->expression=='');
  }
}
