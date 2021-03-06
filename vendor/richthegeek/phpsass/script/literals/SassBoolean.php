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
 * SassBoolean class file.
 * @author      Chris Yates <chris.l.yates@gmail.com>
 * @copyright   Copyright (c) 2010 PBM Web Development
 * @license      http://phamlp.googlecode.com/files/license.txt
 * @package      PHamlP
 * @subpackage  Sass.script.literals
 */

require_once 'SassLiteral.php';

/**
 * SassBoolean class.
 * @package      PHamlP
 * @subpackage  Sass.script.literals
 */
class SassBoolean extends SassLiteral
{
  /**@#+
   * Regex for matching and extracting booleans
   */
  const MATCH = '/^(true|false)\b/';

  /**
   * SassBoolean constructor
   * @param string $value value of the boolean type
   * @throws SassBooleanException
   * @return SassBoolean
   */
  public function __construct($value)
  {
    if (is_bool($value)) {
      $this->value = $value;
    } elseif ($value === 'true' || $value === 'false') {
      $this->value = ($value === 'true' ? true : false);
    } else {
      throw new SassBooleanException('Invalid SassBoolean', SassScriptParser::$context->node);
    }
  }

  /**
   * Returns the value of this boolean.
   * @return boolean the value of this boolean
   */
  public function getValue()
  {
    return $this->value;
  }

  /**
   * Returns a string representation of the value.
   * @return string string representation of the value.
   */
  public function toString()
  {
    return $this->getValue() ? 'true' : 'false';
  }

  public function length()
  {
      return 1;
  }

  public function nth($i)
  {
    if ($i == 1 && isset($this->value)) {
        return new SassBoolean($this->value);
    }

    return new SassBoolean(false);
  }

  /**
   * Returns a value indicating if a token of this type can be matched at
   * the start of the subject string.
   * @param string $subject the subject string
   * @return mixed match at the start of the string or false if no match
   */
  public static function isa($subject)
  {
    return (preg_match(self::MATCH, $subject, $matches) ? $matches[0] : false);
  }
}
