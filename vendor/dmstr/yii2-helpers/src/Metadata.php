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


namespace dmstr\helpers;

use Yii;
use yii\base\Module;
use yii\helpers\ArrayHelper;
use yii\helpers\Inflector;

/**
 * Provides extended application information.
 */
class Metadata
{
    public static function getModules($sorted = true)
    {
        $modules = Yii::$app->getModules();
        if ($sorted) {
            ksort($modules);
        }

        return $modules;
    }

    /**
     * @param null $module
     * @param null $directory
     * @param array $blacklist List of blacklisted controllers (e.g. abstract controllers)
     * @return array
     */
    public static function getModuleControllers($module = null, $directory = null, $blacklist = ['abstract-auth-item'])
    {
        if ($module === null) {
            $module = \Yii::$app;
        } elseif ($module instanceof Module) {
            //$module = $module;
        } else {
            $module = \Yii::$app->getModule($module);
        }

        $controllers = [];
        $controllerDir = $module->getControllerPath().'/'.$directory;
        if (is_dir($controllerDir)) {
            foreach (scandir($controllerDir) as $i => $name) {
                if (substr($name, 0, 1) == '.') {
                    continue;
                }
                if (substr($name, -14) != 'Controller.php') {
                    continue;
                }
                $controller = Inflector::camel2id(str_replace('Controller.php', '', $name),'-',true);

                if (!\in_array($controller,$blacklist,true)) {
                    $route = ($module->id == 'app') ? '' : '/'.$module->id;
                    $route .= (!$directory) ? '' : '/'.$directory;
                    $route .= '/' . $controller;

                    $c = Yii::$app->createController($route);
                    if ($c === false) {
                        continue;
                    }

                    $controllers[] = [
                        'name' => $controller,
                        'module' => $module->id,
                        'route' => $route,
                        'url' => Yii::$app->urlManager->createUrl($route),
                        'actions' => self::getControllerActions($c[0]),
                    ];
                }

            }
        }

        return $controllers;
    }

    public static function getAllControllers()
    {
        $controllers = self::getModuleControllers();
        foreach (\Yii::$app->getModules() as $id => $module) {
            #var_dump($module);
            $controllers = ArrayHelper::merge($controllers, self::getModuleControllers($id));
        }

        return $controllers;
    }

    /**
     * Returns all available actions of the specified controller.
     * Taken from Yii2 HelpController.
     *
     * @param Controller $controller the controller instance
     *
     * @return array all available action IDs.
     */
    public static function getControllerActions($controller)
    {
        if (!$controller) {
            return [];
        }
        $actions = [];
        $prefix = ($controller->module->id === Yii::$app->id) ? '/'.$controller->id.'/' :
            $controller->module->id.'/'.$controller->id.'/';
        foreach ($controller->actions() as $name => $importedActions) {
            $actions[] = [
                'name' => $name,
                'route' => Yii::$app->urlManager->createUrl($prefix.$name),
            ];
        }
        $class = new \ReflectionClass($controller);
        foreach ($class->getMethods() as $method) {
            $name = $method->getName();
            if ($method->isPublic() && !$method->isStatic() && strpos($name, 'action') === 0 && $name !== 'actions') {
                $action = Inflector::camel2id(substr($name, 6), '-', true);
                $actions[] = [
                    'name' => $action,
                    'route' => Yii::$app->urlManager->createUrl($prefix.$action),
                ];
            }
        }
        //sort($actions);
        return $actions;
        #return array_unique($actions);
    }
}
