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
 * @package    arter\amos\cwh
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

namespace arter\amos\cwh\assets;

use yii\web\AssetBundle;

class CwhAsset extends AssetBundle
{
    public $sourcePath = '@vendor/arter/amos-cwh/src/assets/web';

    public $css = [
        'less/cwh.less'
    ];

    public $depends = [
    ];

    /*
    //force reset cache asset (devel ONLY)
    public $publishOptions = [
        'forceCopy'=>true,
    ];
    */

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
