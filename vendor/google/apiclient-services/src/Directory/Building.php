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

namespace Google\Service\Directory;

class Building extends \Google\Collection
{
  protected $collection_key = 'floorNames';
  protected $addressType = BuildingAddress::class;
  protected $addressDataType = '';
  public $buildingId;
  public $buildingName;
  protected $coordinatesType = BuildingCoordinates::class;
  protected $coordinatesDataType = '';
  public $description;
  public $etags;
  public $floorNames;
  public $kind;

  /**
   * @param BuildingAddress
   */
  public function setAddress(BuildingAddress $address)
  {
    $this->address = $address;
  }
  /**
   * @return BuildingAddress
   */
  public function getAddress()
  {
    return $this->address;
  }
  public function setBuildingId($buildingId)
  {
    $this->buildingId = $buildingId;
  }
  public function getBuildingId()
  {
    return $this->buildingId;
  }
  public function setBuildingName($buildingName)
  {
    $this->buildingName = $buildingName;
  }
  public function getBuildingName()
  {
    return $this->buildingName;
  }
  /**
   * @param BuildingCoordinates
   */
  public function setCoordinates(BuildingCoordinates $coordinates)
  {
    $this->coordinates = $coordinates;
  }
  /**
   * @return BuildingCoordinates
   */
  public function getCoordinates()
  {
    return $this->coordinates;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setEtags($etags)
  {
    $this->etags = $etags;
  }
  public function getEtags()
  {
    return $this->etags;
  }
  public function setFloorNames($floorNames)
  {
    $this->floorNames = $floorNames;
  }
  public function getFloorNames()
  {
    return $this->floorNames;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Building::class, 'Google_Service_Directory_Building');
