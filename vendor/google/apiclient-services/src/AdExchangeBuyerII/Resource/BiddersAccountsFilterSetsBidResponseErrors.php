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

namespace Google\Service\AdExchangeBuyerII\Resource;

use Google\Service\AdExchangeBuyerII\ListBidResponseErrorsResponse;

/**
 * The "bidResponseErrors" collection of methods.
 * Typical usage is:
 *  <code>
 *   $adexchangebuyer2Service = new Google\Service\AdExchangeBuyerII(...);
 *   $bidResponseErrors = $adexchangebuyer2Service->bidResponseErrors;
 *  </code>
 */
class BiddersAccountsFilterSetsBidResponseErrors extends \Google\Service\Resource
{
  /**
   * List all errors that occurred in bid responses, with the number of bid
   * responses affected for each reason.
   * (bidResponseErrors.listBiddersAccountsFilterSetsBidResponseErrors)
   *
   * @param string $filterSetName Name of the filter set that should be applied to
   * the requested metrics. For example: - For a bidder-level filter set for
   * bidder 123: `bidders/123/filterSets/abc` - For an account-level filter set
   * for the buyer account representing bidder 123:
   * `bidders/123/accounts/123/filterSets/abc` - For an account-level filter set
   * for the child seat buyer account 456 whose bidder is 123:
   * `bidders/123/accounts/456/filterSets/abc`
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Requested page size. The server may return fewer
   * results than requested. If unspecified, the server will pick an appropriate
   * default.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return. Typically, this is the value of
   * ListBidResponseErrorsResponse.nextPageToken returned from the previous call
   * to the bidResponseErrors.list method.
   * @return ListBidResponseErrorsResponse
   */
  public function listBiddersAccountsFilterSetsBidResponseErrors($filterSetName, $optParams = [])
  {
    $params = ['filterSetName' => $filterSetName];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListBidResponseErrorsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BiddersAccountsFilterSetsBidResponseErrors::class, 'Google_Service_AdExchangeBuyerII_Resource_BiddersAccountsFilterSetsBidResponseErrors');
