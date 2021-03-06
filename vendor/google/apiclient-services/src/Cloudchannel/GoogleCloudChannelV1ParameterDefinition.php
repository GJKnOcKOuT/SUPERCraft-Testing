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

namespace Google\Service\Cloudchannel;

class GoogleCloudChannelV1ParameterDefinition extends \Google\Collection
{
  protected $collection_key = 'allowedValues';
  protected $allowedValuesType = GoogleCloudChannelV1Value::class;
  protected $allowedValuesDataType = 'array';
  protected $maxValueType = GoogleCloudChannelV1Value::class;
  protected $maxValueDataType = '';
  protected $minValueType = GoogleCloudChannelV1Value::class;
  protected $minValueDataType = '';
  public $name;
  public $optional;
  public $parameterType;

  /**
   * @param GoogleCloudChannelV1Value[]
   */
  public function setAllowedValues($allowedValues)
  {
    $this->allowedValues = $allowedValues;
  }
  /**
   * @return GoogleCloudChannelV1Value[]
   */
  public function getAllowedValues()
  {
    return $this->allowedValues;
  }
  /**
   * @param GoogleCloudChannelV1Value
   */
  public function setMaxValue(GoogleCloudChannelV1Value $maxValue)
  {
    $this->maxValue = $maxValue;
  }
  /**
   * @return GoogleCloudChannelV1Value
   */
  public function getMaxValue()
  {
    return $this->maxValue;
  }
  /**
   * @param GoogleCloudChannelV1Value
   */
  public function setMinValue(GoogleCloudChannelV1Value $minValue)
  {
    $this->minValue = $minValue;
  }
  /**
   * @return GoogleCloudChannelV1Value
   */
  public function getMinValue()
  {
    return $this->minValue;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOptional($optional)
  {
    $this->optional = $optional;
  }
  public function getOptional()
  {
    return $this->optional;
  }
  public function setParameterType($parameterType)
  {
    $this->parameterType = $parameterType;
  }
  public function getParameterType()
  {
    return $this->parameterType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudChannelV1ParameterDefinition::class, 'Google_Service_Cloudchannel_GoogleCloudChannelV1ParameterDefinition');
