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

namespace Google\Service\CloudRun;

class ServiceStatus extends \Google\Collection
{
  protected $collection_key = 'traffic';
  protected $addressType = Addressable::class;
  protected $addressDataType = '';
  protected $conditionsType = GoogleCloudRunV1Condition::class;
  protected $conditionsDataType = 'array';
  public $latestCreatedRevisionName;
  public $latestReadyRevisionName;
  public $observedGeneration;
  protected $trafficType = TrafficTarget::class;
  protected $trafficDataType = 'array';
  public $url;

  /**
   * @param Addressable
   */
  public function setAddress(Addressable $address)
  {
    $this->address = $address;
  }
  /**
   * @return Addressable
   */
  public function getAddress()
  {
    return $this->address;
  }
  /**
   * @param GoogleCloudRunV1Condition[]
   */
  public function setConditions($conditions)
  {
    $this->conditions = $conditions;
  }
  /**
   * @return GoogleCloudRunV1Condition[]
   */
  public function getConditions()
  {
    return $this->conditions;
  }
  public function setLatestCreatedRevisionName($latestCreatedRevisionName)
  {
    $this->latestCreatedRevisionName = $latestCreatedRevisionName;
  }
  public function getLatestCreatedRevisionName()
  {
    return $this->latestCreatedRevisionName;
  }
  public function setLatestReadyRevisionName($latestReadyRevisionName)
  {
    $this->latestReadyRevisionName = $latestReadyRevisionName;
  }
  public function getLatestReadyRevisionName()
  {
    return $this->latestReadyRevisionName;
  }
  public function setObservedGeneration($observedGeneration)
  {
    $this->observedGeneration = $observedGeneration;
  }
  public function getObservedGeneration()
  {
    return $this->observedGeneration;
  }
  /**
   * @param TrafficTarget[]
   */
  public function setTraffic($traffic)
  {
    $this->traffic = $traffic;
  }
  /**
   * @return TrafficTarget[]
   */
  public function getTraffic()
  {
    return $this->traffic;
  }
  public function setUrl($url)
  {
    $this->url = $url;
  }
  public function getUrl()
  {
    return $this->url;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ServiceStatus::class, 'Google_Service_CloudRun_ServiceStatus');
