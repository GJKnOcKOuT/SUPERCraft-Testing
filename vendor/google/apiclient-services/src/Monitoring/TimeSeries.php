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

namespace Google\Service\Monitoring;

class TimeSeries extends \Google\Collection
{
  protected $collection_key = 'points';
  protected $metadataType = MonitoredResourceMetadata::class;
  protected $metadataDataType = '';
  protected $metricType = Metric::class;
  protected $metricDataType = '';
  public $metricKind;
  protected $pointsType = Point::class;
  protected $pointsDataType = 'array';
  protected $resourceType = MonitoredResource::class;
  protected $resourceDataType = '';
  public $unit;
  public $valueType;

  /**
   * @param MonitoredResourceMetadata
   */
  public function setMetadata(MonitoredResourceMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return MonitoredResourceMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param Metric
   */
  public function setMetric(Metric $metric)
  {
    $this->metric = $metric;
  }
  /**
   * @return Metric
   */
  public function getMetric()
  {
    return $this->metric;
  }
  public function setMetricKind($metricKind)
  {
    $this->metricKind = $metricKind;
  }
  public function getMetricKind()
  {
    return $this->metricKind;
  }
  /**
   * @param Point[]
   */
  public function setPoints($points)
  {
    $this->points = $points;
  }
  /**
   * @return Point[]
   */
  public function getPoints()
  {
    return $this->points;
  }
  /**
   * @param MonitoredResource
   */
  public function setResource(MonitoredResource $resource)
  {
    $this->resource = $resource;
  }
  /**
   * @return MonitoredResource
   */
  public function getResource()
  {
    return $this->resource;
  }
  public function setUnit($unit)
  {
    $this->unit = $unit;
  }
  public function getUnit()
  {
    return $this->unit;
  }
  public function setValueType($valueType)
  {
    $this->valueType = $valueType;
  }
  public function getValueType()
  {
    return $this->valueType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TimeSeries::class, 'Google_Service_Monitoring_TimeSeries');
