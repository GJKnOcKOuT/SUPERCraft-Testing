<?php
/**
 * Copyright 2020 Art-ER S. Cons. P.A.
 * EROI - Emilia Romagna Open Innovation is based on:
 * https://www.open2.0.regione.lombardia.it
 *
 * @package    backend\modules\tickets\views\default
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

use arter\amos\core\helpers\Html;

$this->title = Yii::t('backend', "Contatta l'assistenza");
//$this->params['breadcrumbs'][] = $this->title;
?>

<div id="wrap-contacts">
    <section class="inner-section">
        <br>
            <div  id ="contact-form" class="col-xs-12 container-form nop">
                <?php $form = \arter\amos\core\forms\ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);?>
                <div class="contact-form">
                    <?php /** @var $modelForm \backend\modules\tickets\models\ContactForm */?>
                    <div >

                        <div class="row">
                            <div class="col-sm-6">
                                <?=$form->field($modelForm, 'first_name')?>
                            </div>
                            <div class="col-sm-6">
                                <?=$form->field($modelForm, 'surname')?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <?=$form->field($modelForm, 'email')?>
                            </div>
                            <div class="col-sm-6">
                                <?=$form->field($modelForm, 'telephone')?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <?=$form->field($modelForm, 'attachment')->widget(\kartik\file\FileInput::classname(), [
                                    'pluginOptions' => [
                                        'showPreview' => true,
                                        'showCaption' => true,
                                        'showRemove' => true,
                                        'showUpload' => false,
                                        'allowedPreviewTypes' => ['image', 'text'],
                                    ],
                                    'options' => [
                                        'disabled' => false],
                                ]);
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <?=$form->field($modelForm, 'subject')?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12" >
                                <?=$form->field($modelForm, 'message')->textarea(['rows' => 6])?>
                            </div>
                        </div>
<!--                        <div class="col-lg-6" >-->
<!--                            --><?php //echo $form->field($modelForm, 'verifyCode')->widget(\yii\captcha\Captcha::className(), ['captchaAction' => 'contact-form/captcha'])?>
<!--                        </div>-->
                        <?=\arter\amos\core\helpers\Html::submitButton( Yii::t('backend','Invia'),['class' => 'btn btn-primary btn-primary-search pull-right m-t-25' ])?>
                        <?php \arter\amos\core\forms\ActiveForm::end(); ?>

                    </div>
                </div>
            </div>
    </section>

</div>
