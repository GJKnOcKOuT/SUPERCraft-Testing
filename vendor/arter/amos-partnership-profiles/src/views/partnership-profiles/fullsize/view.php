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
 * @package    arter\amos\partnershipprofiles\views\partnership-profiles
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

use arter\amos\attachments\components\AttachmentsTableWithPreview;
use arter\amos\core\forms\ActiveForm;
use arter\amos\core\forms\ContextMenuWidget;
use arter\amos\core\forms\ItemAndCardHeaderWidget;
use arter\amos\core\forms\PublishedByWidget;
use arter\amos\core\forms\ShowUserTagsWidget;
use arter\amos\core\forms\Tabs;
use arter\amos\core\forms\WorkflowTransitionWidget;
use arter\amos\core\helpers\Html;
use arter\amos\core\icons\AmosIcons;
use arter\amos\core\views\toolbars\StatsToolbar;
use arter\amos\partnershipprofiles\controllers\PartnershipProfilesController;
use arter\amos\partnershipprofiles\models\PartnershipProfiles;
use arter\amos\partnershipprofiles\Module;
use arter\amos\partnershipprofiles\utility\PartnershipProfilesUtility;
use yii\web\View;
use yii\widgets\DetailView;

/**
 * @var yii\web\View $this
 * @var arter\amos\partnershipprofiles\models\PartnershipProfiles $model
 */

$this->title = strip_tags($model);
$this->params['breadcrumbs'][] = ['label' => Module::t('amospartnershipprofiles', 'Partnership Profiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$statesCounter = $model->getExpressionsOfInterestStatesCounter();

/** @var PartnershipProfilesController $appController */
$appController = Yii::$app->controller;

$ownInterestPartnershipProfileIds = $appController->getOwnInterestPartnershipProfiles(true);

// Tab ids
$idTabCard = 'tab-card';
$idClassifications = 'tab-classifications';
$idTabMoreInformation = 'tab-more-information';
$idTabAttachments = 'tab-attachments';

$moreInformationLinkId = "more-information-link-id";
$moreInformationBlockId = "more-information-block-id";
$lessInformationLinkId = "less-information-block-id";

$js = "
$('#" . $moreInformationLinkId . "').on('click', function (event) {
    event.preventDefault();
    $(this).addClass('hidden');
    $('#" . $moreInformationBlockId . "').removeClass('hidden');
    $('#" . $lessInformationLinkId . "').removeClass('hidden');
    return false;
});
$('#" . $lessInformationLinkId . "').on('click', function (event) {
    event.preventDefault();
    $(this).addClass('hidden');
    $('#" . $moreInformationBlockId . "').addClass('hidden');
    $('#" . $moreInformationLinkId . "').removeClass('hidden');
    return false;
});
";
$this->registerJs($js, View::POS_READY);

$module = \Yii::$app->getModule('partnershipprofiles');
$moduleCwh = \Yii::$app->getModule('cwh');
$communityConfigurationsId = null;

if (isset($moduleCwh) && !empty($moduleCwh->getCwhScope())) {
    $scope = $moduleCwh->getCwhScope();
    if (isset($scope['community'])) {
        $communityConfigurationsId = 'communityId-' . $scope['community'];
    }
}

$enabledFields = !empty($module->fieldsCommunityConfigurations[$communityConfigurationsId]['fields']) ? $module->fieldsCommunityConfigurations[$communityConfigurationsId]['fields'] : (!empty($module->fieldsConfigurations['fields']) ? $module->fieldsConfigurations['fields'] : []);
$enabledTabs = !empty($module->fieldsCommunityConfigurations[$communityConfigurationsId]['tabs']) ? $module->fieldsCommunityConfigurations[$communityConfigurationsId]['tabs'] : (!empty($module->fieldsConfigurations['tabs']) ? $module->fieldsConfigurations['tabs'] : []);

if ($model->status != PartnershipProfiles::PARTNERSHIP_PROFILES_WORKFLOW_STATUS_VALIDATED) {
    echo \arter\amos\workflow\widgets\WorkflowTransitionStateDescriptorWidget::widget([
        'model' => $model,
        'workflowId' => PartnershipProfiles::PARTNERSHIP_PROFILES_WORKFLOW,
        'classDivMessage' => 'message'
    ]);
}

?>
<div class="<?= Yii::$app->controller->id ?>-view">

    <div class="post-details">

        <?php $this->beginBlock($idTabCard); ?>

        <div class="post-header col-xs-12 col-sm-7 nop media">
            <?= ItemAndCardHeaderWidget::widget([
                'model' => $model,
                'publicationDateField' => 'created_at'
            ]); ?>
        </div>

        <div class="col-sm-7 col-xs-12 nop">
            <div class="post-content col-xs-12 nop">
                <div class="post-title col-xs-10">
                    <h2><?= $model->title ?></h2>
                </div>
                <?= ContextMenuWidget::widget([
                    'model' => $model,
                    'actionModify' => "/partnershipprofiles/partnership-profiles/update?id=" . $model->id,
                    'actionDelete' => "/partnershipprofiles/partnership-profiles/delete?id=" . $model->id
                ]) ?>

                <div class="clearfix"></div>

                <div class="col-xs-12 nop post-wrap">
                    <div class="post-text col-xs-12">
                        <?= $model->short_description ?>
                        <!--<p><?= $model->expected_contribution ?></p>-->
                        <!--<p><?= $model->extended_description ?></p>-->
                    </div>
                </div>
            </div>
            <div class="post-footer col-xs-12 nop">
                <div class="post-info col-xs-12">
                    <?php if (!empty($enabledFields['expiration_in_months']) && $enabledFields['expiration_in_months'] == true) {
                        $pubblicationDate = '{pubblicationdates}';
                    } else {
                        $pubblicationDate = '{pubblishedfrom}';
                    }
                    ?>
                    <?= PublishedByWidget::widget([
                        'model' => $model,
                        'layout' => '{publisherAdv}{targetAdv}{statusTranslated}' . $pubblicationDate,
                        'renderSections' => [
                            '{statusTranslated}' => function ($model) {
                                return Html::tag('label', \arter\amos\core\module\BaseAmosModule::t('amoscore', 'Status')) . ': ' .
                                    Module::t('amospartnershipprofiles', $model->getWorkflowStatus()->label);
                            }
                        ]
                    ]) ?>
                </div>
                <?php if (isset($statsToolbar) && $statsToolbar): ?>
                    <?= StatsToolbar::widget(['model' => $model]); ?>
                <?php endif; ?>
            </div>
        </div>

        <?php
        $sidebarParams = [
            'model' => $model,
            'ownInterestPartnershipProfileIds' => $ownInterestPartnershipProfileIds,
        ];
        ?>
        <?= $this->render('boxes/sidebar', $sidebarParams) ?>

        <div class="container-general-info col-xs-12 nop">
            <!--<?= Html::a(Module::t('amospartnershipprofiles', 'Show more information'), '', ['class' => 'more-info', 'id' => $moreInformationLinkId]); ?>
        <?= Html::a(Module::t('amospartnershipprofiles', 'Show less information'), '', ['class' => 'more-info hidden', 'id' => $lessInformationLinkId]); ?>-->
            <div id="<?= $moreInformationBlockId ?>"><!--class="hidden"-->
                <h3 class="title"><?= AmosIcons::show('info-outline'); ?> <?= Module::tHtml('amospartnershipprofiles', 'Information') ?></h3>
                <?php
                $attributes = [];
                if (!empty($enabledFields['title']) && $enabledFields['title'] == true) {
                    $attributes[] = 'title';
                }
                $attributes['status'] = [
                    'attribute' => 'status',
                    'label' => $model->getAttributeLabel('status'),
                    'value' => Module::t('amospartnershipprofiles', $model->getWorkflowStatus()->getLabel()),
                ];


                if (!empty($enabledFields['extended_description']) && $enabledFields['extended_description'] == true) {
                    $attributes[] = 'extended_description:html';
                }
                if (!empty($enabledFields['expected_contribution']) && $enabledFields['expected_contribution'] == true) {
                    $attributes[] = 'expected_contribution:html';
                }
                if (!empty($enabledFields['advantages_innovative_aspects']) && $enabledFields['advantages_innovative_aspects'] == true) {
                    $attributes[] = 'advantages_innovative_aspects:html';
                }
                if (!empty($enabledFields['contact_person']) && $enabledFields['contact_person'] == true) {
                    $attributes[] = 'contact_person';
                }
                if (!empty($enabledFields['other_prospect_desired_collab']) && $enabledFields['other_prospect_desired_collab'] == true) {
                    $attributes[] = 'other_prospect_desired_collab';
                }
                if (!empty($enabledFields['partnership_profile_date']) && $enabledFields['partnership_profile_date'] == true) {
                    $attributes[] = 'partnership_profile_date:date';
                }
                if (!empty($enabledFields['expiration_in_months']) && $enabledFields['expiration_in_months'] == true) {
                    $attributes[] = 'expiration_in_months';
                    $attributes[] = [
                        'label' => Module::t('amospartnershipprofiles', 'Calculated Expiry Date'),
                        'value' => function ($model) {
                            /** @var PartnershipProfiles $model */
                            return PartnershipProfilesUtility::calcExpiryDateStr($model, true);
                        }
                    ];
                }


                if (!empty($enabledTabs['tab-more-information']) && $enabledTabs['tab-more-information'] == true) {
                    if (!empty($enabledFields['english_title']) && $enabledFields['english_title'] == true) {
                        $attributes[] = 'english_title';
                    }
                    if (!empty($enabledFields['english_short_description']) && $enabledFields['english_short_description'] == true) {
                        $attributes[] = 'english_short_description:html';
                    }
                    if (!empty($enabledFields['english_extended_description']) && $enabledFields['english_extended_description'] == true) {
                        $attributes[] = 'english_extended_description:html';
                    }
                    if (!empty($enabledFields['willingness_foreign_partners']) && $enabledFields['willingness_foreign_partners'] == true) {
                        $attributes[] = 'willingness_foreign_partners:boolean';
                    }
                    if (!empty($enabledFields['work_language_id']) && $enabledFields['work_language_id'] == true) {
                        $attributes[] = 'workLanguage.work_language';
                    }
                    if (!empty($enabledFields['development_stage_id']) && $enabledFields['development_stage_id'] == true) {
                        $attributes['developmentStage.value'] = [
                            'attribute' => 'developmentStage.value',
                            'label' => Module::t('amospartnershipprofiles', 'Development stage')
                        ];
                    }
                    if (!empty($enabledFields['other_development_stage']) && $enabledFields['other_development_stage'] == true) {
                        $attributes[] = 'other_development_stage.work_language';
                    }
                    if (!empty($enabledFields['intellectual_property_id']) && $enabledFields['intellectual_property_id'] == true) {
                        $attributes['intellectualProperty.value'] = [
                            'attribute' => 'intellectualProperty.value',
                            'label' => Module::t('amospartnershipprofiles', 'Intellectual property')
                        ];
                    }
                    if (!empty($enabledFields['other_intellectual_property']) && $enabledFields['other_intellectual_property'] == true) {
                        $attributes[] = 'other_intellectual_property';
                    }
                }

                if (!empty($enabledFields['attrPartnershipProfilesTypesMm']) && $enabledFields['attrPartnershipProfilesTypesMm'] == true) {
                    [
                        'label' => Module::t('amospartnershipprofiles', 'Partnership Profiles Types'),
                        'value' => function ($model) {
                            /** @var PartnershipProfiles $model */
                            return $model->getPartnershipProfileTypesString();
                        }
                    ];
                }

                ?>
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => $attributes,
                    'options' => ['class' => 'table-info']
                ]) ?>
            </div>
        </div>
        <?php $this->endBlock(); ?>
        <?php
        $itemsTab[] = [
            'label' => Module::tHtml('amospartnershipprofiles', 'Card'),
            'content' => $this->blocks[$idTabCard],
            'options' => ['id' => $idTabCard],
        ];
        ?>

        <?php if (Yii::$app->getModule('tag')): ?>
            <?php $this->beginBlock($idClassifications); ?>
            <div class="body">
                <?= ShowUserTagsWidget::widget([
                    'userProfile' => $model->id,
                    'className' => $model->className()
                ]);
                ?>
            </div>
            <?php $this->endBlock(); ?>
            <?php
            $itemsTab[] = [
                'label' => Module::tHtml('amospartnershipprofiles', 'Tag'),
                'content' => $this->blocks[$idClassifications],
                'options' => ['id' => $idClassifications],
            ];
            ?>
        <?php endif; ?>

        <?php $this->beginBlock($idTabAttachments); ?>
        <!-- TODO sostituire il tag h3 con il tag p e applicare una classe per ridimensionare correttamente il testo per accessibilità -->
        <h3><?= Module::tHtml('amospartnershipprofiles', 'Attachments') ?></h3>
        <?= AttachmentsTableWithPreview::widget([
            'model' => $model,
            'attribute' => 'partnershipProfileAttachments',
            'viewDeleteBtn' => false
        ]) ?>
        <?php $this->endBlock(); ?>

        <?php
        $itemsTab[] = [
            'label' => Module::tHtml('amospartnershipprofiles', 'Attachments'),
            'content' => $this->blocks[$idTabAttachments],
            'options' => ['id' => $idTabAttachments],
        ];
        ?>

        <?= Tabs::widget([
            'encodeLabels' => false,
            'items' => $itemsTab
        ]); ?>
    </div>
</div>