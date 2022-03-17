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

namespace Google\Service\AndroidManagement\Resource;

use Google\Service\AndroidManagement\AndroidmanagementEmpty;
use Google\Service\AndroidManagement\Enterprise;
use Google\Service\AndroidManagement\ListEnterprisesResponse;

/**
 * The "enterprises" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidmanagementService = new Google\Service\AndroidManagement(...);
 *   $enterprises = $androidmanagementService->enterprises;
 *  </code>
 */
class Enterprises extends \Google\Service\Resource
{
  /**
   * Creates an enterprise. This is the last step in the enterprise signup flow.
   * (enterprises.create)
   *
   * @param Enterprise $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool agreementAccepted This feature is not generally available
   * yet. Whether the managed Google Play Agreement is presented and agreed.
   * @opt_param string enterpriseToken The enterprise token appended to the
   * callback URL.
   * @opt_param string projectId The ID of the Google Cloud Platform project which
   * will own the enterprise.
   * @opt_param string signupUrlName The name of the SignupUrl used to sign up for
   * the enterprise.
   * @return Enterprise
   */
  public function create(Enterprise $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], Enterprise::class);
  }
  /**
   * This feature is not generally available yet. Deletes an enterprise.
   * (enterprises.delete)
   *
   * @param string $name This feature is not generally available yet. The name of
   * the enterprise in the form enterprises/{enterpriseId}.
   * @param array $optParams Optional parameters.
   * @return AndroidmanagementEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], AndroidmanagementEmpty::class);
  }
  /**
   * Gets an enterprise. (enterprises.get)
   *
   * @param string $name The name of the enterprise in the form
   * enterprises/{enterpriseId}.
   * @param array $optParams Optional parameters.
   * @return Enterprise
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Enterprise::class);
  }
  /**
   * This feature is not generally available yet. Lists enterprises that are
   * managed by an EMM. Only partial views are returned.
   * (enterprises.listEnterprises)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize This feature is not generally available yet. The
   * requested page size. The actual page size may be fixed to a min or max value.
   * @opt_param string pageToken This feature is not generally available yet. A
   * token identifying a page of results returned by the server.
   * @opt_param string projectId Required. This feature is not generally available
   * yet. The ID of the Cloud project of the EMM the enterprises belongs to.
   * @opt_param string view This feature is not generally available yet. View that
   * specify that partial response should be returned.
   * @return ListEnterprisesResponse
   */
  public function listEnterprises($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListEnterprisesResponse::class);
  }
  /**
   * Updates an enterprise. (enterprises.patch)
   *
   * @param string $name The name of the enterprise in the form
   * enterprises/{enterpriseId}.
   * @param Enterprise $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The field mask indicating the fields to update.
   * If not set, all modifiable fields will be modified.
   * @return Enterprise
   */
  public function patch($name, Enterprise $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], Enterprise::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Enterprises::class, 'Google_Service_AndroidManagement_Resource_Enterprises');
