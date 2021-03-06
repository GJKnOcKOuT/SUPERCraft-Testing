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
 * @package    arter\amos\comments\widgets\views\comments-widget
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

use arter\amos\attachments\components\AttachmentsInput;
use arter\amos\comments\AmosComments;
use arter\amos\comments\assets\CommentsAsset;
use arter\amos\comments\models\Comment;
use arter\amos\core\forms\AccordionWidget;
use arter\amos\core\forms\TextEditorWidget;
use arter\amos\core\helpers\Html;
use arter\amos\core\icons\AmosIcons;
use arter\amos\core\utilities\ModalUtility;
use yii\web\View;
use arter\amos\news\models\News;

CommentsAsset::register($this);

/**
 * @var \arter\amos\comments\widgets\CommentsWidget $widget
 */

$js = "
$('#contribute-btn').on('click', function (event) {
    if (typeof tinymce != 'undefined') {
        tinymce.triggerSave();
    }
    Comments.saveComment(" . $widget->model->id . ", '" . addslashes($widget->model->className()) . "')
});
";
$this->registerJs($js, View::POS_READY);

/** @var AmosComments $commentsModule */
$commentsModule = Yii::$app->getModule(AmosComments::getModuleName());

ModalUtility::createAlertModal([
    'id' => 'ajax-error-comment-modal-id',
    'modalDescriptionText' => AmosComments::t('amoscomments', '#AJAX_ERROR_COMMENT')
]);
ModalUtility::createAlertModal([
    'id' => 'empty-comment-modal-id',
    'modalDescriptionText' => AmosComments::t('amoscomments', '#EMPTY_COMMENT')
]);

?>

<div id="comments_contribute" class="contribute col-xs-12 nop">
    <?php if (Yii::$app->getUser()->can('COMMENT_CREATE', ['model' => $widget->model])) { ?>
        <?php
        $displayNotifyCheckBox = true;

        if (isset($commentsModule->displayNotifyCheckbox)) {
            if (is_bool($commentsModule->displayNotifyCheckbox)) {
                $displayNotifyCheckBox = $commentsModule->displayNotifyCheckbox;
            }
        }

        $openAccordion = false;

        if (isset($commentsModule->accordionOpenedByDefault)) {
            if (is_bool($commentsModule->accordionOpenedByDefault)) {
                if ($commentsModule->accordionOpenedByDefault) {
                    $openAccordion = 0;
                }
            }
        }

        $redactorComment = Html::tag(
            'div',
            Html::tag('div',
                Html::label($widget->options['commentTitle'], 'contribute-area', ['class' => 'sr-only']) .
                TextEditorWidget::widget([
                    'name' => 'contribute-area',
                    'value' => null,
                    'language' => substr(Yii::$app->language, 0, 2),
                    'options' => [
                        'id' => 'contribute-area',
                        'class' => 'form-control'
                    ],
                    'clientOptions' => [
                        'placeholder' => $widget->options['commentPlaceholder'],
                    ],
                ]) .
                $this->render('_send_notify_checkbox', [
                    'widget' => $widget,
                    'enableUserSendMailCheckbox' => $commentsModule->enableUserSendMailCheckbox,
                    'displayNotifyCheckBox' => $displayNotifyCheckBox,
                    'checkboxName' => 'send_notify_mail',
                    'viewTypePosition' => Comment::VIEW_TYPE_POSITION
                ]),
                ['class' => '']),
            [
                'id' => 'bk-contribute',
                'class' => 'contribute-container col-md-8 col-xs-12 nop'
            ]);

        $attachmComment = Html::tag(
            'div',
            AttachmentsInput::widget([
                'id' => 'commentAttachments',
                'name' => 'commentAttachments',
                'model' => $widget->model,
                'options' => [ // Options of the Kartik's FileInput widget
                    'multiple' => true, // If you want to allow multiple upload, default to false
                ],
                'pluginOptions' => [ // Plugin options of the Kartik's FileInput widget
                    'maxFileCount' => $commentsModule->maxCommentAttachments, // Client max files
                    'showPreview' => false
                ]
            ]),
            ['class' => 'col-md-4 col-xs-12 nop']
        );

        $btnComment = Html::tag(
            'div',
            Html::button(AmosComments::t('amoscomments', '#COMMENT_BUTTON'), ['id' => 'contribute-btn',
                'class' => 'btn btn-navigation-primary',
                'title' => AmosComments::t('amoscomments', 'Comment content')]),
            ['class' => 'col-xs-12 text-right m-t-15 nop']
        );
        if (!isset(Yii::$app->params['isPoi']) || !($widget->model->className() == News::className() && $widget->model->id == 3126)) {
            ?>

            <?= AccordionWidget::widget([
                'items' => [
                    [
                        'header' => AmosIcons::show('comments') . $widget->options['commentTitle'],
                        'content' => $redactorComment . $attachmComment . $btnComment
                    ]
                ],
                'headerOptions' => ['tag' => 'h2'],
                'clientOptions' => [
                    'collapsible' => true,
                    'active' => $openAccordion, // set integer 0 for active on load view
                    'icons' => [
                        'header' => 'ui-icon-amos am am-plus-square',
                        'activeHeader' => 'ui-icon-amos am am-minus-square',
                    ]
                ],
                'options' => [
                    'class' => (empty($commentsModule->layoutInverted) || $commentsModule->layoutInverted == false) ? 'first-accordion' : ''
                ]
            ]);
        } ?>

        <?php
        if (\Yii::$app->request->get('urlRedirect') && (
             strpos(\Yii::$app->request->get('urlRedirect'), \Yii::$app->params['platform']['frontendUrl']) !== false
            ||strpos(\Yii::$app->request->get('urlRedirect'), \Yii::$app->params['platform']['backendUrl']) !== false
            )
        ) {
            echo Html::hiddenInput('urlRedirect', \Yii::$app->request->get('urlRedirect'),['id' => 'url-redirect']);
        }
        ?>
    <?php } ?>
</div>
