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
 * @package    arter\amos\admin\views\user-profile
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

use arter\amos\admin\AmosAdmin;
?>

<div class="listview-container">

    <div class="bk-listViewElement">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-2">
            <img class="img-responsive" src="<?= $model->getAvatarUrl('small') ?>" alt="<?= $model ?>"/>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-10">
            <h2><?= $model ?></h2>

            <h3><?= $model->getIndirizzoCompleto() ?></h3>
        </div>

        <div class="bk-elementActions">
            <a href="/admin/user-profile/view?id=<?= $model->id ?>"><button class="btn btn-success"><?= AmosAdmin::t('amosadmin', 'Visualizza') ?></button></a>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
 