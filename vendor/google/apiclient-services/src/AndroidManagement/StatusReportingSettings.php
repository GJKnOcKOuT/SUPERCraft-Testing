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

class StatusReportingSettings extends \Google\Model
{
  protected $applicationReportingSettingsType = ApplicationReportingSettings::class;
  protected $applicationReportingSettingsDataType = '';
  public $applicationReportsEnabled;
  public $commonCriteriaModeEnabled;
  public $deviceSettingsEnabled;
  public $displayInfoEnabled;
  public $hardwareStatusEnabled;
  public $memoryInfoEnabled;
  public $networkInfoEnabled;
  public $powerManagementEventsEnabled;
  public $softwareInfoEnabled;
  public $systemPropertiesEnabled;

  /**
   * @param ApplicationReportingSettings
   */
  public function setApplicationReportingSettings(ApplicationReportingSettings $applicationReportingSettings)
  {
    $this->applicationReportingSettings = $applicationReportingSettings;
  }
  /**
   * @return ApplicationReportingSettings
   */
  public function getApplicationReportingSettings()
  {
    return $this->applicationReportingSettings;
  }
  public function setApplicationReportsEnabled($applicationReportsEnabled)
  {
    $this->applicationReportsEnabled = $applicationReportsEnabled;
  }
  public function getApplicationReportsEnabled()
  {
    return $this->applicationReportsEnabled;
  }
  public function setCommonCriteriaModeEnabled($commonCriteriaModeEnabled)
  {
    $this->commonCriteriaModeEnabled = $commonCriteriaModeEnabled;
  }
  public function getCommonCriteriaModeEnabled()
  {
    return $this->commonCriteriaModeEnabled;
  }
  public function setDeviceSettingsEnabled($deviceSettingsEnabled)
  {
    $this->deviceSettingsEnabled = $deviceSettingsEnabled;
  }
  public function getDeviceSettingsEnabled()
  {
    return $this->deviceSettingsEnabled;
  }
  public function setDisplayInfoEnabled($displayInfoEnabled)
  {
    $this->displayInfoEnabled = $displayInfoEnabled;
  }
  public function getDisplayInfoEnabled()
  {
    return $this->displayInfoEnabled;
  }
  public function setHardwareStatusEnabled($hardwareStatusEnabled)
  {
    $this->hardwareStatusEnabled = $hardwareStatusEnabled;
  }
  public function getHardwareStatusEnabled()
  {
    return $this->hardwareStatusEnabled;
  }
  public function setMemoryInfoEnabled($memoryInfoEnabled)
  {
    $this->memoryInfoEnabled = $memoryInfoEnabled;
  }
  public function getMemoryInfoEnabled()
  {
    return $this->memoryInfoEnabled;
  }
  public function setNetworkInfoEnabled($networkInfoEnabled)
  {
    $this->networkInfoEnabled = $networkInfoEnabled;
  }
  public function getNetworkInfoEnabled()
  {
    return $this->networkInfoEnabled;
  }
  public function setPowerManagementEventsEnabled($powerManagementEventsEnabled)
  {
    $this->powerManagementEventsEnabled = $powerManagementEventsEnabled;
  }
  public function getPowerManagementEventsEnabled()
  {
    return $this->powerManagementEventsEnabled;
  }
  public function setSoftwareInfoEnabled($softwareInfoEnabled)
  {
    $this->softwareInfoEnabled = $softwareInfoEnabled;
  }
  public function getSoftwareInfoEnabled()
  {
    return $this->softwareInfoEnabled;
  }
  public function setSystemPropertiesEnabled($systemPropertiesEnabled)
  {
    $this->systemPropertiesEnabled = $systemPropertiesEnabled;
  }
  public function getSystemPropertiesEnabled()
  {
    return $this->systemPropertiesEnabled;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(StatusReportingSettings::class, 'Google_Service_AndroidManagement_StatusReportingSettings');
