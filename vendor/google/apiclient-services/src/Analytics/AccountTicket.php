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

namespace Google\Service\Analytics;

class AccountTicket extends \Google\Model
{
  protected $accountType = Account::class;
  protected $accountDataType = '';
  public $id;
  public $kind;
  protected $profileType = Profile::class;
  protected $profileDataType = '';
  public $redirectUri;
  protected $webpropertyType = Webproperty::class;
  protected $webpropertyDataType = '';

  /**
   * @param Account
   */
  public function setAccount(Account $account)
  {
    $this->account = $account;
  }
  /**
   * @return Account
   */
  public function getAccount()
  {
    return $this->account;
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
  /**
   * @param Profile
   */
  public function setProfile(Profile $profile)
  {
    $this->profile = $profile;
  }
  /**
   * @return Profile
   */
  public function getProfile()
  {
    return $this->profile;
  }
  public function setRedirectUri($redirectUri)
  {
    $this->redirectUri = $redirectUri;
  }
  public function getRedirectUri()
  {
    return $this->redirectUri;
  }
  /**
   * @param Webproperty
   */
  public function setWebproperty(Webproperty $webproperty)
  {
    $this->webproperty = $webproperty;
  }
  /**
   * @return Webproperty
   */
  public function getWebproperty()
  {
    return $this->webproperty;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AccountTicket::class, 'Google_Service_Analytics_AccountTicket');