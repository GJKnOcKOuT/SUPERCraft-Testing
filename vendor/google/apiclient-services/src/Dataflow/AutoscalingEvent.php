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

namespace Google\Service\Dataflow;

class AutoscalingEvent extends \Google\Model
{
  public $currentNumWorkers;
  protected $descriptionType = StructuredMessage::class;
  protected $descriptionDataType = '';
  public $eventType;
  public $targetNumWorkers;
  public $time;
  public $workerPool;

  public function setCurrentNumWorkers($currentNumWorkers)
  {
    $this->currentNumWorkers = $currentNumWorkers;
  }
  public function getCurrentNumWorkers()
  {
    return $this->currentNumWorkers;
  }
  /**
   * @param StructuredMessage
   */
  public function setDescription(StructuredMessage $description)
  {
    $this->description = $description;
  }
  /**
   * @return StructuredMessage
   */
  public function getDescription()
  {
    return $this->description;
  }
  public function setEventType($eventType)
  {
    $this->eventType = $eventType;
  }
  public function getEventType()
  {
    return $this->eventType;
  }
  public function setTargetNumWorkers($targetNumWorkers)
  {
    $this->targetNumWorkers = $targetNumWorkers;
  }
  public function getTargetNumWorkers()
  {
    return $this->targetNumWorkers;
  }
  public function setTime($time)
  {
    $this->time = $time;
  }
  public function getTime()
  {
    return $this->time;
  }
  public function setWorkerPool($workerPool)
  {
    $this->workerPool = $workerPool;
  }
  public function getWorkerPool()
  {
    return $this->workerPool;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AutoscalingEvent::class, 'Google_Service_Dataflow_AutoscalingEvent');
