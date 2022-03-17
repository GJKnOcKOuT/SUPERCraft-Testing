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


/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2017
 * @package yii2-widgets
 * @subpackage yii2-widget-timepicker
 * @version 1.0.3
 */

namespace kartik\time;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\base\InputWidget;

/**
 * The TimePicker widget  allows you to easily select a time for a text input using your mouse or keyboards arrow keys.
 * Thus widget is a wrapper enhancement over the TimePicker JQuery plugin by rendom forked from the plugin by jdewit.
 * Additional enhancements have been done to this input widget and plugin by Krajee to fix various bugs, and also
 * provide compatibility with Bootstrap 3.
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 * @see https://github.com/rendom/bootstrap-3-timepicker
 * @see https://github.com/jdewit/bootstrap-timepicker
 */
class TimePicker extends InputWidget
{
    /**
     * @var string the size of the input - 'lg', 'md', 'sm', 'xs'
     */
    public $size;

    /**
     * @var string|boolean the addon content
     */
    public $addon = '<i class="glyphicon glyphicon-time"></i>';

    /**
     * @var array HTML attributes for the addon container. The following special options are recognized:
     * - `asButton`: _boolean_, if the addon is to be displayed as a button.
     * - `buttonOptions`: _array_, HTML attributes if the addon is to be displayed like a button. If [[asButton]] is
     *   `true`, this will default to `['class' => 'btn btn-default']`.
     */
    public $addonOptions = [];

    /**
     * @var array HTML attributes for the input group container
     */
    public $containerOptions = [];

    /**
     * @inheritdoc
     */
    public $pluginName = 'timepicker';

    /**
     * @inheritdoc
     */
    public function run()
    {
        $this->registerAssets();
        echo Html::tag('div', $this->renderInput(), $this->containerOptions);
    }

    /**
     * Renders the input
     *
     * @return string
     */
    protected function renderInput()
    {
        Html::addCssClass($this->options, 'form-control');
        if (!empty($this->options['disabled'])) {
            Html::addCssClass($this->addonOptions, 'disabled-addon');
        }
        if (ArrayHelper::getValue($this->pluginOptions, 'template', true) === false) {
            Html::addCssClass($this->containerOptions, 'bootstrap-timepicker');
            if (isset($this->size)) {
                Html::addCssClass($this->options, 'input-' . $this->size);
                Html::addCssClass($this->addonOptions, 'inline-addon inline-addon-' . $this->size);
            } else {
                Html::addCssClass($this->addonOptions, 'inline-addon');
            }
            return $this->getInput('textInput') . Html::tag('span', $this->addon, $this->addonOptions);
        }
        Html::addCssClass($this->containerOptions, 'bootstrap-timepicker input-group');
        $asButton = ArrayHelper::remove($this->addonOptions, 'asButton', false);
        $buttonOptions = ArrayHelper::remove($this->addonOptions, 'buttonOptions', []);
        if ($asButton) {
            Html::addCssClass($this->addonOptions, 'input-group-btn picker');
            $buttonOptions['type'] = 'button';
            if (empty($buttonOptions['class'])) {
                Html::addCssClass($buttonOptions, 'btn btn-default');
            }
            $content = Html::button($this->addon, $buttonOptions);
        } else {
            Html::addCssClass($this->addonOptions, 'input-group-addon picker');
            $content = $this->addon;
        }
        $addon = Html::tag('span', $content, $this->addonOptions);
        if (isset($this->size)) {
            Html::addCssClass($this->containerOptions, 'input-group-' . $this->size);
        }
        return $this->getInput('textInput') . $addon;
    }

    /**
     * Registers the client assets for [[Timepicker]] widget
     */
    public function registerAssets()
    {
        $view = $this->getView();
        TimePickerAsset::register($view);
        $this->registerPlugin($this->pluginName);
    }
}
