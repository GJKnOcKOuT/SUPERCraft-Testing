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

namespace Google\Service\Books;

class GeolayerdataGeo extends \Google\Collection
{
  protected $collection_key = 'boundary';
  public $boundary;
  public $cachePolicy;
  public $countryCode;
  public $latitude;
  public $longitude;
  public $mapType;
  protected $viewportType = GeolayerdataGeoViewport::class;
  protected $viewportDataType = '';
  public $zoom;

  public function setBoundary($boundary)
  {
    $this->boundary = $boundary;
  }
  public function getBoundary()
  {
    return $this->boundary;
  }
  public function setCachePolicy($cachePolicy)
  {
    $this->cachePolicy = $cachePolicy;
  }
  public function getCachePolicy()
  {
    return $this->cachePolicy;
  }
  public function setCountryCode($countryCode)
  {
    $this->countryCode = $countryCode;
  }
  public function getCountryCode()
  {
    return $this->countryCode;
  }
  public function setLatitude($latitude)
  {
    $this->latitude = $latitude;
  }
  public function getLatitude()
  {
    return $this->latitude;
  }
  public function setLongitude($longitude)
  {
    $this->longitude = $longitude;
  }
  public function getLongitude()
  {
    return $this->longitude;
  }
  public function setMapType($mapType)
  {
    $this->mapType = $mapType;
  }
  public function getMapType()
  {
    return $this->mapType;
  }
  /**
   * @param GeolayerdataGeoViewport
   */
  public function setViewport(GeolayerdataGeoViewport $viewport)
  {
    $this->viewport = $viewport;
  }
  /**
   * @return GeolayerdataGeoViewport
   */
  public function getViewport()
  {
    return $this->viewport;
  }
  public function setZoom($zoom)
  {
    $this->zoom = $zoom;
  }
  public function getZoom()
  {
    return $this->zoom;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeolayerdataGeo::class, 'Google_Service_Books_GeolayerdataGeo');
