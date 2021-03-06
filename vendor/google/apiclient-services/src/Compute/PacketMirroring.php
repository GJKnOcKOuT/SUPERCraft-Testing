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

class PacketMirroring extends \Google\Model
{
  protected $collectorIlbType = PacketMirroringForwardingRuleInfo::class;
  protected $collectorIlbDataType = '';
  public $creationTimestamp;
  public $description;
  public $enable;
  protected $filterType = PacketMirroringFilter::class;
  protected $filterDataType = '';
  public $id;
  public $kind;
  protected $mirroredResourcesType = PacketMirroringMirroredResourceInfo::class;
  protected $mirroredResourcesDataType = '';
  public $name;
  protected $networkType = PacketMirroringNetworkInfo::class;
  protected $networkDataType = '';
  public $priority;
  public $region;
  public $selfLink;

  /**
   * @param PacketMirroringForwardingRuleInfo
   */
  public function setCollectorIlb(PacketMirroringForwardingRuleInfo $collectorIlb)
  {
    $this->collectorIlb = $collectorIlb;
  }
  /**
   * @return PacketMirroringForwardingRuleInfo
   */
  public function getCollectorIlb()
  {
    return $this->collectorIlb;
  }
  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }
  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setEnable($enable)
  {
    $this->enable = $enable;
  }
  public function getEnable()
  {
    return $this->enable;
  }
  /**
   * @param PacketMirroringFilter
   */
  public function setFilter(PacketMirroringFilter $filter)
  {
    $this->filter = $filter;
  }
  /**
   * @return PacketMirroringFilter
   */
  public function getFilter()
  {
    return $this->filter;
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
   * @param PacketMirroringMirroredResourceInfo
   */
  public function setMirroredResources(PacketMirroringMirroredResourceInfo $mirroredResources)
  {
    $this->mirroredResources = $mirroredResources;
  }
  /**
   * @return PacketMirroringMirroredResourceInfo
   */
  public function getMirroredResources()
  {
    return $this->mirroredResources;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param PacketMirroringNetworkInfo
   */
  public function setNetwork(PacketMirroringNetworkInfo $network)
  {
    $this->network = $network;
  }
  /**
   * @return PacketMirroringNetworkInfo
   */
  public function getNetwork()
  {
    return $this->network;
  }
  public function setPriority($priority)
  {
    $this->priority = $priority;
  }
  public function getPriority()
  {
    return $this->priority;
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
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PacketMirroring::class, 'Google_Service_Compute_PacketMirroring');
