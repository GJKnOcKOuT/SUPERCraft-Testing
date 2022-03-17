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


/** @var View $this */
/** @var AuditMail $model */

use arter\amos\audit\components\Helper;
use arter\amos\audit\models\AuditMail;

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\DetailView;

$this->title = Yii::t('audit', 'Mail #{id}', ['id' => $model->id]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('audit', 'Audit'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('audit', 'Mails'), 'url' => ['index']];
$this->params['breadcrumbs'][] = '#' . $model->id;

echo Html::tag('h1', $this->title);

echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        [
            'attribute' => 'entry_id',
            'value' => $model->entry_id ? Html::a($model->entry_id, ['entry/view', 'id' => $model->entry_id]) : '',
            'format' => 'raw',
        ],
        'successful',
        'to',
        'from',
        'reply',
        'cc',
        'bcc',
        'subject',
        [
            'label' => Yii::t('audit', 'Download'),
            'value' => ($model->data !== null) ? Html::a(Yii::t('audit', 'Download eml file'), ['mail/download', 'id' => $model->id]) : null,
            'format' => 'raw',
        ],
        'created',
    ],
]);

echo Html::tag('h2', Yii::t('audit', 'Text'));
echo '<div class="well">';
echo Yii::$app->formatter->asNtext($model->text);
echo '</div>';

echo Html::tag('h2', Yii::t('audit', 'HTML'));
echo '<div class="well">';
echo '<iframe src="' . Url::to(['mail/view-html', 'id' => $model->id]) . '" style="width:100%;" onload="this.style.height = this.contentWindow.document.body.scrollHeight + \'px\';" frameborder="0"></iframe>';
//echo Yii::$app->formatter->asHtml($model->html);
echo '</div>';

//echo Html::tag('h2', Yii::t('audit', 'Data'));
//echo '<div class="well">';
//echo Yii::$app->formatter->asNtext(Helper::uncompress($model->data));
//echo '</div>';