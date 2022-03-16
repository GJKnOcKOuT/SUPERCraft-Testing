<?php
/**
 * Copyright 2020 Art-ER S. Cons. P.A.
 * EROI - Emilia Romagna Open Innovation is based on:
 * https://www.open2.0.regione.lombardia.it
 *
 * @package    arter
 * @category   CategoryName
 */

use arter\amos\core\icons\AmosIcons;
use arter\amos\core\helpers\Html;

/* ASSISTANCE CONTROL LIKE PARTS/ASSISTANCE */
//Pickup assistance params
$assistance = isset(\Yii::$app->params['assistance']) ? \Yii::$app->params['assistance'] : [];

//Check if is in email mode
$isMail = ((isset($assistance['type']) && $assistance['type'] == 'email') || (!isset($assistance['type']) && isset(\Yii::$app->params['email-assistenza']))) ? true : false;
$mailAddress = isset($assistance['email']) ? $assistance['email'] : (isset(\Yii::$app->params['email-assistenza']) ? \Yii::$app->params['email-assistenza'] : '');
$prev = Yii::$app->session->get('previousUrl');
$previousUrl = !empty($prev) ? Yii::$app->session->get('previousUrl') : '/';

$this->title = Yii::t('amosplatform', 'Errore') . ' ' . $exception->statusCode . ' - ' . $exception->getMessage();
?>

<div class="col-md-12">
    <h3><?= \Yii::t('amosplatform', 'Accesso negato') ?></h3>
</div>
<div class="col-md-12">
    <?php

    echo Html::a(Yii::t('amosplatform', 'Torna indietro'), Yii::$app->request->referrer ?: Yii::$app->homeUrl, [
        'class' => 'btn btn-secondary pull-left'
    ]);
    ?>

    <?php if ((isset($assistance['enabled']) && $assistance['enabled']) || (!isset($assistance['enabled']) && isset(\Yii::$app->params['email-assistenza']))) { ?>
        <?= Html::a(
            \Yii::t('amosplatform', '#error_contact_helpdesk'),
            $isMail ? 'mailto:' . $mailAddress : (isset($assistance['url']) ? $assistance['url'] : ''),
            [
                'class' => 'btn btn-action-primary pull-right',
                'title' => \Yii::t('amosplatform', '#error_contact_helpdesk')
            ])
        ?>
    <?php } ?>

</div>
