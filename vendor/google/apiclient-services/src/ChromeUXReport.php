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
 * Service definition for ChromeUXReport (v1).
 *
 * <p>
 * The Chrome UX Report API lets you view real user experience data for millions
 * of websites.</p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/web/tools/chrome-user-experience-report/api/reference" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class ChromeUXReport extends \Google\Service
{


  public $records;

  /**
   * Constructs the internal representation of the ChromeUXReport service.
   *
   * @param Client|array $clientOrConfig The client used to deliver requests, or a
   *                                     config array to pass to a new Client instance.
   * @param string $rootUrl The root URL used for requests to the service.
   */
  public function __construct($clientOrConfig = [], $rootUrl = null)
  {
    parent::__construct($clientOrConfig);
    $this->rootUrl = $rootUrl ?: 'https://chromeuxreport.googleapis.com/';
    $this->servicePath = '';
    $this->batchPath = 'batch';
    $this->version = 'v1';
    $this->serviceName = 'chromeuxreport';

    $this->records = new ChromeUXReport\Resource\Records(
        $this,
        $this->serviceName,
        'records',
        [
          'methods' => [
            'queryRecord' => [
              'path' => 'v1/records:queryRecord',
              'httpMethod' => 'POST',
              'parameters' => [],
            ],
          ]
        ]
    );
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ChromeUXReport::class, 'Google_Service_ChromeUXReport');
