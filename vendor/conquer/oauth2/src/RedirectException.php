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
 * @link https://github.com/borodulin/yii2-oauth-server
 * @copyright Copyright (c) 2015 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-oauth-server/blob/master/LICENSE
 */

namespace conquer\oauth2;

use Yii;

/**
 *
 * @see http://tools.ietf.org/html/draft-ietf-oauth-v2-20#section-4.1
 * @author Andrey Borodulin
 */
class RedirectException extends Exception
{

    /**
     * @param string $redirect_uri
     * @param string $error_description (optional)
     * @param string $error A single error code
     * @param string $state Cross-Site Request Forgery
     * @see http://tools.ietf.org/html/draft-ietf-oauth-v2-20#section-4.1.2.1
     */
    public function __construct($redirect_uri, $error_description = null, $error = self::INVALID_REQUEST, $state = null)
    {
        parent::__construct($error_description, $error);

        $query = ['error' => $error];

        if ($error_description) {
            $query['error_description'] = $error_description;
        }

        if ($state) {
            $query['state'] = $state;
        }
        Yii::$app->response->redirect(http_build_url($redirect_uri, [
            'query' => http_build_query($query)
        ], HTTP_URL_REPLACE | HTTP_URL_JOIN_QUERY));
    }
}
