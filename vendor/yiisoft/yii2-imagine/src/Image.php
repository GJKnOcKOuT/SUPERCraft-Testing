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
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace yii\imagine;

/**
 * Image implements most commonly used image manipulation functions using the [Imagine library](http://imagine.readthedocs.org/).
 *
 * Example of use:
 *
 * ```php
 * // generate a thumbnail image
 * Image::thumbnail('@webroot/img/test-image.jpg', 120, 120)
 *     ->save(Yii::getAlias('@runtime/thumb-test-image.jpg'), ['quality' => 50]);
 * ```
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class Image extends BaseImage
{
}