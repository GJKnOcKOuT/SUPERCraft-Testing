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

namespace Google\Service\CloudTalentSolution;

class CommuteFilter extends \Google\Model
{
  public $allowImpreciseAddresses;
  public $commuteMethod;
  protected $departureTimeType = TimeOfDay::class;
  protected $departureTimeDataType = '';
  public $roadTraffic;
  protected $startCoordinatesType = LatLng::class;
  protected $startCoordinatesDataType = '';
  public $travelDuration;

  public function setAllowImpreciseAddresses($allowImpreciseAddresses)
  {
    $this->allowImpreciseAddresses = $allowImpreciseAddresses;
  }
  public function getAllowImpreciseAddresses()
  {
    return $this->allowImpreciseAddresses;
  }
  public function setCommuteMethod($commuteMethod)
  {
    $this->commuteMethod = $commuteMethod;
  }
  public function getCommuteMethod()
  {
    return $this->commuteMethod;
  }
  /**
   * @param TimeOfDay
   */
  public function setDepartureTime(TimeOfDay $departureTime)
  {
    $this->departureTime = $departureTime;
  }
  /**
   * @return TimeOfDay
   */
  public function getDepartureTime()
  {
    return $this->departureTime;
  }
  public function setRoadTraffic($roadTraffic)
  {
    $this->roadTraffic = $roadTraffic;
  }
  public function getRoadTraffic()
  {
    return $this->roadTraffic;
  }
  /**
   * @param LatLng
   */
  public function setStartCoordinates(LatLng $startCoordinates)
  {
    $this->startCoordinates = $startCoordinates;
  }
  /**
   * @return LatLng
   */
  public function getStartCoordinates()
  {
    return $this->startCoordinates;
  }
  public function setTravelDuration($travelDuration)
  {
    $this->travelDuration = $travelDuration;
  }
  public function getTravelDuration()
  {
    return $this->travelDuration;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CommuteFilter::class, 'Google_Service_CloudTalentSolution_CommuteFilter');