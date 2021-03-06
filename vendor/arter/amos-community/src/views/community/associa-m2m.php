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
 * @package    arter\amos\community\views\community
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

use arter\amos\admin\AmosAdmin;
use arter\amos\admin\models\UserProfile;
use arter\amos\community\AmosCommunity;
use arter\amos\core\forms\editors\m2mWidget\M2MWidget;
use arter\amos\core\interfaces\OrganizationsModuleInterface;
use arter\amos\core\user\User;

/**
 * @var \arter\amos\community\models\Community $model
 */
 $this->registerJs("
    $(function () {
        $('[data-toggle=\"tooltip\"]').tooltip();
    });
", $this::POS_END, 'tooltips');

$this->title = $model;
$this->params['breadcrumbs'][] = ['label' => AmosCommunity::t('amoscommunity', 'Community'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model, 'url' => ['update', 'id' => $model->id]];
$this->params['breadcrumbs'][] = AmosCommunity::t('amoscommunity', 'Invite Users');

$moduleCommunity = Yii::$app->getModule('community');
$customInvitationForm = $moduleCommunity->customInvitationForm;
$inviteUserOfcommunityParent = $moduleCommunity->inviteUserOfcommunityParent;
$isSubCommunity = !empty($model->getCommunityModel()->parent_id);

$searchObj = Yii::createObject($model->context);
$query = $searchObj->hasMethod('getAssociationTargetQuery') ?
    $searchObj->getAssociationTargetQuery($model->id) :
    $model->getAssociationTargetQuery($model->id);
$post = Yii::$app->request->post();
if (isset($post['genericSearch'])) {
    $query->andFilterWhere(['or',
        ['like', UserProfile::tableName() . '.cognome', $post['genericSearch']],
        ['like', UserProfile::tableName() . '.nome', $post['genericSearch']],
        ['like', "CONCAT( ". UserProfile::tableName() .".nome , ' ', ". UserProfile::tableName() .".cognome )", $post['genericSearch']],
        ['like', "CONCAT( ". UserProfile::tableName() .".cognome , ' ', ". UserProfile::tableName() .".nome )", $post['genericSearch']],
        ['like', UserProfile::tableName() . '.codice_fiscale', $post['genericSearch']],
        ['like', UserProfile::tableName() . '.domicilio_indirizzo', $post['genericSearch']],
        ['like', UserProfile::tableName() . '.indirizzo_residenza', $post['genericSearch']],
        ['like', UserProfile::tableName() . '.domicilio_localita', $post['genericSearch']],
        ['like', UserProfile::tableName() . '.domicilio_cap', $post['genericSearch']],
        ['like', UserProfile::tableName() . '.cap_residenza', $post['genericSearch']],
        ['like', UserProfile::tableName() . '.numero_civico_residenza', $post['genericSearch']],
        ['like', UserProfile::tableName() . '.domicilio_civico', $post['genericSearch']],
        ['like', UserProfile::tableName() . '.telefono', $post['genericSearch']],
        ['like', UserProfile::tableName() . '.cellulare', $post['genericSearch']],
        ['like', UserProfile::tableName() . '.email_pec', $post['genericSearch']],
    ]);
}

if($inviteUserOfcommunityParent && $isSubCommunity){
    $parent_id = $model->getCommunityModel()->parent_id;
    $query->innerJoin('community_user_mm', 'community_user_mm.user_id=user.id')
        ->andWhere(['community_user_mm.community_id' => $parent_id])
        ->andWhere(['IS', 'community_user_mm.deleted_at', null]);
}

echo M2MWidget::widget([
    'model' => $model,
    'modelId' => $model->id,
    'modelData' => $model->getCommunityUsers(),
    'modelDataArrFromTo' => [
        'from' => 'id',
        'to' => 'id'
    ],
    'modelTargetSearch' => [
        'class' => User::className(),
        'query' => $query,
    ],
    'gridId' => 'community-members-grid',
    'viewSearch' => (isset($viewM2MWidgetGenericSearch) ? $viewM2MWidgetGenericSearch : false),
    'isModal' => true,
    'relationAttributesArray' => ['status', 'role'],
    'targetUrlController' => 'community',
    'moduleClassName' => \arter\amos\community\AmosCommunity::className(),
    'postName' => 'Community',
    'postKey' => 'user',
    'targetColumnsToView' => [
        'User image' => [
            'headerOptions' => [
                'id' => AmosCommunity::t('amoscommunity', 'User image'),
            ],
            'contentOptions' => [
                'headers' => AmosCommunity::t('amoscommunity', 'User image'),
            ],
            'label' => AmosCommunity::t('amoscommunity', 'User image'),
            'format' => 'raw',
            'value' => function ($model) {
                /** @var \arter\amos\core\user\User $model */
                /** @var \arter\amos\admin\models\UserProfile $userProfile */
                $userProfile = $model->getProfile();
                return empty($userProfile) ? '' : \arter\amos\admin\widgets\UserCardWidget::widget(['model' => $userProfile, 'containerAdditionalClass' => 'nom']);
            }
        ],
        'name' => [
            'attribute' => 'profile.surnameName',
            'label' => AmosCommunity::t('amoscommunity', 'Name'),
            'headerOptions' => [
                'id' => AmosCommunity::t('amoscommunity', 'Name'),
            ],
//            'contentOptions' => [
//                'headers' => AmosCommunity::t('amoscommunity', 'Name'),
//            ],

            'value'=> function($model){
                return \arter\amos\admin\widgets\UserProfileTooltipWidget::widget(['model' => $model->userProfile]);
            },
            'format' => 'raw',

        ],
    ],
]);

?>


