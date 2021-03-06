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

/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service;

use Google\Client;

/**
 * Service definition for Verifiedaccess (v1).
 *
 * <p>
 * API for Verified Access chrome extension to provide credential verification
 * for chrome devices connecting to an enterprise network</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/chrome/verified-access" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Verifiedaccess extends \Google\Service
{
  /** Verify your enterprise credentials. */
  const VERIFIEDACCESS =
      "https://www.googleapis.com/auth/verifiedaccess";

  public $challenge;

  /**
   * Constructs the internal representation of the Verifiedaccess service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://verifiedaccess.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'verifiedaccess';

    $this->challenge = new Verifiedaccess\Resource\Challenge(
        $this,
        $this->serviceName,
        'challenge',
        [
          'methods' => [
            'create' => [
              'path' => 'v1/challenge',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],'verify' => [
              'path' => 'v1/challenge:verify',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Verifiedaccess::class, 'Google_Service_Verifiedaccess');
