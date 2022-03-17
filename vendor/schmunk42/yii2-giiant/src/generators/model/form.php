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


use schmunk42\giiant\generators\model\Generator;
use schmunk42\giiant\helpers\SaveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $generator yii\gii\generators\form\Generator */

/*
 * JS for listbox "Saved Form"
 * on chenging listbox, form fill with selected saved forma data
 * currently work with input text, input checkbox and select form fields
 */
$this->registerJs(SaveForm::getSavedFormsJs($generator->getName()), yii\web\View::POS_END);
$this->registerJs(SaveForm::jsFillForm(), yii\web\View::POS_END);
echo $form->field($generator, 'savedForm')->dropDownList(
        SaveForm::getSavedFormsListbox($generator->getName()), ['onchange' => 'fillForm(this.value)']
);

echo $form->field($generator, 'tableName');
echo $form->field($generator, 'tablePrefix');
echo $form->field($generator, 'modelClass');
echo $form->field($generator, 'ns');
echo $form->field($generator, 'baseClass');
echo $form->field($generator, 'db');
echo $form->field($generator, 'generateRelations')->dropDownList([
    Generator::RELATIONS_NONE => Yii::t('giiant', 'No relations'),
    Generator::RELATIONS_ALL => Yii::t('giiant', 'All relations'),
    Generator::RELATIONS_ALL_INVERSE => Yii::t('giiant', 'All relations with inverse'),
]);
echo $form->field($generator, 'generateJunctionRelationMode')->dropDownList([
    Generator::JUNCTION_RELATION_VIA_TABLE => Yii::t('giiant', 'Via Table'),
    Generator::JUNCTION_RELATION_VIA_MODEL => Yii::t('giiant', 'Via Model'),
]);
//echo $form->field($generator, 'generateRelationsFromCurrentSchema')->checkbox();
echo $form->field($generator, 'generateLabelsFromComments')->checkbox();
echo $form->field($generator, 'generateHintsFromComments')->checkbox();
echo $form->field($generator, 'generateModelClass')->checkbox();
echo $form->field($generator, 'generateQuery')->checkbox();
echo $form->field($generator, 'queryNs');
echo $form->field($generator, 'queryClass');
echo $form->field($generator, 'queryBaseClass');
echo $form->field($generator, 'enableI18N')->checkbox();
echo $form->field($generator, 'singularEntities')->checkbox();
echo $form->field($generator, 'messageCategory');

?>

<div class="panel panel-default">
    <div class="panel-heading">Translatable Behavior</div>
    <div class="panel-body">
        <?php
        echo $form->field($generator, 'useTranslatableBehavior')->checkbox();
        echo $form->field($generator, 'languageTableName');
        echo $form->field($generator, 'languageCodeColumn');
        ?>
        <div class="alert alert-warning" role="alert">
            <h4>Attention!</h4>

            <p>
                You must run <code>php composer.phar require 2amigos/yii2-translateable-behavior "*"</code> to
                install this package.
            </p>
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">Blameable Behavior</div>
    <div class="panel-body">
        <?php
        echo $form->field($generator, 'useBlameableBehavior')->checkbox();
        echo $form->field($generator, 'createdByColumn');
        echo $form->field($generator, 'updatedByColumn');
        ?>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">Timestamp Behavior</div>
    <div class="panel-body">
        <?php
        echo $form->field($generator, 'useTimestampBehavior')->checkbox();
        echo $form->field($generator, 'createdAtColumn');
        echo $form->field($generator, 'updatedAtColumn');
        ?>
    </div>
</div>