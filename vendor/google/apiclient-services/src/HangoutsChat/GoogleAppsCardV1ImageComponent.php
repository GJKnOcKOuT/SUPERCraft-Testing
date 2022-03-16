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

namespace Google\Service\HangoutsChat;

class GoogleAppsCardV1ImageComponent extends \Google\Model
{
  public $altText;
  protected $borderStyleType = GoogleAppsCardV1BorderStyle::class;
  protected $borderStyleDataType = '';
  protected $cropStyleType = GoogleAppsCardV1ImageCropStyle::class;
  protected $cropStyleDataType = '';
  public $imageUri;

  public function setAltText($altText)
  {
    $this->altText = $altText;
  }
  public function getAltText()
  {
    return $this->altText;
  }
  /**
   * @param GoogleAppsCardV1BorderStyle
   */
  public function setBorderStyle(GoogleAppsCardV1BorderStyle $borderStyle)
  {
    $this->borderStyle = $borderStyle;
  }
  /**
   * @return GoogleAppsCardV1BorderStyle
   */
  public function getBorderStyle()
  {
    return $this->borderStyle;
  }
  /**
   * @param GoogleAppsCardV1ImageCropStyle
   */
  public function setCropStyle(GoogleAppsCardV1ImageCropStyle $cropStyle)
  {
    $this->cropStyle = $cropStyle;
  }
  /**
   * @return GoogleAppsCardV1ImageCropStyle
   */
  public function getCropStyle()
  {
    return $this->cropStyle;
  }
  public function setImageUri($imageUri)
  {
    $this->imageUri = $imageUri;
  }
  public function getImageUri()
  {
    return $this->imageUri;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleAppsCardV1ImageComponent::class, 'Google_Service_HangoutsChat_GoogleAppsCardV1ImageComponent');
