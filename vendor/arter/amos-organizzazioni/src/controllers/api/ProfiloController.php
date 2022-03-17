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
 * @package    arter\amos\organizzazioni
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

namespace arter\amos\organizzazioni\controllers\api;

/**
 * This is the class for REST controller "ProfiloController".
 */
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class ProfiloController extends \yii\rest\ActiveController
{
	public $modelClass = 'arter\amos\organizzazioni\models\Profilo';
}
