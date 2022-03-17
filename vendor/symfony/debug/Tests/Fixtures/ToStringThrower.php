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


namespace Symfony\Component\Debug\Tests\Fixtures;

class ToStringThrower
{
    private $exception;

    public function __construct(\Exception $e)
    {
        $this->exception = $e;
    }

    public function __toString()
    {
        try {
            throw $this->exception;
        } catch (\Exception $e) {
            // Using user_error() here is on purpose so we do not forget
            // that this alias also should work alongside with trigger_error().
            return trigger_error($e, E_USER_ERROR);
        }
    }
}