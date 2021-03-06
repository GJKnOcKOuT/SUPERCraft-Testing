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

namespace Google\Service\Docs;

class ImageProperties extends \Google\Model
{
  public $angle;
  public $brightness;
  public $contentUri;
  public $contrast;
  protected $cropPropertiesType = CropProperties::class;
  protected $cropPropertiesDataType = '';
  public $sourceUri;
  public $transparency;

  public function setAngle($angle)
  {
    $this->angle = $angle;
  }
  public function getAngle()
  {
    return $this->angle;
  }
  public function setBrightness($brightness)
  {
    $this->brightness = $brightness;
  }
  public function getBrightness()
  {
    return $this->brightness;
  }
  public function setContentUri($contentUri)
  {
    $this->contentUri = $contentUri;
  }
  public function getContentUri()
  {
    return $this->contentUri;
  }
  public function setContrast($contrast)
  {
    $this->contrast = $contrast;
  }
  public function getContrast()
  {
    return $this->contrast;
  }
  /**
   * @param CropProperties
   */
  public function setCropProperties(CropProperties $cropProperties)
  {
    $this->cropProperties = $cropProperties;
  }
  /**
   * @return CropProperties
   */
  public function getCropProperties()
  {
    return $this->cropProperties;
  }
  public function setSourceUri($sourceUri)
  {
    $this->sourceUri = $sourceUri;
  }
  public function getSourceUri()
  {
    return $this->sourceUri;
  }
  public function setTransparency($transparency)
  {
    $this->transparency = $transparency;
  }
  public function getTransparency()
  {
    return $this->transparency;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ImageProperties::class, 'Google_Service_Docs_ImageProperties');
