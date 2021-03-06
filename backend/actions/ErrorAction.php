<?php
/**
 * Copyright 2020 Art-ER S. Cons. P.A.
 * EROI - Emilia Romagna Open Innovation is based on:
 * https://www.open2.0.regione.lombardia.it
 *
 * @package    arter
 * @category   CategoryName
 */
/**
 */

namespace backend\actions;


class ErrorAction extends \yii\web\ErrorAction
{
    const ASSISTENZA_MODULE = 0;
    const ASSISTENZA_PLATFORM_URL = 1;
    const ASSISTENZA_PLATFORM_MAIL = 2;

    public $errors_managed = ['404', '403', '500'];
    public $mailAddress;

    function run()
    {

        $exception = \Yii::$app->errorHandler->exception;

        if (in_array($exception->statusCode, $this->errors_managed)) {
            return $this->controller->render("error$exception->statusCode", ['exception' => $exception],['assistance' => $this->assistanceType()],['mailAddress' => $this->mailAddress]);
        } else {
            return $this->controller->render('error', ['exception' => $exception],['assistance' => $this->assistanceType()],['mailAddress' => $this->mailAddress]);
        }
    }

    function assistanceType()
    {
        //Pickup assistance params
        $assistance = isset(\Yii::$app->params['assistance']) ? \Yii::$app->params['assistance'] : [];

        //Check if is in email mode
        $isMail = ((isset($assistance['type']) && $assistance['type'] == 'email') || (!isset($assistance['type']) && isset(\Yii::$app->params['email-assistenza']))) ? true : false;
        $this->mailAddress = isset($assistance['email']) ? $assistance['email'] : (isset(\Yii::$app->params['email-assistenza']) ? \Yii::$app->params['email-assistenza'] : '');

        if (isset(\Yii::$app->params['assistance-url'])) {
            return (self::ASSISTENZA_MODULE);
        } elseif (isset(\Yii::$app->modules['assistance-request'])) {
            return (self::ASSISTENZA_PLATFORM_URL);
        }
        if ((isset($assistance['enabled']) && $assistance['enabled']) || (!isset($assistance['enabled']) && isset(\Yii::$app->params['email-assistenza']))) {
            return (self::ASSISTENZA_PLATFORM_MAIL);
        }
        return '';


    }

}