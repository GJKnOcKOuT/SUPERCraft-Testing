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


namespace lajax\translatemanager\controllers\actions;

use Yii;
use lajax\translatemanager\bundles\TranslateAsset;
use lajax\translatemanager\bundles\TranslatePluginAsset;
use lajax\translatemanager\models\searches\LanguageSourceSearch;

/**
 * This class facilitates the listing of language elements to be translated.
 *
 * @author Lajos Molnár <lajax.m@gmail.com>
 *
 * @since 1.0
 */
class TranslateAction extends \yii\base\Action
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        TranslateAsset::register(Yii::$app->controller->view);
        TranslatePluginAsset::register(Yii::$app->controller->view);
        parent::init();
    }

    /**
     * List of language elements.
     *
     * @return string
     */
    public function run()
    {
        $searchModel = new LanguageSourceSearch([
            'searchEmptyCommand' => $this->controller->module->searchEmptyCommand,
        ]);
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());

        return $this->controller->render('translate', [
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
            'searchEmptyCommand' => $this->controller->module->searchEmptyCommand,
            'language_id' => Yii::$app->request->get('language_id', ''),
        ]);
    }
}
