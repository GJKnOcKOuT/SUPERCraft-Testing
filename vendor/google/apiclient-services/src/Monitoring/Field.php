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

class Field extends \Google\Collection
{
  protected $collection_key = 'options';
  public $cardinality;
  public $defaultValue;
  public $jsonName;
  public $kind;
  public $name;
  public $number;
  public $oneofIndex;
  protected $optionsType = Option::class;
  protected $optionsDataType = 'array';
  public $packed;
  public $typeUrl;

  public function setCardinality($cardinality)
  {
    $this->cardinality = $cardinality;
  }
  public function getCardinality()
  {
    return $this->cardinality;
  }
  public function setDefaultValue($defaultValue)
  {
    $this->defaultValue = $defaultValue;
  }
  public function getDefaultValue()
  {
    return $this->defaultValue;
  }
  public function setJsonName($jsonName)
  {
    $this->jsonName = $jsonName;
  }
  public function getJsonName()
  {
    return $this->jsonName;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNumber($number)
  {
    $this->number = $number;
  }
  public function getNumber()
  {
    return $this->number;
  }
  public function setOneofIndex($oneofIndex)
  {
    $this->oneofIndex = $oneofIndex;
  }
  public function getOneofIndex()
  {
    return $this->oneofIndex;
  }
  /**
   * @param Option[]
   */
  public function setOptions($options)
  {
    $this->options = $options;
  }
  /**
   * @return Option[]
   */
  public function getOptions()
  {
    return $this->options;
  }
  public function setPacked($packed)
  {
    $this->packed = $packed;
  }
  public function getPacked()
  {
    return $this->packed;
  }
  public function setTypeUrl($typeUrl)
  {
    $this->typeUrl = $typeUrl;
  }
  public function getTypeUrl()
  {
    return $this->typeUrl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Field::class, 'Google_Service_Monitoring_Field');
