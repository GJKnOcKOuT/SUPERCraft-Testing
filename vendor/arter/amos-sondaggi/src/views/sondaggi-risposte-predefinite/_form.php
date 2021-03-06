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


use arter\amos\core\forms\ActiveForm;
use arter\amos\core\forms\CloseSaveButtonWidget;
use arter\amos\core\forms\CreatedUpdatedWidget;
use arter\amos\sondaggi\AmosSondaggi;
use arter\amos\sondaggi\assets\ModuleSondaggiRisposteAsset;
use yii\bootstrap\Tabs;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

ModuleSondaggiRisposteAsset::register($this);

/**
 * @var yii\web\View $this
 * @var arter\amos\sondaggi\models\SondaggiRispostePredefinite $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="sondaggi-risposte-predefinite-form">
    
    <?php $form = ActiveForm::begin(); ?>
    
    <?php $this->beginBlock('generale'); ?>
    
    <?php
    if ($model->tipo_domanda) :
        $model->tipo_domanda = $model->tipo_domanda;
        ?>
        <div class="row">
            <div class="col-xs-12">
                <?= $form->field($model, 'tipo_domanda')->hiddenInput()->label(FALSE) ?>
                <?= Html::beginTag('div', ['class' => 'form-group field-tipo-domanda']) ?>
                <?= Html::tag('label', $model->getAttributeLabel('tipo_domanda')) ?>
                <?= Html::tag('div', $model->tipologiaDomanda->tipologia, [
                    'class' => 'bold'
                ]) ?>
                <?= Html::endTag('div') ?>
            </div>
        </div>
        
        <?php
    endif;
    ?>
    <div class="row">
        <div class="col-xs-12">
            <?php
            if ($model->sondaggi_domande_id) :
                $model->sondaggi_domande_id = $model->sondaggi_domande_id;
                ?>
                <?= $form->field($model, 'sondaggi_domande_id')->hiddenInput()->label(FALSE) ?>
                <?= Html::beginTag('div', ['class' => 'form-group field-id-domanda']) ?>
                <?= Html::tag('label', $model->getAttributeLabel('sondaggi_domande_id')) ?>
                <?= Html::tag('div', $model->sondaggiDomande->domanda, [
                'class' => 'bold'
            ]) ?>
                <?= Html::endTag('div') ?>
                <?php
            else :
                ?>
                <?=
                $form->field($model, 'sondaggi_domande_id')->dropDownList(
                    ArrayHelper::map(\arter\amos\sondaggi\models\SondaggiDomande::find()->asArray()->all(), 'id', 'domanda'), ['prompt' => AmosSondaggi::t('amossondaggi', 'Seleziona la domanda ...'), 'id' => 'sondaggi_domande_id-id']);
                ?>
                <?php
            endif;
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?php echo Html::button(AmosSondaggi::t('amossondaggi', 'Importa risposte predefinite'), [
                'class' => 'btn btn-primary pull-right',
                'data-toggle' => 'modal',
                'data-target' => '#modalImport',
            ]); ?>
        </div>
        <div class="col-sm-12">
            <?= $form->field($model, 'risposta')->textarea(['rows' => 4]) ?>
        </div>
        <div class="col-xs-12">
            <?= $form->field($model, 'ordine')->inline()->radioList(['inizio' => 'All\'inizio', 'fine' => 'Alla fine', 'dopo' => 'Dopo la seguente risposta'], ['id' => 'ordinamento-radio-risposta'])->label(AmosSondaggi::t('amossondaggi','Posiziona la risposta') . ':') ?>
        </div>
        <div class="col-xs-12">
            <?= $form->field($model, 'ordina_dopo')->dropDownList(ArrayHelper::map($model->getTutteRisposteSondaggio()->all(), 'id', 'risposta'), ['id' => 'ordina-dopo-risposta'])->label(FALSE); ?>
        </div>
    </div>
    <div class="clearfix"></div>
    <?php $this->endBlock(); ?>
    
    <?php
    $itemsTab[] = [
        'label' => AmosSondaggi::t('amossondaggi', 'generale '),
        'content' => $this->blocks['generale'],
    ];
    ?>
    
    <?=
    Tabs::widget(
        [
            'encodeLabels' => false,
            'items' => $itemsTab
        ]
    );
    ?>
    
    <?= CreatedUpdatedWidget::widget(['model' => $model]) ?>
    <?php if ($model->isNewRecord && isset($model->sondaggi_domande_id) && !$url) : ?>
        <div class="row">
            <div class="col-xs-12 text-center">
                <?= Html::submitButton(AmosSondaggi::tHtml('amossondaggi', 'Inserisci e vai a nuova pagina'), ['class' => 'btn btn-success', 'id' => 'submit-pagina', 'name' => 'pagina']); ?>
                <?= Html::submitButton(AmosSondaggi::tHtml('amossondaggi', 'Inserisci e vai a nuova domanda'), ['class' => 'btn btn-success', 'id' => 'submit-domanda', 'name' => 'domanda']); ?>
            </div>
        </div>
        <hr/>
        <?= CloseSaveButtonWidget::widget([
            'model' => $model,
            'buttonNewSaveLabel' => $model->isNewRecord ? AmosSondaggi::tHtml('amossondaggi', 'Inserisci un\'altra risposta') : AmosSondaggi::tHtml('amossondaggi', 'Salva'),
            'closeButtonLabel' => AmosSondaggi::t('amossondaggi', 'Chiudi'),
        ]); ?>
    <?php else : ?>
        <?= CloseSaveButtonWidget::widget([
            'model' => $model,
            'buttonNewSaveLabel' => $model->isNewRecord ? AmosSondaggi::tHtml('amossondaggi', 'Inserisci') : AmosSondaggi::tHtml('amossondaggi', 'Salva'),
            'closeButtonLabel' => AmosSondaggi::t('amossondaggi', 'Chiudi'),
        ]); ?>
    <?php endif; ?>
    
    <?php ActiveForm::end(); ?>
</div>

<?php
    echo $this->render('_modal_import_risposte', ['model' => $model, 'sondaggi_domande_id' => $model->sondaggi_domande_id]);
?>
