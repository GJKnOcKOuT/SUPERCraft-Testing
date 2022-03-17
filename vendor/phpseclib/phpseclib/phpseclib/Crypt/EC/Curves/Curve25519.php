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
 * Curve25519
 *
 * PHP version 5 and 7
 *
 * @category  Crypt
 * @package   EC
 * @author    Jim Wigginton <terrafrost@php.net>
 * @copyright 2019 Jim Wigginton
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link      http://pear.php.net/package/Math_BigInteger
 */

namespace phpseclib3\Crypt\EC\Curves;

use phpseclib3\Math\Common\FiniteField\Integer;
use phpseclib3\Crypt\EC\BaseCurves\Montgomery;
use phpseclib3\Math\BigInteger;

class Curve25519 extends Montgomery
{
    public function __construct()
    {
        // 2^255 - 19
        $this->setModulo(new BigInteger('7FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFED', 16));
        $this->a24 = $this->factory->newInteger(new BigInteger('121666'));
        $this->p = [$this->factory->newInteger(new BigInteger(9))];
        // 2^252 + 0x14def9dea2f79cd65812631a5cf5d3ed
        $this->setOrder(new BigInteger('1000000000000000000000000000000014DEF9DEA2F79CD65812631A5CF5D3ED', 16));

        /*
        $this->setCoefficients(
            new BigInteger('486662'), // a
        );
        $this->setBasePoint(
            new BigInteger(9),
            new BigInteger('14781619447589544791020593568409986887264606134616475288964881837755586237401')
        );
        */
    }

    /**
     * Multiply a point on the curve by a scalar
     *
     * Modifies the scalar as described at https://tools.ietf.org/html/rfc7748#page-8
     *
     * @return array
     */
    public function multiplyPoint(array $p, Integer $d)
    {
        //$r = strrev(sodium_crypto_scalarmult($d->toBytes(), strrev($p[0]->toBytes())));
        //return [$this->factory->newInteger(new BigInteger($r, 256))];

        $d = $d->toBytes();
        $d&= "\xF8" . str_repeat("\xFF", 30) . "\x7F";
        $d = strrev($d);
        $d|= "\x40";
        $d = $this->factory->newInteger(new BigInteger($d, -256));

        return parent::multiplyPoint($p, $d);
    }
}