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

namespace Google\Service\CloudSearch;

class Item extends \Google\Model
{
  protected $aclType = ItemAcl::class;
  protected $aclDataType = '';
  protected $contentType = ItemContent::class;
  protected $contentDataType = '';
  public $itemType;
  protected $metadataType = ItemMetadata::class;
  protected $metadataDataType = '';
  public $name;
  public $payload;
  public $queue;
  protected $statusType = ItemStatus::class;
  protected $statusDataType = '';
  protected $structuredDataType = ItemStructuredData::class;
  protected $structuredDataDataType = '';
  public $version;

  /**
   * @param ItemAcl
   */
  public function setAcl(ItemAcl $acl)
  {
    $this->acl = $acl;
  }
  /**
   * @return ItemAcl
   */
  public function getAcl()
  {
    return $this->acl;
  }
  /**
   * @param ItemContent
   */
  public function setContent(ItemContent $content)
  {
    $this->content = $content;
  }
  /**
   * @return ItemContent
   */
  public function getContent()
  {
    return $this->content;
  }
  public function setItemType($itemType)
  {
    $this->itemType = $itemType;
  }
  public function getItemType()
  {
    return $this->itemType;
  }
  /**
   * @param ItemMetadata
   */
  public function setMetadata(ItemMetadata $metadata)
  {
    $this->metadata = $metadata;
  }
  /**
   * @return ItemMetadata
   */
  public function getMetadata()
  {
    return $this->metadata;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPayload($payload)
  {
    $this->payload = $payload;
  }
  public function getPayload()
  {
    return $this->payload;
  }
  public function setQueue($queue)
  {
    $this->queue = $queue;
  }
  public function getQueue()
  {
    return $this->queue;
  }
  /**
   * @param ItemStatus
   */
  public function setStatus(ItemStatus $status)
  {
    $this->status = $status;
  }
  /**
   * @return ItemStatus
   */
  public function getStatus()
  {
    return $this->status;
  }
  /**
   * @param ItemStructuredData
   */
  public function setStructuredData(ItemStructuredData $structuredData)
  {
    $this->structuredData = $structuredData;
  }
  /**
   * @return ItemStructuredData
   */
  public function getStructuredData()
  {
    return $this->structuredData;
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
class_alias(Item::class, 'Google_Service_CloudSearch_Item');
