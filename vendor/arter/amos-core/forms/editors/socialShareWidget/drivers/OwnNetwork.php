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
 * @link https://github.com/yiimaker/yii2-social-share
 * @copyright Copyright (c) 2017-2018 Yii Maker
 * @license BSD 3-Clause License
 */

namespace arter\amos\core\forms\editors\socialShareWidget\drivers;

use ymaker\social\share\base\AbstractDriver;

/**
 * Driver for Facebook.
 *
 * @link https://facebook.com
 *
 * @author Vladimir Kuprienko <vldmr.kuprienko@gmail.com>
 * @since 1.0
 */
class OwnNetwork extends AbstractDriver
{

    /**
     * {@inheritdoc}
     */
    protected function processShareData()
    {
        $this->url   = static::encodeData($this->url);
        $this->title = static::encodeData($this->title);
    }

    /**
     * @inheritdoc
     */
    protected function buildLink()
    {
        return 'javascript:void(0);';
    }
}