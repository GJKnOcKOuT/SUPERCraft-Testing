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

class RouterStatus extends \Google\Collection
{
  protected $collection_key = 'natStatus';
  protected $bestRoutesType = Route::class;
  protected $bestRoutesDataType = 'array';
  protected $bestRoutesForRouterType = Route::class;
  protected $bestRoutesForRouterDataType = 'array';
  protected $bgpPeerStatusType = RouterStatusBgpPeerStatus::class;
  protected $bgpPeerStatusDataType = 'array';
  protected $natStatusType = RouterStatusNatStatus::class;
  protected $natStatusDataType = 'array';
  public $network;

  /**
   * @param Route[]
   */
  public function setBestRoutes($bestRoutes)
  {
    $this->bestRoutes = $bestRoutes;
  }
  /**
   * @return Route[]
   */
  public function getBestRoutes()
  {
    return $this->bestRoutes;
  }
  /**
   * @param Route[]
   */
  public function setBestRoutesForRouter($bestRoutesForRouter)
  {
    $this->bestRoutesForRouter = $bestRoutesForRouter;
  }
  /**
   * @return Route[]
   */
  public function getBestRoutesForRouter()
  {
    return $this->bestRoutesForRouter;
  }
  /**
   * @param RouterStatusBgpPeerStatus[]
   */
  public function setBgpPeerStatus($bgpPeerStatus)
  {
    $this->bgpPeerStatus = $bgpPeerStatus;
  }
  /**
   * @return RouterStatusBgpPeerStatus[]
   */
  public function getBgpPeerStatus()
  {
    return $this->bgpPeerStatus;
  }
  /**
   * @param RouterStatusNatStatus[]
   */
  public function setNatStatus($natStatus)
  {
    $this->natStatus = $natStatus;
  }
  /**
   * @return RouterStatusNatStatus[]
   */
  public function getNatStatus()
  {
    return $this->natStatus;
  }
  public function setNetwork($network)
  {
    $this->network = $network;
  }
  public function getNetwork()
  {
    return $this->network;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RouterStatus::class, 'Google_Service_Compute_RouterStatus');
