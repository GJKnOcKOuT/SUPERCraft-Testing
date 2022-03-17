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
 * @package    arter\amos\sondaggi\views\sondaggi
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

use arter\amos\core\icons\AmosIcons;
use arter\amos\core\views\DataProviderView;
use arter\amos\sondaggi\AmosSondaggi;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var arter\amos\sondaggi\models\search\SondaggiSearch $searchModel
 */



$js2 = <<<JS


    $('.btn-sondaggi-download').click(function(e) {
        e.preventDefault();
        var element =  $(this);
        if($(this).data('dont')!=1){
            id = $(this).data('id');
            $.ajax({
                url:"/sondaggi/v1/extract/extract-sondaggio?sondaggio_id="+id,
                type: "GET",
                data: {},
                success:function(result){
                    console.log(result);
                    dati = JSON.parse(result);
                    $(this).data('task_id',dati['task_id'] );
                    element.data('dont',1 );
                    element.removeClass("am-download");
                    element.addClass("am-block");
                    $(this).data('element',element );
                    setTimeout(check, 2000, this);
                },
                error: function(richiesta,stato,errori){

                }
              });
        }
       return false;
   });

   function check(that)
   {
        id = $(that).data('task_id');
        $.ajax({
            url:"/sondaggi/v1/extract/extract-sondaggio-status?task_id="+id,
            type: "GET",
            data: {},
            success:function(result){
                console.log(result);
                dati = JSON.parse(result);
                if(dati['status'] == 3){
                    $(that).data('element').data('dont',0 );
                    $(that).data('element').addClass("am-download");
                    $(that).data('element').removeClass("am-block");
                    window.location = "/sondaggi/v1/extract/extract-sondaggio-result?task_id="+id;
                }else{
                    setTimeout(check, 2000, that);
                }
            },
            error: function(richiesta,stato,errori){

            }
          });
   }

JS;

$this->registerJs($js2, View::POS_READY);

?>
<div class="sondaggi-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?php /* echo         Html::a(AmosSondaggi::t('amossondaggi', 'Nuovo {modelClass}', [
          'modelClass' => 'Sondaggi',
          ])        , ['create'], ['class' => 'btn btn-success']) */ ?>
    </p>

    <?php
    echo DataProviderView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $model,
        'currentView' => $currentView,
        'gridView' => [
            'columns' => [
                //['class' => 'yii\grid\SerialColumn'],
                //'id',
                'filemanager_mediafile_id' => [
                    'label' => AmosSondaggi::t('amossondaggi', 'Immagine'),
                    'format' => 'html',
                    'value' => function ($model) {
                        $url = '/img/img_default.jpg';

                        if ($model->file) {
                            $url = $model->file->getUrl('square_small');
                        }

                        return Html::img($url, [
                            'class' => 'gridview-image'
                        ]);
                    }
                ],
                'titolo:ntext',
                'descrizione:ntext',
                'partecipazioni' => [
                    'label' => AmosSondaggi::t('amossondaggi', 'Partecipanti'),
                    'value' => function ($model) {
                        /** @var \arter\amos\sondaggi\models\search\SondaggiSearch $model */
                        return ($model->getNumeroPartecipazioni()) ? $model->getNumeroPartecipazioni() : 'Nessuno';
                    }
                ],
                'status' => [
                    'attribute' => 'status',
                    'value' => function ($model) {
                        /** @var \arter\amos\sondaggi\models\search\SondaggiSearch $model */
                        return $model->hasWorkflowStatus() ? $model->getWorkflowStatus()->getLabel() : '--';
                    }
                ],
                'pubblico' => [
                    'label' => AmosSondaggi::t('amossondaggi', 'Tipologia'),
                    'value' => function ($model) {
                        /** @var \arter\amos\sondaggi\models\search\SondaggiSearch $model */
                        if (!is_array($model->getSondaggiPubblicaziones()->one()['ruolo'])) {
                            if ($model->getSondaggiPubblicaziones()->one()['ruolo'] == 'PUBBLICO') {
                                if ($model->getSondaggiPubblicaziones()->one()['tipologie_entita'] > 0) {
                                    return AmosSondaggi::t('amossondaggi', 'Pubblico per attività');
                                } else {
                                    return AmosSondaggi::t('amossondaggi', 'PUBBLICO');
                                }
                            }
                        }
                        return AmosSondaggi::t('amossondaggi', 'Riservato');
                    }
                ],
                //['attribute'=>'created_at','format'=>['datetime',(isset(Yii::$app->modules['datecontrol']['displaySettings']['datetime'])) ? Yii::$app->modules['datecontrol']['displaySettings']['datetime'] : 'd-m-Y H:i:s A']],
//            ['attribute'=>'updated_at','format'=>['datetime',(isset(Yii::$app->modules['datecontrol']['displaySettings']['datetime'])) ? Yii::$app->modules['datecontrol']['displaySettings']['datetime'] : 'd-m-Y H:i:s A']], 
//            ['attribute'=>'deleted_at','format'=>['datetime',(isset(Yii::$app->modules['datecontrol']['displaySettings']['datetime'])) ? Yii::$app->modules['datecontrol']['displaySettings']['datetime'] : 'd-m-Y H:i:s A']], 
//            'created_by', 
//            'updated_by', 
//            'deleted_by', 
//            'version', 
                [
                    'class' => 'arter\amos\core\views\grid\ActionColumn',
                    'template' => '{update} {clone} {pagine} {domande} {delete} {risultati}',
                    'buttons' => [
                        'anteprima' => function ($url, $model) {
                            /** @var \arter\amos\sondaggi\models\search\SondaggiSearch $model */
                            $url = \yii\helpers\Url::current();
                            if (\Yii::$app->getUser()->can('AMMINISTRAZIONE_SONDAGGI') || \Yii::$app->getUser()->can('SONDAGGI_READ', ['model' => $model])) {
                                return Html::a(AmosIcons::show('eye'), Yii::$app->urlManager->createUrl([
                                    '/' . $this->context->module->id . '/sondaggi/view',
                                    'id' => $model->id,
                                    'url' => $url,
                                ]), [
                                    'title' => AmosSondaggi::t('amossondaggi', 'Visualizza anteprima'),
                                    'class' => 'btn btn-tool-secondary'
                                ]);
                            } else {
                                return '';
                            }
                        },
                        'risultati' => function ($url, $model) {
                            /** @var \arter\amos\sondaggi\models\search\SondaggiSearch $model */
                            $url = \yii\helpers\Url::current();
                            $partecipazioni = $model->getNumeroPartecipazioni();
                            if (\Yii::$app->getUser()->can('SONDAGGI_READ', ['model' => $model]) && $partecipazioni) {
                                return Html::a(AmosIcons::show('bar-chart', 'dash'), Yii::$app->urlManager->createUrl([
                                    '/' . $this->context->module->id . '/sondaggi/risultati',
                                    'id' => $model->id,
                                ]), [
                                    'title' => AmosSondaggi::t('amossondaggi', 'Risultati del sondaggio'),
                                    'class' => 'btn btn-tool-secondary'
                                ]);
                            } else {
                                return '';
                            }
                        },
                        'update' => function ($url, $model) {
                            /** @var \arter\amos\sondaggi\models\search\SondaggiSearch $model */
                            $url = \yii\helpers\Url::current();
                            if (\Yii::$app->getUser()->can('AMMINISTRAZIONE_SONDAGGI') || \Yii::$app->getUser()->can('SONDAGGI_UPDATE', ['model' => $model])) {
                                return Html::a(AmosIcons::show('edit'), Yii::$app->urlManager->createUrl([
                                    '/' . $this->context->module->id . '/sondaggi/update',
                                    'id' => $model->id,
                                    'url' => $url,
                                ]), [
                                    'title' => AmosSondaggi::t('amossondaggi', 'Modifica intestazione'),
                                    'class' => 'btn btn-tool-secondary'
                                ]);
                            } else {
                                return '';
                            }
                        },
                        'clone' => function ($url, $model) {
                            /** @var \arter\amos\sondaggi\models\search\SondaggiSearch $model */
                            $url = \yii\helpers\Url::current();
                            if (\Yii::$app->getUser()->can('AMMINISTRAZIONE_SONDAGGI') || \Yii::$app->getUser()->can('SONDAGGI_UPDATE', ['model' => $model])) {
                                return Html::a(AmosIcons::show('collection-item'), Yii::$app->urlManager->createUrl([
                                    '/' . $this->context->module->id . '/sondaggi/clone',
                                    'id' => $model->id,
                                    'url' => $url,
                                ]), [
                                    'title' => AmosSondaggi::t('amossondaggi', 'Clona sondaggi'),
                                    'data-confirm' => AmosSondaggi::t('amossondaggi','Sei sicuro di voler duplicare  il sondaggio?'),
                                    'class' => 'btn btn-tool-secondary'
                                ]);
                            } else {
                                return '';
                            }
                        },
                        'pagine' => function ($url, $model) {
                            /** @var \arter\amos\sondaggi\models\search\SondaggiSearch $model */
                            $url = \yii\helpers\Url::current();
                            if (\Yii::$app->getUser()->can('AMMINISTRAZIONE_SONDAGGI') || \Yii::$app->getUser()->can('SONDAGGIDOMANDEPAGINE_READ', ['model' => $model])) {
                                return Html::a(AmosIcons::show('book'), Yii::$app->urlManager->createUrl([
                                    '/' . $this->context->module->id . '/sondaggi-domande-pagine/index',
                                    'idSondaggio' => $model->id,
                                    'url' => $url,
                                ]), [
                                    'title' => AmosSondaggi::t('amossondaggi', 'Gestisci pagine'),
                                    'class' => 'btn btn-tool-secondary'
                                ]);
                            } else {
                                return '';
                            }
                        },
                        'domande' => function ($url, $model) {
                            /** @var \arter\amos\sondaggi\models\search\SondaggiSearch $model */
                            if ($model->getSondaggiDomandePagines()->count() == 0) {
                                $url = Yii::$app->urlManager->createUrl(['/' . $this->context->module->id . '/sondaggi-domande-pagine/index', 'idSondaggio' => $model->id, 'url' => yii\helpers\Url::current()]);

                                if (\Yii::$app->getUser()->can('AMMINISTRAZIONE_SONDAGGI') || \Yii::$app->getUser()->can('SONDAGGIDOMANDEPAGINE_CREATE', ['model' => $model])) {
                                    return Html::a(AmosIcons::show('plus'), Yii::$app->urlManager->createUrl([
                                        '/' . $this->context->module->id . '/sondaggi-domande-pagine/create',
                                        'idSondaggio' => $model->id,
                                        'url' => $url,
                                    ]), [
                                        'title' => AmosSondaggi::t('amossondaggi', 'Aggiungi pagina - Nessuna pagina ancora presente'),
                                        'class' => 'btn btn-tool-secondary btn-danger'
                                    ]);
                                } else {
                                    return '';
                                }
                            } else {
                                $url = \yii\helpers\Url::current();
                                if (\Yii::$app->getUser()->can('AMMINISTRAZIONE_SONDAGGI') || \Yii::$app->getUser()->can('SONDAGGIDOMANDE_READ', ['model' => $model])) {
                                    if ($model->getSondaggiDomandes()->count() == 0) {
                                        $url = Yii::$app->urlManager->createUrl(['/' . $this->context->module->id . '/sondaggi-domande-pagine/index', 'idSondaggio' => $model->id, 'url' => yii\helpers\Url::current()]);
                                        return Html::a(AmosIcons::show('playlist-plus'), Yii::$app->urlManager->createUrl([
                                            '/' . $this->context->module->id . '/sondaggi-domande/index',
                                            'idSondaggio' => $model->id,
                                            'url' => $url,
                                        ]), [
                                            'title' => AmosSondaggi::t('amossondaggi', 'Gestisci domande - E\' necessario aggiungere delle domande al sondaggio.'),
                                            'class' => 'btn btn-tool-secondary btn-danger'
                                        ]);
                                    } else {
                                        $url = Yii::$app->urlManager->createUrl(['/' . $this->context->module->id . '/sondaggi-domande-pagine/index', 'idSondaggio' => $model->id, 'url' => yii\helpers\Url::current()]);
                                        return Html::a(AmosIcons::show('playlist-plus'), Yii::$app->urlManager->createUrl([
                                            '/' . $this->context->module->id . '/sondaggi-domande/index',
                                            'idSondaggio' => $model->id,
                                            'url' => $url,
                                        ]), [
                                            'title' => AmosSondaggi::t('amossondaggi', 'Gestisci domande'),
                                            'class' => 'btn btn-tool-secondary'
                                        ]);
                                    }
                                } else {
                                    return '';
                                }
                            }
                        },
                    ]
                ],
            ],
        ],
        'listView' => [
            'itemView' => '_item'
        ],
        /*  'iconView' => [
          'itemView' => '_icon'
          ],
          'mapView' => [
          'itemView' => '_map',
          'markerConfig' => [
          'lat' => 'domicilio_lat',
          'lng' => 'domicilio_lon',
          ]
          ],
          'calendarView' => [
          'itemView' => '_calendar',
          'clientOptions' => [
          //'lang'=> 'de'
          ],
          'eventConfig' => [
          //'title' => 'titoloEvento',
          //'start' => 'data_inizio',
          //'end' => 'data_fine',
          //'color' => 'coloreEvento',
          //'url' => 'urlEvento'
          ],
          ] */
    ]);
    ?>
</div>
