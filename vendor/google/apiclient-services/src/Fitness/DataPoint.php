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

namespace Google\Service\Fitness;

class DataPoint extends \Google\Collection
{
  protected $collection_key = 'value';
  public $computationTimeMillis;
  public $dataTypeName;
  public $endTimeNanos;
  public $modifiedTimeMillis;
  public $originDataSourceId;
  public $rawTimestampNanos;
  public $startTimeNanos;
  protected $valueType = Value::class;
  protected $valueDataType = 'array';

  public function setComputationTimeMillis($computationTimeMillis)
  {
    $this->computationTimeMillis = $computationTimeMillis;
  }
  public function getComputationTimeMillis()
  {
    return $this->computationTimeMillis;
  }
  public function setDataTypeName($dataTypeName)
  {
    $this->dataTypeName = $dataTypeName;
  }
  public function getDataTypeName()
  {
    return $this->dataTypeName;
  }
  public function setEndTimeNanos($endTimeNanos)
  {
    $this->endTimeNanos = $endTimeNanos;
  }
  public function getEndTimeNanos()
  {
    return $this->endTimeNanos;
  }
  public function setModifiedTimeMillis($modifiedTimeMillis)
  {
    $this->modifiedTimeMillis = $modifiedTimeMillis;
  }
  public function getModifiedTimeMillis()
  {
    return $this->modifiedTimeMillis;
  }
  public function setOriginDataSourceId($originDataSourceId)
  {
    $this->originDataSourceId = $originDataSourceId;
  }
  public function getOriginDataSourceId()
  {
    return $this->originDataSourceId;
  }
  public function setRawTimestampNanos($rawTimestampNanos)
  {
    $this->rawTimestampNanos = $rawTimestampNanos;
  }
  public function getRawTimestampNanos()
  {
    return $this->rawTimestampNanos;
  }
  public function setStartTimeNanos($startTimeNanos)
  {
    $this->startTimeNanos = $startTimeNanos;
  }
  public function getStartTimeNanos()
  {
    return $this->startTimeNanos;
  }
  /**
   * @param Value[]
   */
  public function setValue($value)
  {
    $this->value = $value;
  }
  /**
   * @return Value[]
   */
  public function getValue()
  {
    return $this->value;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DataPoint::class, 'Google_Service_Fitness_DataPoint');
