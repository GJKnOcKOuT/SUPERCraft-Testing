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

namespace Google\Service\Cloudchannel\Resource;

use Google\Service\Cloudchannel\GoogleCloudChannelV1Customer;
use Google\Service\Cloudchannel\GoogleCloudChannelV1ListCustomersResponse;
use Google\Service\Cloudchannel\GoogleProtobufEmpty;

/**
 * The "customers" collection of methods.
 * Typical usage is:
 *  <code>
 *   $cloudchannelService = new Google\Service\Cloudchannel(...);
 *   $customers = $cloudchannelService->customers;
 *  </code>
 */
class AccountsChannelPartnerLinksCustomers extends \Google\Service\Resource
{
  /**
   * Creates a new Customer resource under the reseller or distributor account.
   * Possible error codes: * PERMISSION_DENIED: The reseller account making the
   * request is different from the reseller account in the API request. *
   * INVALID_ARGUMENT: * Required request parameters are missing or invalid. *
   * Domain field value doesn't match the primary email domain. Return value: The
   * newly created Customer resource. (customers.create)
   *
   * @param string $parent Required. The resource name of reseller account in
   * which to create the customer. Parent uses the format: accounts/{account_id}
   * @param GoogleCloudChannelV1Customer $postBody
   * @param array $optParams Optional parameters.
   * @return GoogleCloudChannelV1Customer
   */
  public function create($parent, GoogleCloudChannelV1Customer $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleCloudChannelV1Customer::class);
  }
  /**
   * Deletes the given Customer permanently. Possible error codes: *
   * PERMISSION_DENIED: The account making the request does not own this customer.
   * * INVALID_ARGUMENT: Required request parameters are missing or invalid. *
   * FAILED_PRECONDITION: The customer has existing entitlements. * NOT_FOUND: No
   * Customer resource found for the name in the request. (customers.delete)
   *
   * @param string $name Required. The resource name of the customer to delete.
   * @param array $optParams Optional parameters.
   * @return GoogleProtobufEmpty
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleProtobufEmpty::class);
  }
  /**
   * Returns the requested Customer resource. Possible error codes: *
   * PERMISSION_DENIED: The reseller account making the request is different from
   * the reseller account in the API request. * INVALID_ARGUMENT: Required request
   * parameters are missing or invalid. * NOT_FOUND: The customer resource doesn't
   * exist. Usually the result of an invalid name parameter. Return value: The
   * Customer resource. (customers.get)
   *
   * @param string $name Required. The resource name of the customer to retrieve.
   * Name uses the format: accounts/{account_id}/customers/{customer_id}
   * @param array $optParams Optional parameters.
   * @return GoogleCloudChannelV1Customer
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudChannelV1Customer::class);
  }
  /**
   * List Customers. Possible error codes: * PERMISSION_DENIED: The reseller
   * account making the request is different from the reseller account in the API
   * request. * INVALID_ARGUMENT: Required request parameters are missing or
   * invalid. Return value: List of Customers, or an empty list if there are no
   * customers. (customers.listAccountsChannelPartnerLinksCustomers)
   *
   * @param string $parent Required. The resource name of the reseller account to
   * list customers from. Parent uses the format: accounts/{account_id}.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Optional. The maximum number of customers to return.
   * The service may return fewer than this value. If unspecified, returns at most
   * 10 customers. The maximum value is 50.
   * @opt_param string pageToken Optional. A token identifying a page of results
   * other than the first page. Obtained through
   * ListCustomersResponse.next_page_token of the previous
   * CloudChannelService.ListCustomers call.
   * @return GoogleCloudChannelV1ListCustomersResponse
   */
  public function listAccountsChannelPartnerLinksCustomers($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudChannelV1ListCustomersResponse::class);
  }
  /**
   * Updates an existing Customer resource for the reseller or distributor.
   * Possible error codes: * PERMISSION_DENIED: The reseller account making the
   * request is different from the reseller account in the API request. *
   * INVALID_ARGUMENT: Required request parameters are missing or invalid. *
   * NOT_FOUND: No Customer resource found for the name in the request. Return
   * value: The updated Customer resource. (customers.patch)
   *
   * @param string $name Output only. Resource name of the customer. Format:
   * accounts/{account_id}/customers/{customer_id}
   * @param GoogleCloudChannelV1Customer $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The update mask that applies to the resource.
   * Optional.
   * @return GoogleCloudChannelV1Customer
   */
  public function patch($name, GoogleCloudChannelV1Customer $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('patch', [$params], GoogleCloudChannelV1Customer::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountsChannelPartnerLinksCustomers::class, 'Google_Service_Cloudchannel_Resource_AccountsChannelPartnerLinksCustomers');