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

namespace Google\Service\Appengine;

class Instance extends \Google\Model
{
  public $appEngineRelease;
  public $availability;
  public $averageLatency;
  public $errors;
  public $id;
  public $memoryUsage;
  public $name;
  public $qps;
  public $requests;
  public $startTime;
  public $vmDebugEnabled;
  public $vmId;
  public $vmIp;
  public $vmLiveness;
  public $vmName;
  public $vmStatus;
  public $vmZoneName;

  public function setAppEngineRelease($appEngineRelease)
  {
    $this->appEngineRelease = $appEngineRelease;
  }
  public function getAppEngineRelease()
  {
    return $this->appEngineRelease;
  }
  public function setAvailability($availability)
  {
    $this->availability = $availability;
  }
  public function getAvailability()
  {
    return $this->availability;
  }
  public function setAverageLatency($averageLatency)
  {
    $this->averageLatency = $averageLatency;
  }
  public function getAverageLatency()
  {
    return $this->averageLatency;
  }
  public function setErrors($errors)
  {
    $this->errors = $errors;
  }
  public function getErrors()
  {
    return $this->errors;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setMemoryUsage($memoryUsage)
  {
    $this->memoryUsage = $memoryUsage;
  }
  public function getMemoryUsage()
  {
    return $this->memoryUsage;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setQps($qps)
  {
    $this->qps = $qps;
  }
  public function getQps()
  {
    return $this->qps;
  }
  public function setRequests($requests)
  {
    $this->requests = $requests;
  }
  public function getRequests()
  {
    return $this->requests;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  public function setVmDebugEnabled($vmDebugEnabled)
  {
    $this->vmDebugEnabled = $vmDebugEnabled;
  }
  public function getVmDebugEnabled()
  {
    return $this->vmDebugEnabled;
  }
  public function setVmId($vmId)
  {
    $this->vmId = $vmId;
  }
  public function getVmId()
  {
    return $this->vmId;
  }
  public function setVmIp($vmIp)
  {
    $this->vmIp = $vmIp;
  }
  public function getVmIp()
  {
    return $this->vmIp;
  }
  public function setVmLiveness($vmLiveness)
  {
    $this->vmLiveness = $vmLiveness;
  }
  public function getVmLiveness()
  {
    return $this->vmLiveness;
  }
  public function setVmName($vmName)
  {
    $this->vmName = $vmName;
  }
  public function getVmName()
  {
    return $this->vmName;
  }
  public function setVmStatus($vmStatus)
  {
    $this->vmStatus = $vmStatus;
  }
  public function getVmStatus()
  {
    return $this->vmStatus;
  }
  public function setVmZoneName($vmZoneName)
  {
    $this->vmZoneName = $vmZoneName;
  }
  public function getVmZoneName()
  {
    return $this->vmZoneName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Instance::class, 'Google_Service_Appengine_Instance');
