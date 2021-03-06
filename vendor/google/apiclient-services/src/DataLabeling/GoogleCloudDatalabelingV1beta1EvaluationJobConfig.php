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

namespace Google\Service\DataLabeling;

class GoogleCloudDatalabelingV1beta1EvaluationJobConfig extends \Google\Model
{
  public $bigqueryImportKeys;
  protected $boundingPolyConfigType = GoogleCloudDatalabelingV1beta1BoundingPolyConfig::class;
  protected $boundingPolyConfigDataType = '';
  protected $evaluationConfigType = GoogleCloudDatalabelingV1beta1EvaluationConfig::class;
  protected $evaluationConfigDataType = '';
  protected $evaluationJobAlertConfigType = GoogleCloudDatalabelingV1beta1EvaluationJobAlertConfig::class;
  protected $evaluationJobAlertConfigDataType = '';
  public $exampleCount;
  public $exampleSamplePercentage;
  protected $humanAnnotationConfigType = GoogleCloudDatalabelingV1beta1HumanAnnotationConfig::class;
  protected $humanAnnotationConfigDataType = '';
  protected $imageClassificationConfigType = GoogleCloudDatalabelingV1beta1ImageClassificationConfig::class;
  protected $imageClassificationConfigDataType = '';
  protected $inputConfigType = GoogleCloudDatalabelingV1beta1InputConfig::class;
  protected $inputConfigDataType = '';
  protected $textClassificationConfigType = GoogleCloudDatalabelingV1beta1TextClassificationConfig::class;
  protected $textClassificationConfigDataType = '';

  public function setBigqueryImportKeys($bigqueryImportKeys)
  {
    $this->bigqueryImportKeys = $bigqueryImportKeys;
  }
  public function getBigqueryImportKeys()
  {
    return $this->bigqueryImportKeys;
  }
  /**
   * @param GoogleCloudDatalabelingV1beta1BoundingPolyConfig
   */
  public function setBoundingPolyConfig(GoogleCloudDatalabelingV1beta1BoundingPolyConfig $boundingPolyConfig)
  {
    $this->boundingPolyConfig = $boundingPolyConfig;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1BoundingPolyConfig
   */
  public function getBoundingPolyConfig()
  {
    return $this->boundingPolyConfig;
  }
  /**
   * @param GoogleCloudDatalabelingV1beta1EvaluationConfig
   */
  public function setEvaluationConfig(GoogleCloudDatalabelingV1beta1EvaluationConfig $evaluationConfig)
  {
    $this->evaluationConfig = $evaluationConfig;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1EvaluationConfig
   */
  public function getEvaluationConfig()
  {
    return $this->evaluationConfig;
  }
  /**
   * @param GoogleCloudDatalabelingV1beta1EvaluationJobAlertConfig
   */
  public function setEvaluationJobAlertConfig(GoogleCloudDatalabelingV1beta1EvaluationJobAlertConfig $evaluationJobAlertConfig)
  {
    $this->evaluationJobAlertConfig = $evaluationJobAlertConfig;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1EvaluationJobAlertConfig
   */
  public function getEvaluationJobAlertConfig()
  {
    return $this->evaluationJobAlertConfig;
  }
  public function setExampleCount($exampleCount)
  {
    $this->exampleCount = $exampleCount;
  }
  public function getExampleCount()
  {
    return $this->exampleCount;
  }
  public function setExampleSamplePercentage($exampleSamplePercentage)
  {
    $this->exampleSamplePercentage = $exampleSamplePercentage;
  }
  public function getExampleSamplePercentage()
  {
    return $this->exampleSamplePercentage;
  }
  /**
   * @param GoogleCloudDatalabelingV1beta1HumanAnnotationConfig
   */
  public function setHumanAnnotationConfig(GoogleCloudDatalabelingV1beta1HumanAnnotationConfig $humanAnnotationConfig)
  {
    $this->humanAnnotationConfig = $humanAnnotationConfig;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1HumanAnnotationConfig
   */
  public function getHumanAnnotationConfig()
  {
    return $this->humanAnnotationConfig;
  }
  /**
   * @param GoogleCloudDatalabelingV1beta1ImageClassificationConfig
   */
  public function setImageClassificationConfig(GoogleCloudDatalabelingV1beta1ImageClassificationConfig $imageClassificationConfig)
  {
    $this->imageClassificationConfig = $imageClassificationConfig;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1ImageClassificationConfig
   */
  public function getImageClassificationConfig()
  {
    return $this->imageClassificationConfig;
  }
  /**
   * @param GoogleCloudDatalabelingV1beta1InputConfig
   */
  public function setInputConfig(GoogleCloudDatalabelingV1beta1InputConfig $inputConfig)
  {
    $this->inputConfig = $inputConfig;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1InputConfig
   */
  public function getInputConfig()
  {
    return $this->inputConfig;
  }
  /**
   * @param GoogleCloudDatalabelingV1beta1TextClassificationConfig
   */
  public function setTextClassificationConfig(GoogleCloudDatalabelingV1beta1TextClassificationConfig $textClassificationConfig)
  {
    $this->textClassificationConfig = $textClassificationConfig;
  }
  /**
   * @return GoogleCloudDatalabelingV1beta1TextClassificationConfig
   */
  public function getTextClassificationConfig()
  {
    return $this->textClassificationConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDatalabelingV1beta1EvaluationJobConfig::class, 'Google_Service_DataLabeling_GoogleCloudDatalabelingV1beta1EvaluationJobConfig');
