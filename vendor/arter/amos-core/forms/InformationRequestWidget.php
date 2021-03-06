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
 * @package    arter\amos\core\forms
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

namespace arter\amos\core\forms;

use arter\amos\core\helpers\Html;
use arter\amos\core\module\BaseAmosModule;
use yii\helpers\ArrayHelper;

/**
 * Class InformationRequestWidget
 * @package arter\amos\core\forms
 */
class InformationRequestWidget extends \yii\base\Widget
{

    public $btnOptions = [];

    public $btnLabel;

    public $layout = '{infoRequestBtn}{infoRequestModalForm}';

    /**
     * @var string $templatePath - email template path, leave null to use default template
     */
    public $templatePath;

    /**
     * @var string $attributeTo - model attribute specifying the recipient email address
     */
    public $attributeTo;

    /**
     * @var integer $userIdTo - User id of the mail recipient
     */
    public $userIdTo;

    /**
     * @var string $subject - email subject, leave null to use the default one
     */
    public $subject;

    /**
     * @var integer $modelId - model id - if empty uses controller->model->id
     */
    public $modelId;

    public function init()
    {
        parent::init();
        if(!isset($this->modelId)){
            $this->modelId = \Yii::$app->controller->model->id;
        }
    }


    public function run()
    {
        $content = preg_replace_callback("/{\\w+}/", function ($matches) {
            $content = $this->renderSection($matches[0]);

            return $content === false ? $matches[0] : $content;
        }, $this->layout);

        return $content;
    }

    /**
     * @inheritdoc
     */
    public function renderSection($name)
    {
        switch ($name) {
            case '{infoRequestBtn}':
                return $this->renderInfoRequestBtn();
            case '{infoRequestModalForm}':
                return $this->renderInfoRequestModalForm();
            default:
                return false;
        }
    }

    public function renderInfoRequestBtn()
    {
        if(is_null($this->btnLabel)){
            $this->btnLabel = BaseAmosModule::t('amoscore', '#new_info_request_btn');
        }
        $btnOptions = ArrayHelper::merge( [
            'class' => 'btn btn-administration-primary',
            'data-target' => '#info-request-modal',
            'data-toggle' => 'modal'
        ], $this->btnOptions);

        $btn = Html::a($this->btnLabel,
            null,
            $btnOptions
        ) ;

        return $btn;

    }

    public function renderInfoRequestModalForm()
    {
        $emailForm =  new EmailForm();
        if(isset($this->templatePath)){
            $emailForm->templatePath = $this->templatePath;
        }
        if(isset($this->attributeTo)){
            $emailForm->attributeTo = $this->attributeTo;
        }
        if(isset($this->userIdTo)){
            $emailForm->userIdTo = $this->userIdTo;
        }
        if(isset($this->subject)){
            $emailForm->userIdTo = $this->subject;
        }
        return $this->render('information_request', ['infoRequest' => $emailForm, 'modelId' => $this->modelId]);
    }

}
