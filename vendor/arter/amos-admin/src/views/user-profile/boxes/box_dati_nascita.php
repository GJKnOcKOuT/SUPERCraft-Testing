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
 * @package    arter\amos\admin\views\user-profile\boxes
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

use arter\amos\admin\AmosAdmin;
use arter\amos\admin\base\ConfigurationManager;
use kartik\datecontrol\DateControl;
use kartik\depdrop\DepDrop;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/**
 * @var yii\web\View $this
 * @var arter\amos\core\forms\ActiveForm $form
 * @var arter\amos\admin\models\UserProfile $model
 * @var arter\amos\core\user\User $user
 */

/** @var AmosAdmin $adminModule */
$adminModule = Yii::$app->controller->module;

?>
<section>
    <!--    <h2>-->
    <!--        < ?= AmosIcons::show('cake'); ?>-->
    <!--        < ?= AmosAdmin::tHtml('amosadmin', 'Dati di Nascita') ?>-->
    <!--    </h2>-->
    <div class="row">
        <?php if ($adminModule->confManager->isVisibleField('nascita_nazioni_id', ConfigurationManager::VIEW_TYPE_FORM)): ?>
            <div class="col-lg-6 col-sm-6">
                <div class="select">
                    <?= $form->field($model, 'nascita_nazioni_id')->widget(Select2::classname(), [
                        'options' => [
                            'placeholder' => AmosAdmin::t('amosadmin', 'Digita il nome della nazione'),
                            'disabled' => false,
                            'id' => 'nascita_nazioni_id'],
                        'data' => ArrayHelper::map(AmosAdmin::instance()->createModel('IstatNazioni')->find()->orderBy('nome')->asArray()->all(), 'id', 'nome')
                    ]); ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($adminModule->confManager->isVisibleField('nascita_province_id', ConfigurationManager::VIEW_TYPE_FORM)): ?>
            <div class="col-lg-6 col-sm-6">
                <div class="select">
                    <?= $form->field($model, 'nascita_province_id')->widget(Select2::classname(), [
                        'options' => [
                            'placeholder' => AmosAdmin::t('amosadmin', 'Digita il nome della provincia'),
                            'id' => 'nascita_province_id-id',
                            'disabled' => false
                        ],
                        'data' => ArrayHelper::map(AmosAdmin::instance()->createModel('IstatProvince')->find()->orderBy('nome')->asArray()->all(), 'id', 'nome')
                    ]); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="row">
        <?php if (
            ($adminModule->confManager->isVisibleField('nascita_province_id', ConfigurationManager::VIEW_TYPE_FORM)) &&
            ($adminModule->confManager->isVisibleField('nascita_comuni_id', ConfigurationManager::VIEW_TYPE_FORM))
        ): ?>
            <div class="col-lg-6 col-sm-6">
                <div class="select">
                    <?php $comuni = \arter\amos\comuni\models\IstatComuni::find()->andWhere(['istat_province_id' => $model->nascita_province_id])->all()?>
                    <?= $form->field($model, 'nascita_comuni_id')->widget(DepDrop::classname(), [
                        'type' => DepDrop::TYPE_SELECT2,
                        'data' => $model->nascita_province_id ? ArrayHelper::map($comuni, 'id', 'nome') : [],
                        'options' => ['id' => 'nascita_comuni_id-id', 'disabled' => false],
                        'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                        'pluginOptions' => [
                            'depends' => [(false) ?: 'nascita_province_id-id'],
                            'placeholder' => ['Seleziona ...'],
                            'url' => Url::to(['/comuni/default/comuni-by-provincia']),
                            'params' => ['nascita_comuni_id-id'],
                        ],
                    ]); ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($adminModule->confManager->isVisibleField('nascita_data', ConfigurationManager::VIEW_TYPE_FORM)): ?>
            <div class="col-lg-6 col-sm-6">
                <?= $form->field($model, 'nascita_data')->widget(DateControl::classname(), [
                    'type' => DateControl::FORMAT_DATE,
                    'options' => [
                        'disabled' => false,
                    ],
                    'autoWidget' => false,
                    'saveOptions' => [
                        'type' => 'text',
                        'class' => 'sr-only',
                        'label' => '<label for="nascita_data-disp" class="sr-only">' . AmosAdmin::t('amosadmin', 'Born Date') . '</label>'
                    ],
                    'widgetOptions' => [
                        'mask' => '99-99-9999',
                    ]
                ]) ?>
            </div>
        <?php endif; ?>
    </div>
</section>
