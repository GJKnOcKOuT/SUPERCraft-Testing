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

class CollectdPayload extends \Google\Collection
{
  protected $collection_key = 'values';
  public $endTime;
  protected $metadataType = TypedValue::class;
  protected $metadataDataType = 'map';
  public $plugin;
  public $pluginInstance;
  public $startTime;
  public $type;
  public $typeInstance;
  protected $valuesType = CollectdValue::class;
  protected $valuesDataType = 'array';

  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  /**
   * @param TypedValue[]
   */
  public function setMetadata($metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return TypedValue[]
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setPlugin($plugin)
  {
    $this->plugin = $plugin;
  }
  public function getPlugin()
  {
    return $this->plugin;
  }
  public function setPluginInstance($pluginInstance)
  {
    $this->pluginInstance = $pluginInstance;
  }
  public function getPluginInstance()
  {
    return $this->pluginInstance;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
  public function setTypeInstance($typeInstance)
  {
    $this->typeInstance = $typeInstance;
  }
  public function getTypeInstance()
  {
    return $this->typeInstance;
  }
  /**
   * @param CollectdValue[]
   */
  public function setValues($values)
  {
    $this->values = $values;
  }
  /**
   * @return CollectdValue[]
   */
  public function getValues()
  {
    return $this->values;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CollectdPayload::class, 'Google_Service_Monitoring_CollectdPayload');
