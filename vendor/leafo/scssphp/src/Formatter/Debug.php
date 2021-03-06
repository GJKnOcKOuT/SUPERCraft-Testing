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
 * SCSSPHP
 *
 * @copyright 2012-2018 Leaf Corcoran
 *
 * @license http://opensource.org/licenses/MIT MIT
 *
 * @link http://leafo.github.io/scssphp
 */

namespace Leafo\ScssPhp\Formatter;

use Leafo\ScssPhp\Formatter;
use Leafo\ScssPhp\Formatter\OutputBlock;

/**
 * Debug formatter
 *
 * @author Anthon Pang <anthon.pang@gmail.com>
 */
class Debug extends Formatter
{
    /**
     * {@inheritdoc}
     */
    public function __construct()
    {
        $this->indentLevel = 0;
        $this->indentChar = '';
        $this->break = "\n";
        $this->open = ' {';
        $this->close = ' }';
        $this->tagSeparator = ', ';
        $this->assignSeparator = ': ';
        $this->keepSemicolons = true;
    }

    /**
     * {@inheritdoc}
     */
    protected function indentStr()
    {
        return str_repeat('  ', $this->indentLevel);
    }

    /**
     * {@inheritdoc}
     */
    protected function blockLines(OutputBlock $block)
    {
        $indent = $this->indentStr();

        if (empty($block->lines)) {
            $this->write("{$indent}block->lines: []\n");

            return;
        }

        foreach ($block->lines as $index => $line) {
            $this->write("{$indent}block->lines[{$index}]: $line\n");
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function blockSelectors(OutputBlock $block)
    {
        $indent = $this->indentStr();

        if (empty($block->selectors)) {
            $this->write("{$indent}block->selectors: []\n");

            return;
        }

        foreach ($block->selectors as $index => $selector) {
            $this->write("{$indent}block->selectors[{$index}]: $selector\n");
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function blockChildren(OutputBlock $block)
    {
        $indent = $this->indentStr();

        if (empty($block->children)) {
            $this->write("{$indent}block->children: []\n");

            return;
        }

        $this->indentLevel++;

        foreach ($block->children as $i => $child) {
            $this->block($child);
        }

        $this->indentLevel--;
    }

    /**
     * {@inheritdoc}
     */
    protected function block(OutputBlock $block)
    {
        $indent = $this->indentStr();

        $this->write("{$indent}block->type: {$block->type}\n" .
             "{$indent}block->depth: {$block->depth}\n");

        $this->currentBlock = $block;

        $this->blockSelectors($block);
        $this->blockLines($block);
        $this->blockChildren($block);
    }
}
