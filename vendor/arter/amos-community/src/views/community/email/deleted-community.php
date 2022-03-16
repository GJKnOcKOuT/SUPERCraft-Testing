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
 * @package    arter\amos\community\views\community\email
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

use arter\amos\community\AmosCommunity;

/**
 * @var yii\web\View $this
 * @var \arter\amos\community\utilities\EmailUtil $util
 */

?>

<div>
    <div style="box-sizing:border-box;">
        <div style="padding:5px 10px;background-color: #F2F2F2;">
            <h1 style="color:#297A38;text-align:center;font-size:1.5em;margin:0;"><?= AmosCommunity::t('amoscommunity', '#deleted_community_mail_subject') ?></h1>
        </div>
        <div style="border:1px solid #cccccc;padding:10px;margin-bottom: 10px;background-color: #ffffff; margin-top: 20px;">
            <?= AmosCommunity::t('amoscommunity', '#deleted_community_mail_text', ['communityTitle' => $util->community->name]) ?>
        </div>
    </div>
</div>
