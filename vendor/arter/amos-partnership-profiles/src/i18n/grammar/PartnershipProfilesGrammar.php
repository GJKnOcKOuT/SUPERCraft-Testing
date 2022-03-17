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
 * @package    arter\amos\partnershipprofiles\i18n\grammar
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

namespace arter\amos\partnershipprofiles\i18n\grammar;

use arter\amos\core\interfaces\ModelGrammarInterface;
use arter\amos\partnershipprofiles\Module;

/**
 * Class PartnershipProfilesGrammar
 * @package arter\amos\partnershipprofiles\i18n\grammar
 */
class PartnershipProfilesGrammar implements ModelGrammarInterface
{
    /**
     * @inheritdoc
     */
    public function getModelSingularLabel()
    {
        return Module::t('amospartnershipprofiles', '#partnership_profiles_singular');
    }
    
    /**
     * @inheritdoc
     */
    public function getModelLabel()
    {
        return Module::t('amospartnershipprofiles', '#partnership_profiles_plural');
    }
    
    /**
     * @inheritdoc
     */
    public function getArticleSingular()
    {
        return Module::t('amospartnershipprofiles', '#partnership_profiles_article_singular');
    }
    
    /**
     * @inheritdoc
     */
    public function getArticlePlural()
    {
        return Module::t('amospartnershipprofiles', '#partnership_profiles_article_plural');
    }
    
    /**
     * @inheritdoc
     */
    public function getIndefiniteArticle()
    {
        return Module::t('amospartnershipprofiles', '#partnership_profiles_indefinite_article');
    }
}
