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
 * @copyright Copyright (c) 2014 2amigOS! Consulting Group LLC
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace dosamigos\google\maps\layers;


use dosamigos\google\maps\ObjectAbstract;
use yii\base\InvalidConfigException;

/**
 * Layer
 *
 * Base class where all layers extend from.
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\google\maps\layers
 */
class Layer extends ObjectAbstract
{

    /**
     * @var string the map name
     */
    public $map;

    /**
     * @throws \yii\base\InvalidConfigException
     */
    public function init()
    {
        if ($this->map == null) {
            throw new InvalidConfigException('"map" cannot be null');
        }
    }

    /**
     * Returns the javascript code required to initialize the object
     * @return mixed
     */
    public function getJs()
    {
        $name = $this->getName();
        $reflection = new \ReflectionClass($this);
        $object = $reflection->getShortName();
        $js[] = "var {$name} = new google.maps.{$object}();";
        $js[] = "$name.setMap({$this->map});";

        return implode("\n", $js);
    }

} 