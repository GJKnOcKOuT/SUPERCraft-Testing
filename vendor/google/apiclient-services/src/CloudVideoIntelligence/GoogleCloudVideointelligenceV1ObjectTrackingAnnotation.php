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

namespace Google\Service\CloudVideoIntelligence;

class GoogleCloudVideointelligenceV1ObjectTrackingAnnotation extends \Google\Collection
{
  protected $collection_key = 'frames';
  public $confidence;
  protected $entityType = GoogleCloudVideointelligenceV1Entity::class;
  protected $entityDataType = '';
  protected $framesType = GoogleCloudVideointelligenceV1ObjectTrackingFrame::class;
  protected $framesDataType = 'array';
  protected $segmentType = GoogleCloudVideointelligenceV1VideoSegment::class;
  protected $segmentDataType = '';
  public $trackId;
  public $version;

  public function setConfidence($confidence)
  {
    $this->confidence = $confidence;
  }
  public function getConfidence()
  {
    return $this->confidence;
  }
  /**
   * @param GoogleCloudVideointelligenceV1Entity
   */
  public function setEntity(GoogleCloudVideointelligenceV1Entity $entity)
  {
    $this->entity = $entity;
  }
  /**
   * @return GoogleCloudVideointelligenceV1Entity
   */
  public function getEntity()
  {
    return $this->entity;
  }
  /**
   * @param GoogleCloudVideointelligenceV1ObjectTrackingFrame[]
   */
  public function setFrames($frames)
  {
    $this->frames = $frames;
  }
  /**
   * @return GoogleCloudVideointelligenceV1ObjectTrackingFrame[]
   */
  public function getFrames()
  {
    return $this->frames;
  }
  /**
   * @param GoogleCloudVideointelligenceV1VideoSegment
   */
  public function setSegment(GoogleCloudVideointelligenceV1VideoSegment $segment)
  {
    $this->segment = $segment;
  }
  /**
   * @return GoogleCloudVideointelligenceV1VideoSegment
   */
  public function getSegment()
  {
    return $this->segment;
  }
  public function setTrackId($trackId)
  {
    $this->trackId = $trackId;
  }
  public function getTrackId()
  {
    return $this->trackId;
  }
  public function setVersion($version)
  {
    $this->version = $version;
  }
  public function getVersion()
  {
    return $this->version;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudVideointelligenceV1ObjectTrackingAnnotation::class, 'Google_Service_CloudVideoIntelligence_GoogleCloudVideointelligenceV1ObjectTrackingAnnotation');
