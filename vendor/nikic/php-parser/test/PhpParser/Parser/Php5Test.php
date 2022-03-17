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


namespace PhpParser\Parser;

use PhpParser\Lexer;
use PhpParser\ParserTest;

require_once __DIR__ . '/../ParserTest.php';

class Php5Test extends ParserTest {
    protected function getParser(Lexer $lexer) {
        return new Php5($lexer);
    }
}