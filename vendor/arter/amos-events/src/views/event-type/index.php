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
 * @package    arter\amos\events\views\event-type
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

use arter\amos\core\views\DataProviderView;
use arter\amos\events\AmosEvents;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var arter\amos\events\models\search\EventTypeSearch $model
 * @var string $currentView
 */

$this->title = AmosEvents::t('amosevents', 'Event Types');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-type-index">
    <?php echo $this->render('_search', ['model' => $model]); ?>

    <p>
        <?php /* echo         Html::a('New Event Type'        , ['create'], ['class' => 'btn btn-amministration-primary'])*/ ?>
    </p>

    <?php echo DataProviderView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $model,
        'currentView' => $currentView,
        'gridView' => [
            'columns' => [
                'title',
                'description:html',
                'color' => [
                    'format' => 'raw',
                    'attribute' => 'color',
                    'value' => function ($model) {
                        return \yii\helpers\Html::tag('div', '&nbsp;', ['style' => "background-color:{$model->color}"]);
                    }
                ],
                // [
                //     'label' => AmosEvents::t('amosevents', 'Event context'),
                //     'value' => function ($model) {
                //         /** @var \arter\amos\events\models\EventType $model */
                //         return $model->eventTypeContext->title;
                //     }
                // ],
                [
                    'class' => 'arter\amos\core\views\grid\ActionColumn',
                ]
            ]
        ],
        /*'listView' => [
        'itemView' => '_item'
        'masonry' => FALSE,

        // Se masonry settato a TRUE decommentare e settare i parametri seguenti 
        // nel CSS settare i seguenti parametri necessari al funzionamento tipo
        // .grid-sizer, .grid-item {width: 50&;}
        // Per i dettagli recarsi sul sito http://masonry.desandro.com                                     

        //'masonrySelector' => '.grid',
        //'masonryOptions' => [
        //    'itemSelector' => '.grid-item',
        //    'columnWidth' => '.grid-sizer',
        //    'percentPosition' => 'true',
        //    'gutter' => '20'
        //]
        ],
        'iconView' => [
        'itemView' => '_icon'
        ],
        'mapView' => [
        'itemView' => '_map',          
        'markerConfig' => [
        'lat' => 'domicilio_lat',
        'lng' => 'domicilio_lon',
        'icon' => 'iconaMarker',
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
        'array' => false,//se ci sono pi?? eventi legati al singolo record
        //'getEventi' => 'getEvents'//funzione da abilitare e implementare nel model per creare un array di eventi legati al record
        ]*/
    ]); ?>
</div>
