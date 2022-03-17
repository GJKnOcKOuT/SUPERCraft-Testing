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

namespace Google\Service\ChromePolicy;

class GoogleChromePolicyV1PolicySchemaFieldDescription extends \Google\Collection
{
  protected $collection_key = 'nestedFieldDescriptions';
  public $description;
  public $field;
  public $inputConstraint;
  protected $knownValueDescriptionsType = GoogleChromePolicyV1PolicySchemaFieldKnownValueDescription::class;
  protected $knownValueDescriptionsDataType = 'array';
  protected $nestedFieldDescriptionsType = GoogleChromePolicyV1PolicySchemaFieldDescription::class;
  protected $nestedFieldDescriptionsDataType = 'array';

  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setField($field)
  {
    $this->field = $field;
  }
  public function getField()
  {
    return $this->field;
  }
  public function setInputConstraint($inputConstraint)
  {
    $this->inputConstraint = $inputConstraint;
  }
  public function getInputConstraint()
  {
    return $this->inputConstraint;
  }
  /**
   * @param GoogleChromePolicyV1PolicySchemaFieldKnownValueDescription[]
   */
  public function setKnownValueDescriptions($knownValueDescriptions)
  {
    $this->knownValueDescriptions = $knownValueDescriptions;
  }
  /**
   * @return GoogleChromePolicyV1PolicySchemaFieldKnownValueDescription[]
   */
  public function getKnownValueDescriptions()
  {
    return $this->knownValueDescriptions;
  }
  /**
   * @param GoogleChromePolicyV1PolicySchemaFieldDescription[]
   */
  public function setNestedFieldDescriptions($nestedFieldDescriptions)
  {
    $this->nestedFieldDescriptions = $nestedFieldDescriptions;
  }
  /**
   * @return GoogleChromePolicyV1PolicySchemaFieldDescription[]
   */
  public function getNestedFieldDescriptions()
  {
    return $this->nestedFieldDescriptions;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleChromePolicyV1PolicySchemaFieldDescription::class, 'Google_Service_ChromePolicy_GoogleChromePolicyV1PolicySchemaFieldDescription');