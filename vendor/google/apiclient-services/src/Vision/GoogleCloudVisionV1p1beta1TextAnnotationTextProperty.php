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

class GoogleCloudVisionV1p1beta1TextAnnotationTextProperty extends \Google\Collection
{
  protected $collection_key = 'detectedLanguages';
  protected $detectedBreakType = GoogleCloudVisionV1p1beta1TextAnnotationDetectedBreak::class;
  protected $detectedBreakDataType = '';
  protected $detectedLanguagesType = GoogleCloudVisionV1p1beta1TextAnnotationDetectedLanguage::class;
  protected $detectedLanguagesDataType = 'array';

  /**
   * @param GoogleCloudVisionV1p1beta1TextAnnotationDetectedBreak
   */
  public function setDetectedBreak(GoogleCloudVisionV1p1beta1TextAnnotationDetectedBreak $detectedBreak)
  {
    $this->detectedBreak = $detectedBreak;
  }
  /**
   * @return GoogleCloudVisionV1p1beta1TextAnnotationDetectedBreak
   */
  public function getDetectedBreak()
  {
    return $this->detectedBreak;
  }
  /**
   * @param GoogleCloudVisionV1p1beta1TextAnnotationDetectedLanguage[]
   */
  public function setDetectedLanguages($detectedLanguages)
  {
    $this->detectedLanguages = $detectedLanguages;
  }
  /**
   * @return GoogleCloudVisionV1p1beta1TextAnnotationDetectedLanguage[]
   */
  public function getDetectedLanguages()
  {
    return $this->detectedLanguages;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudVisionV1p1beta1TextAnnotationTextProperty::class, 'Google_Service_Vision_GoogleCloudVisionV1p1beta1TextAnnotationTextProperty');
