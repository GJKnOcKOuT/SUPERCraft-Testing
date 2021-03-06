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

namespace Google\Service\AdExchangeBuyerII;

class ServingContext extends \Google\Model
{
  public $all;
  protected $appTypeType = AppContext::class;
  protected $appTypeDataType = '';
  protected $auctionTypeType = AuctionContext::class;
  protected $auctionTypeDataType = '';
  protected $locationType = LocationContext::class;
  protected $locationDataType = '';
  protected $platformType = PlatformContext::class;
  protected $platformDataType = '';
  protected $securityTypeType = SecurityContext::class;
  protected $securityTypeDataType = '';

  public function setAll($all)
  {
    $this->all = $all;
  }
  public function getAll()
  {
    return $this->all;
  }
  /**
   * @param AppContext
   */
  public function setAppType(AppContext $appType)
  {
    $this->appType = $appType;
  }
  /**
   * @return AppContext
   */
  public function getAppType()
  {
    return $this->appType;
  }
  /**
   * @param AuctionContext
   */
  public function setAuctionType(AuctionContext $auctionType)
  {
    $this->auctionType = $auctionType;
  }
  /**
   * @return AuctionContext
   */
  public function getAuctionType()
  {
    return $this->auctionType;
  }
  /**
   * @param LocationContext
   */
  public function setLocation(LocationContext $location)
  {
    $this->location = $location;
  }
  /**
   * @return LocationContext
   */
  public function getLocation()
  {
    return $this->location;
  }
  /**
   * @param PlatformContext
   */
  public function setPlatform(PlatformContext $platform)
  {
    $this->platform = $platform;
  }
  /**
   * @return PlatformContext
   */
  public function getPlatform()
  {
    return $this->platform;
  }
  /**
   * @param SecurityContext
   */
  public function setSecurityType(SecurityContext $securityType)
  {
    $this->securityType = $securityType;
  }
  /**
   * @return SecurityContext
   */
  public function getSecurityType()
  {
    return $this->securityType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ServingContext::class, 'Google_Service_AdExchangeBuyerII_ServingContext');
