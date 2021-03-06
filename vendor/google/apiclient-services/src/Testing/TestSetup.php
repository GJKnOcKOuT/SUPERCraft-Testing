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

namespace Google\Service\Testing;

class TestSetup extends \Google\Collection
{
  protected $collection_key = 'filesToPush';
  protected $accountType = Account::class;
  protected $accountDataType = '';
  protected $additionalApksType = Apk::class;
  protected $additionalApksDataType = 'array';
  public $directoriesToPull;
  public $dontAutograntPermissions;
  protected $environmentVariablesType = EnvironmentVariable::class;
  protected $environmentVariablesDataType = 'array';
  protected $filesToPushType = DeviceFile::class;
  protected $filesToPushDataType = 'array';
  public $networkProfile;
  protected $systraceType = SystraceSetup::class;
  protected $systraceDataType = '';

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
  /**
   * @param Apk[]
   */
  public function setAdditionalApks($additionalApks)
  {
    $this->additionalApks = $additionalApks;
  }
  /**
   * @return Apk[]
   */
  public function getAdditionalApks()
  {
    return $this->additionalApks;
  }
  public function setDirectoriesToPull($directoriesToPull)
  {
    $this->directoriesToPull = $directoriesToPull;
  }
  public function getDirectoriesToPull()
  {
    return $this->directoriesToPull;
  }
  public function setDontAutograntPermissions($dontAutograntPermissions)
  {
    $this->dontAutograntPermissions = $dontAutograntPermissions;
  }
  public function getDontAutograntPermissions()
  {
    return $this->dontAutograntPermissions;
  }
  /**
   * @param EnvironmentVariable[]
   */
  public function setEnvironmentVariables($environmentVariables)
  {
    $this->environmentVariables = $environmentVariables;
  }
  /**
   * @return EnvironmentVariable[]
   */
  public function getEnvironmentVariables()
  {
    return $this->environmentVariables;
  }
  /**
   * @param DeviceFile[]
   */
  public function setFilesToPush($filesToPush)
  {
    $this->filesToPush = $filesToPush;
  }
  /**
   * @return DeviceFile[]
   */
  public function getFilesToPush()
  {
    return $this->filesToPush;
  }
  public function setNetworkProfile($networkProfile)
  {
    $this->networkProfile = $networkProfile;
  }
  public function getNetworkProfile()
  {
    return $this->networkProfile;
  }
  /**
   * @param SystraceSetup
   */
  public function setSystrace(SystraceSetup $systrace)
  {
    $this->systrace = $systrace;
  }
  /**
   * @return SystraceSetup
   */
  public function getSystrace()
  {
    return $this->systrace;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TestSetup::class, 'Google_Service_Testing_TestSetup');
