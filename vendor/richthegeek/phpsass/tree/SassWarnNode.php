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
 * SassReturnNode class file.
 * @author      Richard Lyon <richthegeek@gmail.com>
 * @copyright   none
 * @license     http://phamlp.googlecode.com/files/license.txt
 * @package     PHamlP
 * @subpackage  Sass.tree
 */

/**
 * SassReturnNode class.
 * Represents a Return.
 * @package      PHamlP
 * @subpackage  Sass.tree
 */
class SassWarnNode extends SassNode
{
  const NODE_IDENTIFIER = '+';
  const MATCH = '/^(@warn\s+)(["\']?)(.*?)(["\']?)$/i';
  const IDENTIFIER = 1;
  const STATEMENT = 3;

  /**
   * @var mixed statement to execute and return
   */
  private $statement;

	/**
	 * SassReturnNode constructor.
	 * @param object $token source token
	 * @return SassWarnNode|void
	 */
  public function __construct($token)
  {
    parent::__construct($token);
    preg_match(self::MATCH, $token->source, $matches);

    if (empty($matches)) {
      return new SassBoolean('false');
    }

    $this->statement = $matches[self::STATEMENT];
  }

  /**
   * Parse this node.
   * Set passed arguments and any optional arguments not passed to their
   * defaults, then render the children of the return definition.
   * @param SassContext $pcontext the context in which this node is parsed
   * @return array the parsed node
   */
  public function parse($pcontext)
  {
    $context = new SassContext($pcontext);
    $statement = $this->statement;

    try {
      $statement = $this->evaluate($this->statement, $context)->toString();
    } catch (Exception $e) {}

    if (SassParser::$instance->options['callbacks']['warn']) {
      call_user_func(SassParser::$instance->options['callbacks']['warn'], $statement, $context);
    }

    if (SassParser::$instance->getQuiet()) {
      return array(new SassString(''));
    } else {
      return array(new SassString('/* @warn: ' . str_replace('*/', '', $statement) . ' */'));
    }
  }

  /**
   * Returns a value indicating if the token represents this type of node.
   * @param object $token token
   * @return boolean true if the token represents this type of node, false if not
   */
  public static function isa($token)
  {
    return $token->source[0] === self::NODE_IDENTIFIER;
  }
}
