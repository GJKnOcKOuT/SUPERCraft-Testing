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
 * @package    arter\amos\community\widgets\icons
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

namespace arter\amos\community\widgets\icons;

use arter\amos\core\widget\WidgetIcon;
use arter\amos\core\widget\WidgetAbstract;
use arter\amos\core\icons\AmosIcons;

use arter\amos\community\AmosCommunity;
use arter\amos\community\models\Community;
use arter\amos\community\models\search\CommunitySearch;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * Class WidgetIconMyCommunitiesWithTags
 * @package arter\amos\community\widgets\icons
 */
class WidgetIconMyCommunitiesWithTags extends WidgetIcon
{

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $paramsClassSpan = [
            'bk-backgroundIcon',
            'color-primary'
        ];

        $this->setLabel(AmosCommunity::tHtml('amoscommunity', '#communities_of_interest'));
        $this->setDescription(AmosCommunity::t('amoscommunity', '#communities_of_interest_description'));

        if (!empty(Yii::$app->params['dashboardEngine']) && Yii::$app->params['dashboardEngine'] == WidgetAbstract::ENGINE_ROWS) {
            $this->setIconFramework(AmosIcons::IC);
            $this->setIcon('community');
            $paramsClassSpan = [];
        } else {
            $this->setIcon('group');
        }

        $url = ['/community/community/own-interest-communities'];

        $this->setUrl($url);
        $this->setCode('COMMUNITY');
        $this->setModuleName('community');
        $this->setNamespace(__CLASS__);

        $this->setClassSpan(
            ArrayHelper::merge(
                $this->getClassSpan(),
                $paramsClassSpan
            )
        );

//        if ($this->disableBulletCounters == false) {
//            $search = new CommunitySearch();
//            $this->setBulletCount(
//                $this->makeBulletCounter(
//                    Yii::$app->getUser()->id,
//                    Community::className(),
//                    $search->buildQuery([], 'own-interest-with-tags')
//                )
//            );
//        }
    }

    /**
     * 
     * @return type
     */
    public static function widgetLabel()
    {
        return AmosCommunity::t('amoscommunity', '#communities_of_interest');
    }

}