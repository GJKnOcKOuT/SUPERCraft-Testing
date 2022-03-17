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
 * @package    arter\amos\core\interfaces
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

namespace arter\amos\core\interfaces;


interface ModelGrammarInterface
{

    /**
     * @return string The singular model name in translation label
     */

    public function  getModelSingularLabel();

    /**
     * @return string The model name in translation label
     */
    public function getModelLabel();

    /**
     * @return string
     */
    public function getArticleSingular();

    /**
     * @return string
     */
    public function  getArticlePlural();

    /**
     * @return string
     */
    public function getIndefiniteArticle();
}