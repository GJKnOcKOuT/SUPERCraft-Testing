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

namespace Google\Service\Storage;

class Notification extends \Google\Collection
{
  protected $collection_key = 'event_types';
  protected $internal_gapi_mappings = [
        "customAttributes" => "custom_attributes",
        "eventTypes" => "event_types",
        "objectNamePrefix" => "object_name_prefix",
        "payloadFormat" => "payload_format",
  ];
  public $customAttributes;
  public $etag;
  public $eventTypes;
  public $id;
  public $kind;
  public $objectNamePrefix;
  public $payloadFormat;
  public $selfLink;
  public $topic;

  public function setCustomAttributes($customAttributes)
  {
    $this->customAttributes = $customAttributes;
  }
  public function getCustomAttributes()
  {
    return $this->customAttributes;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  public function setEventTypes($eventTypes)
  {
    $this->eventTypes = $eventTypes;
  }
  public function getEventTypes()
  {
    return $this->eventTypes;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setObjectNamePrefix($objectNamePrefix)
  {
    $this->objectNamePrefix = $objectNamePrefix;
  }
  public function getObjectNamePrefix()
  {
    return $this->objectNamePrefix;
  }
  public function setPayloadFormat($payloadFormat)
  {
    $this->payloadFormat = $payloadFormat;
  }
  public function getPayloadFormat()
  {
    return $this->payloadFormat;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setTopic($topic)
  {
    $this->topic = $topic;
  }
  public function getTopic()
  {
    return $this->topic;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Notification::class, 'Google_Service_Storage_Notification');
