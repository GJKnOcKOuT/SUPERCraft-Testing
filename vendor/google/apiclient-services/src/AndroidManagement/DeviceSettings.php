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

namespace Google\Service\AndroidManagement;

class DeviceSettings extends \Google\Model
{
  public $adbEnabled;
  public $developmentSettingsEnabled;
  public $encryptionStatus;
  public $isDeviceSecure;
  public $isEncrypted;
  public $unknownSourcesEnabled;
  public $verifyAppsEnabled;

  public function setAdbEnabled($adbEnabled)
  {
    $this->adbEnabled = $adbEnabled;
  }
  public function getAdbEnabled()
  {
    return $this->adbEnabled;
  }
  public function setDevelopmentSettingsEnabled($developmentSettingsEnabled)
  {
    $this->developmentSettingsEnabled = $developmentSettingsEnabled;
  }
  public function getDevelopmentSettingsEnabled()
  {
    return $this->developmentSettingsEnabled;
  }
  public function setEncryptionStatus($encryptionStatus)
  {
    $this->encryptionStatus = $encryptionStatus;
  }
  public function getEncryptionStatus()
  {
    return $this->encryptionStatus;
  }
  public function setIsDeviceSecure($isDeviceSecure)
  {
    $this->isDeviceSecure = $isDeviceSecure;
  }
  public function getIsDeviceSecure()
  {
    return $this->isDeviceSecure;
  }
  public function setIsEncrypted($isEncrypted)
  {
    $this->isEncrypted = $isEncrypted;
  }
  public function getIsEncrypted()
  {
    return $this->isEncrypted;
  }
  public function setUnknownSourcesEnabled($unknownSourcesEnabled)
  {
    $this->unknownSourcesEnabled = $unknownSourcesEnabled;
  }
  public function getUnknownSourcesEnabled()
  {
    return $this->unknownSourcesEnabled;
  }
  public function setVerifyAppsEnabled($verifyAppsEnabled)
  {
    $this->verifyAppsEnabled = $verifyAppsEnabled;
  }
  public function getVerifyAppsEnabled()
  {
    return $this->verifyAppsEnabled;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DeviceSettings::class, 'Google_Service_AndroidManagement_DeviceSettings');
