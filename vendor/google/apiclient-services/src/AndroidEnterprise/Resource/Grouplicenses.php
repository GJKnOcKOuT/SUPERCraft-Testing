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

namespace Google\Service\AndroidEnterprise\Resource;

use Google\Service\AndroidEnterprise\GroupLicense;
use Google\Service\AndroidEnterprise\GroupLicensesListResponse;

/**
 * The "grouplicenses" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidenterpriseService = new Google\Service\AndroidEnterprise(...);
 *   $grouplicenses = $androidenterpriseService->grouplicenses;
 *  </code>
 */
class Grouplicenses extends \Google\Service\Resource
{
  /**
   * Retrieves details of an enterprise's group license for a product.
   * (grouplicenses.get)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param string $groupLicenseId The ID of the product the group license is for,
   * e.g. "app:com.google.android.gm".
   * @param array $optParams Optional parameters.
   * @return GroupLicense
   */
  public function get($enterpriseId, $groupLicenseId, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId, 'groupLicenseId' => $groupLicenseId];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GroupLicense::class);
  }
  /**
   * Retrieves IDs of all products for which the enterprise has a group license.
   * (grouplicenses.listGrouplicenses)
   *
   * @param string $enterpriseId The ID of the enterprise.
   * @param array $optParams Optional parameters.
   * @return GroupLicensesListResponse
   */
  public function listGrouplicenses($enterpriseId, $optParams = [])
  {
    $params = ['enterpriseId' => $enterpriseId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GroupLicensesListResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Grouplicenses::class, 'Google_Service_AndroidEnterprise_Resource_Grouplicenses');
