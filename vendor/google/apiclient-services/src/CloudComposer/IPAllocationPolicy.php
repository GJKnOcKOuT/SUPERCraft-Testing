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

namespace Google\Service\CloudComposer;

class IPAllocationPolicy extends \Google\Model
{
  public $clusterIpv4CidrBlock;
  public $clusterSecondaryRangeName;
  public $servicesIpv4CidrBlock;
  public $servicesSecondaryRangeName;
  public $useIpAliases;

  public function setClusterIpv4CidrBlock($clusterIpv4CidrBlock)
  {
    $this->clusterIpv4CidrBlock = $clusterIpv4CidrBlock;
  }
  public function getClusterIpv4CidrBlock()
  {
    return $this->clusterIpv4CidrBlock;
  }
  public function setClusterSecondaryRangeName($clusterSecondaryRangeName)
  {
    $this->clusterSecondaryRangeName = $clusterSecondaryRangeName;
  }
  public function getClusterSecondaryRangeName()
  {
    return $this->clusterSecondaryRangeName;
  }
  public function setServicesIpv4CidrBlock($servicesIpv4CidrBlock)
  {
    $this->servicesIpv4CidrBlock = $servicesIpv4CidrBlock;
  }
  public function getServicesIpv4CidrBlock()
  {
    return $this->servicesIpv4CidrBlock;
  }
  public function setServicesSecondaryRangeName($servicesSecondaryRangeName)
  {
    $this->servicesSecondaryRangeName = $servicesSecondaryRangeName;
  }
  public function getServicesSecondaryRangeName()
  {
    return $this->servicesSecondaryRangeName;
  }
  public function setUseIpAliases($useIpAliases)
  {
    $this->useIpAliases = $useIpAliases;
  }
  public function getUseIpAliases()
  {
    return $this->useIpAliases;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IPAllocationPolicy::class, 'Google_Service_CloudComposer_IPAllocationPolicy');
