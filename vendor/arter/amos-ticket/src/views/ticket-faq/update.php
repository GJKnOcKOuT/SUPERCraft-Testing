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
 * @package    arter\amos\ticket\views\ticket-faq
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

use arter\amos\ticket\AmosTicket;

/**
 * @var yii\web\View $this
 * @var arter\amos\ticket\models\TicketFaq $model
 */

$this->title = AmosTicket::t('amosticket', 'Aggiorna');
$this->params['breadcrumbs'][] = ['label' => AmosTicket::t('amosticket', 'Assistenza'), 'url' => '/ticket'];
$this->params['breadcrumbs'][] = ['label' => AmosTicket::t('amosticket', 'Faq'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->titolo, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title;

/*$this->title = Yii::t('cruds', 'Aggiorna {modelClass}', [
    'modelClass' => 'Ticket Faq',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('cruds', 'Ticket Faq'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('cruds', 'Aggiorna');*/
?>
<div class="ticket-faq-update">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
