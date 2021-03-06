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
 * SassWhileNode class file.
 * @author      Chris Yates <chris.l.yates@gmail.com>
 * @copyright   Copyright (c) 2010 PBM Web Development
 * @license      http://phamlp.googlecode.com/files/license.txt
 * @package      PHamlP
 * @subpackage  Sass.tree
 */

/**
 * SassWhileNode class.
 * Represents a Sass @while loop and a Sass @do loop.
 * @package      PHamlP
 * @subpackage  Sass.tree
 */
class SassWhileNode extends SassNode
{
  const MATCH = '/^@(do|while)\s+(.+)$/i';
  const LOOP = 1;
  const EXPRESSION = 2;
  const IS_DO = 'do';
  /**
   * @var boolean whether this is a do/while.
   * A do/while loop is guarenteed to run at least once.
   */
  private $isDo;
  /**
   * @var string expression to evaluate
   */
  private $expression;

  /**
   * SassWhileNode constructor.
   * @param object $token source token
   * @return SassWhileNode
   */
  public function __construct($token)
  {
    parent::__construct($token);
    preg_match(self::MATCH, $token->source, $matches);
    $this->expression = $matches[self::EXPRESSION];
    $this->isDo = ($matches[self::LOOP] === SassWhileNode::IS_DO);
  }

  /**
   * Parse this node.
   * @param SassContext $context the context in which this node is parsed
   * @return array the parsed child nodes
   */
  public function parse($context)
  {
    $children = array();
    if ($this->isDo) {
      do {
        $children = array_merge($children, $this->parseChildren($context));
      } while ($this->evaluate($this->expression, $context)->toBoolean());
    } else {
      while ($this->evaluate($this->expression, $context)->toBoolean()) {
        $children = array_merge($children, $this->parseChildren($context));
      }
    }

    return $children;
  }
}
