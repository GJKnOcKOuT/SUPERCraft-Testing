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
 * @package    arter\amos\layout
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

namespace arter\amos\layout\assets;

use yii\web\AssetBundle;

/**
 * Class AppAsset
 * @package arter\amos\layout\assets
 */

class MasonryAsset extends AssetBundle {

    public $js = [
        'js/masonry.pkgd.js',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
    ];

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = __DIR__ . '/resources/masonry';

        parent::init();
    }

}
