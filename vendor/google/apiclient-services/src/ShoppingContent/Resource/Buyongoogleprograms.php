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

namespace Google\Service\ShoppingContent\Resource;

use Google\Service\ShoppingContent\ActivateBuyOnGoogleProgramRequest;
use Google\Service\ShoppingContent\BuyOnGoogleProgramStatus;
use Google\Service\ShoppingContent\OnboardBuyOnGoogleProgramRequest;
use Google\Service\ShoppingContent\PauseBuyOnGoogleProgramRequest;
use Google\Service\ShoppingContent\RequestReviewBuyOnGoogleProgramRequest;

/**
 * The "buyongoogleprograms" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google\Service\ShoppingContent(...);
 *   $buyongoogleprograms = $contentService->buyongoogleprograms;
 *  </code>
 */
class Buyongoogleprograms extends \Google\Service\Resource
{
  /**
   * Reactivates the BoG program in your Merchant Center account. Moves the
   * program to the active state when allowed, e.g. when paused. Important: This
   * method is only whitelisted for selected merchants.
   * (buyongoogleprograms.activate)
   *
   * @param string $merchantId Required. The ID of the account.
   * @param string $regionCode The program region code [ISO 3166-1
   * alpha-2](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2). Currently only US
   * is available.
   * @param ActivateBuyOnGoogleProgramRequest $postBody
   * @param array $optParams Optional parameters.
   */
  public function activate($merchantId, $regionCode, ActivateBuyOnGoogleProgramRequest $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'regionCode' => $regionCode, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('activate', [$params]);
  }
  /**
   * Retrieves a status of the BoG program for your Merchant Center account.
   * (buyongoogleprograms.get)
   *
   * @param string $merchantId Required. The ID of the account.
   * @param string $regionCode The Program region code [ISO 3166-1
   * alpha-2](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2). Currently only US
   * is available.
   * @param array $optParams Optional parameters.
   * @return BuyOnGoogleProgramStatus
   */
  public function get($merchantId, $regionCode, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'regionCode' => $regionCode];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], BuyOnGoogleProgramStatus::class);
  }
  /**
   * Onboards the BoG program in your Merchant Center account. By using this
   * method, you agree to the [Terms of Service](https://merchants.google.com/mc/t
   * ermsofservice/transactions/US/latest). Calling this method is only possible
   * if the authenticated account is the same as the merchant id in the request.
   * Calling this method multiple times will only accept Terms of Service if the
   * latest version is not currently signed. (buyongoogleprograms.onboard)
   *
   * @param string $merchantId Required. The ID of the account.
   * @param string $regionCode The program region code [ISO 3166-1
   * alpha-2](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2). Currently only US
   * is available.
   * @param OnboardBuyOnGoogleProgramRequest $postBody
   * @param array $optParams Optional parameters.
   */
  public function onboard($merchantId, $regionCode, OnboardBuyOnGoogleProgramRequest $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'regionCode' => $regionCode, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('onboard', [$params]);
  }
  /**
   * Pauses the BoG program in your Merchant Center account. Important: This
   * method is only whitelisted for selected merchants.
   * (buyongoogleprograms.pause)
   *
   * @param string $merchantId Required. The ID of the account.
   * @param string $regionCode The program region code [ISO 3166-1
   * alpha-2](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2). Currently only US
   * is available.
   * @param PauseBuyOnGoogleProgramRequest $postBody
   * @param array $optParams Optional parameters.
   */
  public function pause($merchantId, $regionCode, PauseBuyOnGoogleProgramRequest $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'regionCode' => $regionCode, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('pause', [$params]);
  }
  /**
   * Requests review and then activates the BoG program in your Merchant Center
   * account for the first time. Moves the program to the REVIEW_PENDING state.
   * Important: This method is only whitelisted for selected merchants.
   * (buyongoogleprograms.requestreview)
   *
   * @param string $merchantId Required. The ID of the account.
   * @param string $regionCode The program region code [ISO 3166-1
   * alpha-2](https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2). Currently only US
   * is available.
   * @param RequestReviewBuyOnGoogleProgramRequest $postBody
   * @param array $optParams Optional parameters.
   */
  public function requestreview($merchantId, $regionCode, RequestReviewBuyOnGoogleProgramRequest $postBody, $optParams = [])
  {
    $params = ['merchantId' => $merchantId, 'regionCode' => $regionCode, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('requestreview', [$params]);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Buyongoogleprograms::class, 'Google_Service_ShoppingContent_Resource_Buyongoogleprograms');