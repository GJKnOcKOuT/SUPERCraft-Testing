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


use arter\amos\core\forms\CreatedUpdatedWidget;
use arter\amos\sondaggi\AmosSondaggi;
use kartik\widgets\ActiveForm;
use yii\bootstrap\Tabs;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var yii\web\View $this
 * @var arter\amos\sondaggi\models\SondaggiRisposte $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="sondaggi-risposte-form">
    
    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_VERTICAL]); ?>
    
    <?php $this->beginBlock('generale'); ?>

    <div class="col-lg-6 col-sm-6">
        
        <?= $form->field($model, 'risposta')->textarea(['rows' => 6]) ?>
    </div>

    <div class="col-lg-6 col-sm-6">
        
        <?=
        // generated by schmunk42\giiant\generators\crud\providers\RelationProvider::activeField
        $form->field($model, 'sondaggi_domande_id')->dropDownList(
            \yii\helpers\ArrayHelper::map(arter\amos\sondaggi\models\SondaggiDomande::find()->all(), 'id', 'id'), ['prompt' => AmosSondaggi::t('amossondaggi', 'Select')]
        );
        ?>
    </div>

    <div class="col-lg-6 col-sm-6">
        
        <?=
        // generated by schmunk42\giiant\generators\crud\providers\RelationProvider::activeField
        $form->field($model, 'pei_accessi_servizi_facilitazione_id')->dropDownList(
            \yii\helpers\ArrayHelper::map(backend\modules\peipoint\models\PeiAccessiServiziFacilitazione::find()->all(), 'id', 'id'), ['prompt' => AmosSondaggi::t('amossondaggi', 'Select')]
        );
        ?>
    </div>

    <div class="col-lg-6 col-sm-6">
        
        <?=
        // generated by schmunk42\giiant\generators\crud\providers\RelationProvider::activeField
        $form->field($model, 'sondaggi_risposte_sessioni_id')->dropDownList(
            \yii\helpers\ArrayHelper::map(arter\amos\sondaggi\models\SondaggiRisposteSessioni::find()->all(), 'id', 'id'), ['prompt' => AmosSondaggi::t('amossondaggi', 'Select')]
        );
        ?>
    </div>
    <div class="clearfix"></div>
    <?php $this->endBlock(); ?>
    
    <?php
    $itemsTab[] = [
        'label' => AmosSondaggi::tHtml('amossondaggi', 'generale '),
        'content' => $this->blocks['generale'],
    ];
    ?>
    
    <?= Tabs::widget(
        [
            'encodeLabels' => false,
            'items' => $itemsTab
        ]
    ); ?>
    <?= CreatedUpdatedWidget::widget(['model' => $model]) ?>
    <div id="form-actions" class="bk-btnFormContainer">
        <?= Html::a(AmosSondaggi::t('amossondaggi', 'Chiudi'), Url::previous(), [
            'class' => 'btn btn-warning'
        ]); ?>
        <?= Html::submitButton($model->isNewRecord ?
            AmosSondaggi::tHtml('amossondaggi', 'Inserisci') :
            AmosSondaggi::tHtml('amossondaggi', 'Salva'), [
            'class' => $model->isNewRecord ?
                'btn btn-success' :
                'btn btn-primary'
        ]); ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>