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

namespace Google\Service\TagManager;

class UserPermission extends \Google\Collection
{
  protected $collection_key = 'containerAccess';
  protected $accountAccessType = AccountAccess::class;
  protected $accountAccessDataType = '';
  public $accountId;
  protected $containerAccessType = ContainerAccess::class;
  protected $containerAccessDataType = 'array';
  public $emailAddress;
  public $path;

  /**
   * @param AccountAccess
   */
  public function setAccountAccess(AccountAccess $accountAccess)
  {
    $this->accountAccess = $accountAccess;
  }
  /**
   * @return AccountAccess
   */
  public function getAccountAccess()
  {
    return $this->accountAccess;
  }
  public function setAccountId($accountId)
  {
    $this->accountId = $accountId;
  }
  public function getAccountId()
  {
    return $this->accountId;
  }
  /**
   * @param ContainerAccess[]
   */
  public function setContainerAccess($containerAccess)
  {
    $this->containerAccess = $containerAccess;
  }
  /**
   * @return ContainerAccess[]
   */
  public function getContainerAccess()
  {
    return $this->containerAccess;
  }
  public function setEmailAddress($emailAddress)
  {
    $this->emailAddress = $emailAddress;
  }
  public function getEmailAddress()
  {
    return $this->emailAddress;
  }
  public function setPath($path)
  {
    $this->path = $path;
  }
  public function getPath()
  {
    return $this->path;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UserPermission::class, 'Google_Service_TagManager_UserPermission');
