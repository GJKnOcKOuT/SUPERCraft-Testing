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


namespace arter\amos\sondaggi\assets;

use yii\web\AssetBundle;

class ModuleRisultatiAsset extends AssetBundle
{
    public $sourcePath = '@vendor/arter/amos-sondaggi/src/assets/web';

    public $css = [
        'css/stile.css'
    ];
    public $js = [        
    ];
    public $depends = [        
        'yii\web\JqueryAsset',
        'yii\jui\JuiAsset',
        //'kartik\depdrop\DepDropAsset',
        'kartik\depdrop\DepDropExtAsset'
    ];

    public function init()
    {
        $moduleL = \Yii::$app->getModule('layout');
        if(!empty($moduleL))
        { $this->depends [] = 'arter\amos\layout\assets\BaseAsset'; }
        else
        { $this->depends [] = 'arter\amos\core\views\assets\AmosCoreAsset'; }
        parent::init(); // TODO: Change the autogenerated stub
    }
}
