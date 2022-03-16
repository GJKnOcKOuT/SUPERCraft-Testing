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
 * @package    arter\amos\faq
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

use arter\amos\core\views\DataProviderView;
use yii\widgets\Pjax;
use arter\amos\faq\AmosFaq;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var arter\amos\faq\models\FaqSearch $searchModel
 */
$this->title = AmosFaq::t('amosfaq', 'Faq');
$this->params['breadcrumbs'][] = ['label' => AmosFaq::t('amosfaq', 'Faq'), 'url' => ['/faq']];
$this->params['breadcrumbs'][] = AmosFaq::t('amosfaq', 'Gestione Faq'); //$this->title;
?>
<div class="faq-index">
    <?php //echo $this->render('_search', ['model' => $model]); ?>

    <?php
    Pjax::begin();
    echo DataProviderView::widget(
            [
                'dataProvider' => $dataProvider,
                'currentView' => $currentView,
//                'gridView' => [
//                    'columns' => [
//                        //       ['class' => 'yii\grid\SerialColumn'],
////                    'id',
//                        'domanda:ntext',
//                        'risposta:ntext',
//            'order',
//            ['attribute'=>'created_at','format'=>['datetime',(isset(Yii::$app->modules['datecontrol']['displaySettings']['datetime'])) ? Yii::$app->modules['datecontrol']['displaySettings']['datetime'] : 'd-m-Y H:i:s A']],
//            ['attribute'=>'updated_at','format'=>['datetime',(isset(Yii::$app->modules['datecontrol']['displaySettings']['datetime'])) ? Yii::$app->modules['datecontrol']['displaySettings']['datetime'] : 'd-m-Y H:i:s A']], 
//            ['attribute'=>'deleted_at','format'=>['datetime',(isset(Yii::$app->modules['datecontrol']['displaySettings']['datetime'])) ? Yii::$app->modules['datecontrol']['displaySettings']['datetime'] : 'd-m-Y H:i:s A']], 
//            'created_by', 
//            'updated_by', 
//            'deleted_by', 
//            'version', 
                        /*            [
                          'attribute' => 'faqCategoria.titolo',
                          'label' => 'Categoria',
                          ],
                          [
                          'attribute' => 'faq_widgets_id',
                          'value' => 'faqWidgets.widget_label',
                          ],
                          [
                          'attribute' => 'faqWidgets.widget_code',
                          'value' => 'faqWidgets.widget_code',
                          ],
                          [
                          'attribute' => 'faqStato.descrizione',
                          'label' => 'Stato',
                          ],
                         */
//                        [
//                            'class' => 'arter\amos\core\views\grid\ActionColumn',
//                        ],
//                    ],
//                ],
                'listView' => [
                    'itemView' => '_item',
                ],
    ]);
    Pjax::end();
    ?>

</div>
