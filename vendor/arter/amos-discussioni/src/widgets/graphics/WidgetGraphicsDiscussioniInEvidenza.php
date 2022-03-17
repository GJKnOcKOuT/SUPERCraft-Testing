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
 * @package    arter\amos\discussioni
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

namespace arter\amos\discussioni\widgets\graphics;

use arter\amos\core\widget\WidgetGraphic;
use arter\amos\discussioni\AmosDiscussioni;
use arter\amos\discussioni\models\search\DiscussioniTopicSearch;

/**
 *
 * @deprecated
 * Class WidgetGraphicsDiscussioniInEvidenza
 * informational widget that lists threads in evidence
 * @package arter\amos\discussioni\widgets\graphics
 */
class WidgetGraphicsDiscussioniInEvidenza extends WidgetGraphic {

  /**
   * @inheritdoc
   */
  public function init() {
    parent::init();
    
    $this->setCode('ULTIME_DISCUSSIONI_GRAPHIC');
    $this->setLabel(AmosDiscussioni::tHtml('amosdiscussioni', 'Discussioni in evidenza'));
    $this->setDescription(AmosDiscussioni::t('amosdiscussioni', 'Elenca le ultime discussioni in evidenza'));
  }

  /**
   * Rendering of the view discussioni_in_evidenza
   *
   * @return string
   */
  public function getHtml() {
    $listaTopic = (new DiscussioniTopicSearch())->discussioniInEvidenza($_GET, AmosDiscussioni::MAX_LAST_DISCUSSION_ON_DASHBOARD);
    $viewPath = '@vendor/arter/amos-discussioni/src/widgets/graphics/views/';
    $viewToRender = $viewPath . 'ultime_discussioni';

    if (is_null(\Yii::$app->getModule('layout'))) {
      $viewToRender .= '_old';
    }

    return $this->render(
      $viewToRender,
      [
        'listaTopic' => $listaTopic,
        'widget' => $this,
        'toRefreshSectionId' => 'widgetGraphicStickyThreads'
      ]
    );
  }

}