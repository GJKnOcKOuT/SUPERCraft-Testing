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
 * @package    arter\amos\faq\migrations
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

use arter\amos\core\migration\AmosMigrationWidgets;

/**
 * Class m171011_093451_change_widget_faq_dashboard_visible
 */
class m171011_093451_change_widget_faq_dashboard_visible extends AmosMigrationWidgets
{
    const MODULE_NAME = 'faq';
    
    /**
     * @inheritdoc
     */
    protected function initWidgetsConfs()
    {
        $this->widgets = [
            [
                'classname' => \arter\amos\faq\widgets\icons\WidgetIconFaqDashboard::className(),
                'dashboard_visible' => 1,
                'update' => true
            ]
        ];
    }
}
