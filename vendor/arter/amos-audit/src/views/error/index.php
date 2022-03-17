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


use yii\helpers\Html;
use yii\grid\GridView;

use arter\amos\audit\models\AuditErrorSearch;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel AuditErrorSearch */

$this->title = Yii::t('audit', 'Errors');
$this->params['breadcrumbs'][] = ['label' => Yii::t('audit', 'Audit'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="audit-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}'],
            [
                'attribute' => 'id',
                'options' => [
                    'width' => '80px',
                ],
            ],
            [
                'attribute' => 'entry_id',
                'class' => 'yii\grid\DataColumn',
                'value' => function ($data) {
                    return $data->entry_id ? Html::a($data->entry_id, ['entry/view', 'id' => $data->entry_id]) : '';
                },
                'format' => 'raw',
            ],
            [
                'filter' => AuditErrorSearch::messageFilter(),
                'attribute' => 'message',
            ],
            [
                'attribute' => 'code',
                'options' => [
                    'width' => '80px',
                ],
            ],
            [
                'filter' => AuditErrorSearch::fileFilter(),
                'attribute' => 'file',
            ],
            [
                'attribute' => 'line',
                'options' => [
                    'width' => '80px',
                ],
            ],
            [
                'attribute' => 'hash',
                'options' => [
                    'width' => '100px',
                ],
            ],
            [
                'attribute' => 'created',
                'options' => ['width' => '150px'],
            ],
        ],
    ]); ?>
</div>
