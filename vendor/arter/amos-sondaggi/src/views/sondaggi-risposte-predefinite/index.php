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


use arter\amos\core\icons\AmosIcons;
use arter\amos\core\utilities\ModalUtility;
use arter\amos\core\views\DataProviderView;
use arter\amos\sondaggi\AmosSondaggi;
use arter\amos\sondaggi\models\SondaggiDomande;
use yii\helpers\Html;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var \arter\amos\sondaggi\models\search\SondaggiRispostePredefiniteSearch $searchModel
 */

$this->title = AmosSondaggi::t('amossondaggi', 'Risposte predefinite');
$sondaggio = null;
$domanda = null;
if (isset($parametro)) {
    $domanda = SondaggiDomande::findOne(['id' => $parametro]);
    $sondaggio = $domanda->sondaggi;
    $this->title = AmosSondaggi::t('amossondaggi', 'Risposte predefinite alla domanda: ' . SondaggiDomande::findOne(['id' => $parametro])->domanda);
}
$this->params['breadcrumbs'][] = ['label' => AmosSondaggi::t('amossondaggi', 'Sondaggi'), 'url' => ['/' . $this->context->module->id . '/sondaggi/index']];
if ($url) {
    $this->params['breadcrumbs'][] = ['label' => AmosSondaggi::t('amossondaggi', 'Domande del sondaggio'), 'url' => $url];
}


?>
<div class="sondaggi-risposte-predefinite-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <?php
    if (isset($parametro)) :
        echo DataProviderView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $model,
            'currentView' => $currentView,
            'gridView' => [
                'columns' => [
                    'risposta:ntext',
                    /* 'sondaggi_domande_id' => [
                      'attribute' => 'sondaggi_domande_id',
                      'value' => function ($model){
                      return $model->getSondaggiDomande()->one()['domanda'];
                      }
                      ], */
                    [
                        'class' => 'arter\amos\core\views\grid\ActionColumn',
                        'template' => '{update} {delete}',
                        'buttons' => [
                            'update' => function ($url, $model) {
                                $url = \yii\helpers\Url::current();
                                if (\Yii::$app->getUser()->can('AMMINISTRAZIONE_SONDAGGI') || \Yii::$app->getUser()->can('SONDAGGIRISPOSTEPREDEFINITE_UPDATE', ['model' => $model])) {
                                    return Html::a(AmosIcons::show('edit'), Yii::$app->urlManager->createUrl([
                                        '/' . $this->context->module->id . '/sondaggi-risposte-predefinite/update',
                                        'id' => $model->id,
                                        'url' => $url,
                                    ]), [
                                        'title' => AmosSondaggi::t('amossondaggi', 'Modifica'),
                                        'class' => 'btn btn-tool-secondary'
                                    ]);
                                } else {
                                    return '';
                                }
                            },
                        ]
                    ],
                ],
            ],
            /* 'listView' => [
              'itemView' => '_item'
              ],
              'iconView' => [
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
    else :
        echo DataProviderView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $model,
            'currentView' => $currentView,
            'gridView' => [
                'columns' => [
                    'risposta:ntext',
                    'sondaggi_domande_id' => [
                        'attribute' => 'sondaggi_domande_id',
                        'value' => function ($model) {
                            /** @var \arter\amos\sondaggi\models\search\SondaggiRispostePredefiniteSearch $model */
                            return $model->getSondaggiDomande()->one()['domanda'];
                        }
                    ],
                    [
                        'class' => 'arter\amos\core\views\grid\ActionColumn',
                        'template' => '{update} {delete}',
                        'buttons' => [
                            'update' => function ($url, $model) {
                                $url = \yii\helpers\Url::current();
                                if (\Yii::$app->getUser()->can('AMMINISTRAZIONE_SONDAGGI') || \Yii::$app->getUser()->can('SONDAGGIRISPOSTEPREDEFINITE_UPDATE', ['model' => $model])) {
                                    return Html::a(AmosIcons::show('edit'), Yii::$app->urlManager->createUrl([
                                        '/sondaggi/sondaggi-risposte-predefinite/update',
                                        'id' => $model->id,
                                        'url' => $url,
                                    ]), [
                                        'title' => AmosSondaggi::t('amossondaggi', 'Modifica'),
                                        'class' => 'btn btn-tool-secondary'
                                    ]);
                                } else {
                                    return '';
                                }
                            },
                        ]
                    ],
                ],
            ],
        ]);
    endif;
    ?>

</div>

<p>
    <!--    --><?php
    //    if (isset($parametro)) :
    //        echo Html::a(AmosSondaggi::t('amossondaggi', 'Aggiungi risposta predefinita'), ['create', 'idDomanda' => $parametro, 'url' => yii\helpers\Url::current()], ['class' => 'btn btn-success']);
    //    endif;
    //    ?>
</p>
<?php
$model = new \arter\amos\sondaggi\models\SondaggiRispostePredefinite();
$model->sondaggi_domande_id = $parametro;
echo $this->render('_modal_import_risposte', ['model' => $model, 'sondaggi_domande_id' => $parametro]);
ModalUtility::createConfirmModal([
    'id' => 'modalDeleteAll',
    'modalDescriptionText' => AmosSondaggi::t('amossondaggi', '#delete-all-risposte-predefinite-modal-message'),
    'confirmBtnLink' => '/sondaggi/sondaggi-risposte-predefinite/delete-all?idDomanda=' . $model->sondaggi_domande_id,
    'cancelBtnLabel' => AmosSondaggi::t('amoscore', 'No'),
    'confirmBtnLabel' => AmosSondaggi::t('amoscore', 'Yes'),
    'confirmBtnOptions' => [
        'class' => 'btn btn-navigation-primary confirm-exit-modal-btn',
    ],
]);

?>
