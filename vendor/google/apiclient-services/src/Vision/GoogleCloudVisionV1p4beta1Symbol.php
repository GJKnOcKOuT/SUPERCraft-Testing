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

namespace Google\Service\Vision;

class GoogleCloudVisionV1p4beta1Symbol extends \Google\Model
{
  protected $boundingBoxType = GoogleCloudVisionV1p4beta1BoundingPoly::class;
  protected $boundingBoxDataType = '';
  public $confidence;
  protected $propertyType = GoogleCloudVisionV1p4beta1TextAnnotationTextProperty::class;
  protected $propertyDataType = '';
  public $text;

  /**
   * @param GoogleCloudVisionV1p4beta1BoundingPoly
   */
  public function setBoundingBox(GoogleCloudVisionV1p4beta1BoundingPoly $boundingBox)
  {
    $this->boundingBox = $boundingBox;
  }
  /**
   * @return GoogleCloudVisionV1p4beta1BoundingPoly
   */
  public function getBoundingBox()
  {
    return $this->boundingBox;
  }
  public function setConfidence($confidence)
  {
    $this->confidence = $confidence;
  }
  public function getConfidence()
  {
    return $this->confidence;
  }
  /**
   * @param GoogleCloudVisionV1p4beta1TextAnnotationTextProperty
   */
  public function setProperty(GoogleCloudVisionV1p4beta1TextAnnotationTextProperty $property)
  {
    $this->property = $property;
  }
  /**
   * @return GoogleCloudVisionV1p4beta1TextAnnotationTextProperty
   */
  public function getProperty()
  {
    return $this->property;
  }
  public function setText($text)
  {
    $this->text = $text;
  }
  public function getText()
  {
    return $this->text;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudVisionV1p4beta1Symbol::class, 'Google_Service_Vision_GoogleCloudVisionV1p4beta1Symbol');