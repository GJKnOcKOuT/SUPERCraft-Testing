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

namespace Google\Service\AndroidManagement;

class ManagedProperty extends \Google\Collection
{
  protected $collection_key = 'nestedProperties';
  public $defaultValue;
  public $description;
  protected $entriesType = ManagedPropertyEntry::class;
  protected $entriesDataType = 'array';
  public $key;
  protected $nestedPropertiesType = ManagedProperty::class;
  protected $nestedPropertiesDataType = 'array';
  public $title;
  public $type;

  public function setDefaultValue($defaultValue)
  {
    $this->defaultValue = $defaultValue;
  }
  public function getDefaultValue()
  {
    return $this->defaultValue;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param ManagedPropertyEntry[]
   */
  public function setEntries($entries)
  {
    $this->entries = $entries;
  }
  /**
   * @return ManagedPropertyEntry[]
   */
  public function getEntries()
  {
    return $this->entries;
  }
  public function setKey($key)
  {
    $this->key = $key;
  }
  public function getKey()
  {
    return $this->key;
  }
  /**
   * @param ManagedProperty[]
   */
  public function setNestedProperties($nestedProperties)
  {
    $this->nestedProperties = $nestedProperties;
  }
  /**
   * @return ManagedProperty[]
   */
  public function getNestedProperties()
  {
    return $this->nestedProperties;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ManagedProperty::class, 'Google_Service_AndroidManagement_ManagedProperty');
