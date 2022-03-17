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


/*
 * This file is part of Mustache.php.
 *
 * (c) 2010-2017 Justin Hileman
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * @group unit
 */
class Mustache_Test_Loader_InlineLoaderTest extends PHPUnit_Framework_TestCase
{
    public function testLoadTemplates()
    {
        $loader = new Mustache_Loader_InlineLoader(__FILE__, __COMPILER_HALT_OFFSET__);
        $this->assertEquals('{{ foo }}', $loader->load('foo'));
        $this->assertEquals('{{#bar}}BAR{{/bar}}', $loader->load('bar'));
    }

    /**
     * @expectedException Mustache_Exception_UnknownTemplateException
     */
    public function testMissingTemplatesThrowExceptions()
    {
        $loader = new Mustache_Loader_InlineLoader(__FILE__, __COMPILER_HALT_OFFSET__);
        $loader->load('not_a_real_template');
    }

    /**
     * @expectedException Mustache_Exception_InvalidArgumentException
     */
    public function testInvalidOffsetThrowsException()
    {
        new Mustache_Loader_InlineLoader(__FILE__, 'notanumber');
    }

    /**
     * @expectedException Mustache_Exception_InvalidArgumentException
     */
    public function testInvalidFileThrowsException()
    {
        new Mustache_Loader_InlineLoader('notarealfile', __COMPILER_HALT_OFFSET__);
    }
}

__halt_compiler();

@@ foo
{{ foo }}

@@ bar
{{#bar}}BAR{{/bar}}
