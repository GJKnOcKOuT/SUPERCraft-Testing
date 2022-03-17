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

namespace Google\Service\AdSenseHost;

class AssociationSession extends \Google\Collection
{
  protected $collection_key = 'productCodes';
  public $accountId;
  public $id;
  public $kind;
  public $productCodes;
  public $redirectUrl;
  public $status;
  public $userLocale;
  public $websiteLocale;
  public $websiteUrl;

  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  public function getAccountId()
  {
    return $this->accountId;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setProductCodes($productCodes)
  {
    $this->productCodes = $productCodes;
  }
  public function getProductCodes()
  {
    return $this->productCodes;
  }
  public function setRedirectUrl($redirectUrl)
  {
    $this->redirectUrl = $redirectUrl;
  }
  public function getRedirectUrl()
  {
    return $this->redirectUrl;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setUserLocale($userLocale)
  {
    $this->userLocale = $userLocale;
  }
  public function getUserLocale()
  {
    return $this->userLocale;
  }
  public function setWebsiteLocale($websiteLocale)
  {
    $this->websiteLocale = $websiteLocale;
  }
  public function getWebsiteLocale()
  {
    return $this->websiteLocale;
  }
  public function setWebsiteUrl($websiteUrl)
  {
    $this->websiteUrl = $websiteUrl;
  }
  public function getWebsiteUrl()
  {
    return $this->websiteUrl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AssociationSession::class, 'Google_Service_AdSenseHost_AssociationSession');