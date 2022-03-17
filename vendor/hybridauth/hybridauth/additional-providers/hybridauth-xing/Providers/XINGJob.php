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
 * XingJob - XING Job listing
 *
 */

class XingJob
{
    // these is the list of all the fields that are/can be returned from the api
    public $id;
    public $location = array(
        'geo_code' => array(
            'accuracy',
            'latitude',
            'longitude',
        ),
        'city',
        'country',
        'street',
        'zip_code',
        'region',
    );
    public $title;
    public $published_at;
    public $company = array(
        'name',
        'id',
        'links' => array(),
    );
    public $links = array( 'pdf', 'self', 'xing' );
    public $contact = array(
        'company' => array(
            'name',
            'links' => array(
                array( 'xing', 'thumbnail', 'logo' ),
            ),
        ),
    );

    /**
     * XINGUser constructor.
     *
     * Create a XING user using with the data coming from the API response
     * @param  stdClass $oResponse the response coming from XING api request
     * @throws Exception
     */
    public function __construct( $oResponse )
    {
        self::createObject( $this, $oResponse );
    }

    private static function createObject( &$destination, stdClass $source )
    {
        $sourceReflection = new \ReflectionObject( $source );
        $sourceProperties = $sourceReflection->getProperties();
        foreach ($sourceProperties as $sourceProperty) {
            $name = $sourceProperty->getName();
            if (gettype( $destination->{$name} ) === 'object') {
                self::createObject( $destination->{$name}, $source->$name );
            } else {
                $destination->{$name} = $source->$name;
            }
        }
    }
}
