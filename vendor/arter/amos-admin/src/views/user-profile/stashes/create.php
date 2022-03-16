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
 * @package    arter\amos\admin\views\user-profile
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

use arter\amos\admin\AmosAdmin;

/**
 * @var yii\web\View $this
 * @var arter\amos\admin\models\UserProfile $model
 * @var bool $permissionSave
 */

$this->title = AmosAdmin::t('amosadmin', 'Crea');
$this->params['breadcrumbs'][] = ['label' => AmosAdmin::t('amosadmin', 'Utenti'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="user-profile-create">
    <?= $this->render('_form', [
        'model' => $model,
        'user' => $user,
        'permissionSave' => $permissionSave,
    ]) ?>
</div>
