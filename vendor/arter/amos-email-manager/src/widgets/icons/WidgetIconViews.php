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
 * @package    arter\amos\email
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

namespace arter\amos\emailmanager\widgets\icons;

use arter\amos\core\widget\WidgetIcon;
use arter\amos\emailmanager\AmosEmail;
use Yii;
use yii\helpers\ArrayHelper;

class WidgetIconViews extends WidgetIcon
{

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $this->setLabel(AmosEmail::tHtml('amosemail', 'Notifications'));
        $this->setDescription(AmosEmail::t('amosemail', 'Notifications Widget'));
        $this->setIcon('envelope-o');
        $this->setUrl(Yii::$app->urlManager->createUrl(['email/email-view/index']));
        $this->setCode('EMAIL_MANAGER_MODULE');
        $this->setModuleName('email');
        $this->setNamespace(__CLASS__);

        $this->setClassSpan(
            ArrayHelper::merge(
                $this->getClassSpan(),
                [
                    'bk-backgroundIcon',
                    'color-darkGrey'
                ]
            )
        );
    }

    /**
     * Aggiunge all'oggetto container tutti i widgets recuperati dal controller del modulo
     *
     * @return type
     */
    public function getOptions()
    {
        return ArrayHelper::merge(
            parent::getOptions(),
            ['children' => $this->getWidgetsIcon()]
        );
    }

    /**
     * TEMPORANEA
     *
     * @return array
     */
    public function getWidgetsIcon()
    {
        $widgets = [];

        return $widgets;
    }

}
