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

namespace Google\Service\Compute;

class Zone extends \Google\Collection
{
  protected $collection_key = 'availableCpuPlatforms';
  public $availableCpuPlatforms;
  public $creationTimestamp;
  protected $deprecatedType = DeprecationStatus::class;
  protected $deprecatedDataType = '';
  public $description;
  public $id;
  public $kind;
  public $name;
  public $region;
  public $selfLink;
  public $status;
  public $supportsPzs;

  public function setAvailableCpuPlatforms($availableCpuPlatforms)
  {
    $this->availableCpuPlatforms = $availableCpuPlatforms;
  }
  public function getAvailableCpuPlatforms()
  {
    return $this->availableCpuPlatforms;
  }
  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }
  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
  }
  /**
   * @param DeprecationStatus
   */
  public function setDeprecated(DeprecationStatus $deprecated)
  {
    $this->deprecated = $deprecated;
  }
  /**
   * @return DeprecationStatus
   */
  public function getDeprecated()
  {
    return $this->deprecated;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
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
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setRegion($region)
  {
    $this->region = $region;
  }
  public function getRegion()
  {
    return $this->region;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setSupportsPzs($supportsPzs)
  {
    $this->supportsPzs = $supportsPzs;
  }
  public function getSupportsPzs()
  {
    return $this->supportsPzs;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Zone::class, 'Google_Service_Compute_Zone');
