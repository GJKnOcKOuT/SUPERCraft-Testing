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
 * @package    arter\amos\admin\assets
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

namespace arter\amos\admin\assets;

use yii\web\AssetBundle;
use arter\amos\core\widget\WidgetAbstract;


/**
 * Class ModuleAdminAsset
 * @package arter\amos\admin\assets
 */
class ModuleAdminAsset extends AssetBundle
{
    public $sourcePath = '@vendor/arter/amos-admin/src/assets/web';

    public $css = [
        'less/admin.less',
    ];
    public $js = [
        //'js/admin-js.js'
    ];
    public $depends = [
    ];

    public function init()
    {
        $moduleL = \Yii::$app->getModule('layout');

        if(!empty(\Yii::$app->params['dashboardEngine']) && \Yii::$app->params['dashboardEngine'] == WidgetAbstract::ENGINE_ROWS){
            $this->css = ['less/admin_fullsize.less','less/widget_users_list.less'];
            $this->js = ['js/widget_users_list.js'];
        }

        if(!empty($moduleL))
        { $this->depends [] = 'arter\amos\layout\assets\BaseAsset'; }
        else
        { $this->depends [] = 'arter\amos\core\views\assets\AmosCoreAsset'; }
        parent::init(); // TODO: Change the autogenerated stub
    }

}