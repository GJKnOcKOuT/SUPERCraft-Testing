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
 * @package    arter\amos\sondaggi\views\pubblicazione
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

use arter\amos\core\forms\ContextMenuWidget;
use arter\amos\core\forms\ItemAndCardHeaderWidget;
use arter\amos\core\helpers\Html;
use arter\amos\core\icons\AmosIcons;
use arter\amos\sondaggi\AmosSondaggi;

/**
 * @var \arter\amos\sondaggi\models\Sondaggi $model
 */

?>

<div class="listview-container documents">
    <div class="post-horizonatal">
        <?= ItemAndCardHeaderWidget::widget([
            'model' => $model,
            'publicationDateField' => 'created_at',
        ]); ?>
        <div class="col-sm-7 col-xs-12 nop">
            <div class="post-content col-xs-12 nop">
                <div class="post-title col-xs-10">
                    <a href="<?= $model->getFullViewUrl() ?>">
                        <h2><?= $model->titolo ?></h2>
                    </a>
                </div>
                <?= ContextMenuWidget::widget([
                    'model' => $model,
                    'actionModify' => "/sondaggi/sondaggi/update?id=" . $model->id,
                    'actionDelete' => "/sondaggi/sondaggi/delete?id=" . $model->id,
                    'mainDivClasses' => 'col-xs-1 nop'
                ]) ?>
                <div class="clearfix"></div>
                <div class="row nom post-wrap">
                    <?php
                    $url = '/img/img_default.jpg';
                    if (!is_null($model->filemanager_mediafile_id)) :
                        $url = $model->getAvatarUrl('medium');
                        ?>
                        <div class="post-image-left nop col-sm-3 col-xs-12">
                            <?= Html::img($url, [
                                'alt' => AmosSondaggi::t('amossondaggi', 'Immagine del sondaggio')
                            ]); ?>
                        </div>
                    <?php
                    endif;
                    ?>
                    <div class="post-text m-b-15">
                        <p>
                            <?php
                            if (strlen($model->descrizione) > 300) {
                                $stringCut = substr($model->descrizione, 0, 300);
                                echo substr($stringCut, 0, strrpos($stringCut, ' ')) . '... ';
                            } else {
                                echo $model->descrizione;
                            }
                            ?>

                            <a class="underline" href="<?= $model->getFullViewUrl() ?>"><?= AmosSondaggi::tHtml('amossondaggi', 'Leggi tutto') ?></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="sidebar col-sm-5 col-xs-12">
            <div class="container-sidebar">
                <div class="box">
                    <h4 class="title-sidebar-list"><?= AmosSondaggi::t('amossondaggi', 'Dettagli') ?></h4>
                    <p><strong><?= AmosSondaggi::t('amossondaggi', 'Partecipanti') . ':' ?></strong> <?= $model->getNumeroPartecipazioni() ?></p>
                    <p>
                        <strong><?= \Yii::t('amossondaggi', 'Stato') ?>:</strong> <?= $model->hasWorkflowStatus() ? $model->getWorkflowStatus()->getLabel() : '--'; ?>
                    </p>
                </div>

                <div class="box">
                    <h4 class="title-sidebar-list"><?= AmosSondaggi::t('amossondaggi', 'Azioni') ?></h4>
                    <div class="clearfix"></div>
                    <div class="sidebar-actions">
                        <ul>
                            <li>
                                <?php
                                /** @var \arter\amos\sondaggi\models\search\SondaggiSearch $model */
                                $url = \yii\helpers\Url::current();
                                if (\Yii::$app->getUser()->can('AMMINISTRAZIONE_SONDAGGI') || \Yii::$app->getUser()->can('SONDAGGI_READ', ['model' => $model])) {
                                    echo Html::a(AmosIcons::show('eye', ['class' => 'btn btn-tool-secondary']), Yii::$app->urlManager->createUrl([
                                        '/' . $this->context->module->id . '/sondaggi/view',
                                        'id' => $model->id,
                                        'url' => $url,
                                    ]), [
                                        'title' => AmosSondaggi::t('amossondaggi', 'Visualizza anteprima'),
                                    ]);
                                }
                                ?>
                            </li>
                            <li>
                                <?php
                                /** @var \arter\amos\sondaggi\models\search\SondaggiSearch $model */
                                $url = \yii\helpers\Url::current();
                                //if (\Yii::$app->getUser()->can('PARTECIPANTE') || TRUE) {

                                if (!$model->hasCompilazioniSuperate()) {
                                    echo Html::a(AmosIcons::show('spellcheck', ['class' => 'btn btn-tool-secondary']), Yii::$app->urlManager->createUrl([
                                        '/' . $this->context->module->id . '/pubblicazione/compila',
                                        'id' => $model->id,
                                        'url' => $url,
                                    ]), [
                                        'title' => AmosSondaggi::t('amossondaggi', 'Compila sondaggio'),
                                    ]);
                                }
                                ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="col-xs-12 list-primary-btn">
            < ?= Html::a(AmosSondaggi::t('amossondaggi', 'Nuovo sondaggio'), ['create', 'url' => yii\helpers\Url::current()], ['class' => 'btn btn-success']); ?>
            < ?= Html::a(AmosSondaggi::t('amossondaggi', 'Nuovo sondaggio (Wizard)'), ['create'], ['class' => 'btn btn-success']); ?>
        </div> -->

    </div>
</div>
