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
 * @link https://github.com/brussens/yii2-maintenance-mode
 * @copyright Copyright (c) since 2015 Dmitry Brusensky
 * @license http://opensource.org/licenses/MIT MIT
 */

namespace brussens\maintenance\filters;

use brussens\maintenance\Filter;
use yii\web\Request;

/**
 * Class URIFilter
 * @package brussens\maintenance\filters
 * @deprecated since 1.2.0
 */
class URIFilter extends Filter
{
    /**
     * @var array
     */
    public $uri;
    /**
     * @var Request
     */
    protected $request;

    /**
     * URIChecker constructor.
     * @param Request $request
     * @param array $config
     */
    public function __construct(Request $request, array $config = [])
    {
        $this->request = $request;
        parent::__construct($config);
    }

    /**
     * @inheritdoc
     */
    public function init()
    {
        if (is_string($this->uri)) {
            $this->uri = [$this->uri];
        }
    }

    /**
     * @return bool
     * @throws \yii\base\InvalidConfigException
     */
    public function isAllowed()
    {
        if (is_array($this->uri) && !empty($this->uri)) {
           return (bool) in_array($this->request->getPathInfo(), $this->uri);
        }
        return false;
    }
}
