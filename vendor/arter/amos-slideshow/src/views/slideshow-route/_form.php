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
 * @package    arter\amos\slideshow
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

use arter\amos\core\forms\ActiveForm;
use arter\amos\core\forms\CloseSaveButtonWidget;
use arter\amos\core\forms\CreatedUpdatedWidget;
use arter\amos\core\forms\Tabs;
use arter\amos\slideshow\AmosSlideshow;

/**
 * @var yii\web\View $this
 * @var \arter\amos\slideshow\models\SlideshowRoute $model
 * @var yii\widgets\ActiveForm $form
 */

?>

<div class="slideshow-route-form col-xs-12 nop">
    
    <?php $form = ActiveForm::begin(); ?>
    
    <?php $this->beginBlock('generale'); ?>

    <div class="col-lg-6 col-sm-6">
        
        <?= // generated by schmunk42\giiant\generators\crud\providers\RelationProvider::activeField
        $form->field($model, 'slideshow_id')->dropDownList(
            \yii\helpers\ArrayHelper::map(\arter\amos\slideshow\models\Slideshow::find()->all(), 'id', 'name'),
            ['prompt' => AmosSlideshow::t('amosslideshow', 'Select')]
        ); ?>
    </div>

    <div class="col-lg-6 col-sm-6">
        
        <?= $form->field($model, 'route')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="clearfix"></div>
    <?php $this->endBlock(); ?>
    
    <?php $itemsTab[] = [
        'label' => AmosSlideshow::tHtml('amosslideshow', 'Generale '),
        'content' => $this->blocks['generale'],
    ];
    ?>
    
    <?= Tabs::widget([
        'encodeLabels' => false,
        'items' => $itemsTab
    ]); ?>
    <div class="col-xs-12 note_asterisk nop">
        <p>I campi <span class="red">*</span> sono obbligatori.</p>
    </div>
    <?= CreatedUpdatedWidget::widget(['model' => $model]) ?>
    <?= CloseSaveButtonWidget::widget(['model' => $model]); ?>
    <?php ActiveForm::end(); ?>
</div>
