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
namespace dosamigos\google\maps;


/**
 * MapTypeId
 *
 * Identifiers for common MapTypes.
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\google\maps
 */
class MapTypeId
{
    const HYBRID = 'google.maps.MapTypeId.HYBRID';
    const ROADMAP = 'google.maps.MapTypeId.ROADMAP';
    const SATELLITE = 'google.maps.MapTypeId.SATELLITE';
    const TERRAIN = 'google.maps.MapTypeId.TERRAIN';

    /**
     * Checks whether value is a valid [MapTypeId] constant.
     * @param $value
     *
     * @return bool
     */
    public static function getIsValid($value){
        return in_array(
            $value,
            [
                static::HYBRID,
                static::ROADMAP,
                static::SATELLITE,
                static::TERRAIN
            ]
        );
    }
} 