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

use arter\amos\cwh\AmosCwh;

/**
 * @var yii\web\View $this
 * @var arter\amos\cwh\models\CwhConfig $model
 */

$this->title = AmosCwh::t('amoscwh', 'Crea {modelClass}', [
    'modelClass' => 'Cwh Config',
]);
$this->params['breadcrumbs'][] = ['label' => AmosCwh::t('amoscwh', 'Cwh Config'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cwh-config-create">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>