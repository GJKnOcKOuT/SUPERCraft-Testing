<?php
/**
 * Copyright 2020 Art-ER S. Cons. P.A.
 * EROI - Emilia Romagna Open Innovation is based on:
 * https://www.open2.0.regione.lombardia.it
 *
 * @package    arter
 * @category   CategoryName
 */

namespace app\modules\uikit;

use Yii;
use trk\uikit\Uikit;

/**
 * Description of BaseUikitBlock
 *
 * @author stefano.cavazzini
 */
abstract class BaseUikitBlock extends \trk\uikit\BaseUikitBlock
{
    const CONFIGS_EXT = ".json";
    const COMPONENTS_PATH = __DIR__ . DIRECTORY_SEPARATOR . "components" . DIRECTORY_SEPARATOR;
    
    /**
     * 
     * @param type $component
     * @return type
     */
    protected function getComponentConfigs($component = "") {
        $component = $component ?: $this->component;
        $configs = $this->getJsonContent(self::COMPONENTS_PATH . $component . self::CONFIGS_EXT);
        $configs['vars'] = $this->setConfigFields(Uikit::element("vars", $configs, []));
        $configs["cfgs"] = $this->setConfigFields(Uikit::element("cfgs", $configs, []));
        return $configs;
    }
    
    public function getViewPath()
    {
        return  __DIR__ . '/views';
    }
}
