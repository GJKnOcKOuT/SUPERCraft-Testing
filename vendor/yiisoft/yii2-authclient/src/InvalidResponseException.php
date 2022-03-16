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
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace yii\authclient;

use yii\base\Exception;

/**
 * InvalidResponseException represents an exception caused by invalid remote server response.
 *
 * @author Paul Klimov <klimov.paul@gmail.com>
 * @since 2.0
 */
class InvalidResponseException extends Exception
{
    /**
     * @var \yii\httpclient\Response HTTP response instance.
     * @since 2.1
     */
    public $response;


    /**
     * Constructor.
     * @param \yii\httpclient\Response $response response body
     * @param string $message error message
     * @param int $code error code
     * @param \Exception $previous The previous exception used for the exception chaining.
     */
    public function __construct($response, $message = null, $code = 0, \Exception $previous = null)
    {
        $this->response = $response;
        parent::__construct($message, $code, $previous);
    }
}