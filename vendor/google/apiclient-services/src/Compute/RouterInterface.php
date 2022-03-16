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

class RouterInterface extends \Google\Model
{
  public $ipRange;
  public $linkedInterconnectAttachment;
  public $linkedVpnTunnel;
  public $managementType;
  public $name;

  public function setIpRange($ipRange)
  {
    $this->ipRange = $ipRange;
  }
  public function getIpRange()
  {
    return $this->ipRange;
  }
  public function setLinkedInterconnectAttachment($linkedInterconnectAttachment)
  {
    $this->linkedInterconnectAttachment = $linkedInterconnectAttachment;
  }
  public function getLinkedInterconnectAttachment()
  {
    return $this->linkedInterconnectAttachment;
  }
  public function setLinkedVpnTunnel($linkedVpnTunnel)
  {
    $this->linkedVpnTunnel = $linkedVpnTunnel;
  }
  public function getLinkedVpnTunnel()
  {
    return $this->linkedVpnTunnel;
  }
  public function setManagementType($managementType)
  {
    $this->managementType = $managementType;
  }
  public function getManagementType()
  {
    return $this->managementType;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RouterInterface::class, 'Google_Service_Compute_RouterInterface');
