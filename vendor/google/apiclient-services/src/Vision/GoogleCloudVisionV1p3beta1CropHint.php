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

class GoogleCloudVisionV1p3beta1CropHint extends \Google\Model
{
  protected $boundingPolyType = GoogleCloudVisionV1p3beta1BoundingPoly::class;
  protected $boundingPolyDataType = '';
  public $confidence;
  public $importanceFraction;

  /**
   * @param GoogleCloudVisionV1p3beta1BoundingPoly
   */
  public function setBoundingPoly(GoogleCloudVisionV1p3beta1BoundingPoly $boundingPoly)
  {
    $this->boundingPoly = $boundingPoly;
  }
  /**
   * @return GoogleCloudVisionV1p3beta1BoundingPoly
   */
  public function getBoundingPoly()
  {
    return $this->boundingPoly;
  }
  public function setConfidence($confidence)
  {
    $this->confidence = $confidence;
  }
  public function getConfidence()
  {
    return $this->confidence;
  }
  public function setImportanceFraction($importanceFraction)
  {
    $this->importanceFraction = $importanceFraction;
  }
  public function getImportanceFraction()
  {
    return $this->importanceFraction;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudVisionV1p3beta1CropHint::class, 'Google_Service_Vision_GoogleCloudVisionV1p3beta1CropHint');