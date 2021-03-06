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
 * A Mustache Template cascading loader implementation, which delegates to other
 * Loader instances.
 */
class Mustache_Loader_CascadingLoader implements Mustache_Loader
{
    private $loaders;

    /**
     * Construct a CascadingLoader with an array of loaders.
     *
     *     $loader = new Mustache_Loader_CascadingLoader(array(
     *         new Mustache_Loader_InlineLoader(__FILE__, __COMPILER_HALT_OFFSET__),
     *         new Mustache_Loader_FilesystemLoader(__DIR__.'/templates')
     *     ));
     *
     * @param Mustache_Loader[] $loaders
     */
    public function __construct(array $loaders = array())
    {
        $this->loaders = array();
        foreach ($loaders as $loader) {
            $this->addLoader($loader);
        }
    }

    /**
     * Add a Loader instance.
     *
     * @param Mustache_Loader $loader
     */
    public function addLoader(Mustache_Loader $loader)
    {
        $this->loaders[] = $loader;
    }

    /**
     * Load a Template by name.
     *
     * @throws Mustache_Exception_UnknownTemplateException If a template file is not found
     *
     * @param string $name
     *
     * @return string Mustache Template source
     */
    public function load($name)
    {
        foreach ($this->loaders as $loader) {
            try {
                return $loader->load($name);
            } catch (Mustache_Exception_UnknownTemplateException $e) {
                // do nothing, check the next loader.
            }
        }

        throw new Mustache_Exception_UnknownTemplateException($name);
    }
}
