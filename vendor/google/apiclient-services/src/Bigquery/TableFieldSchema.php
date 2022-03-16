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

namespace Google\Service\Bigquery;

class TableFieldSchema extends \Google\Collection
{
  protected $collection_key = 'fields';
  protected $categoriesType = TableFieldSchemaCategories::class;
  protected $categoriesDataType = '';
  public $description;
  protected $fieldsType = TableFieldSchema::class;
  protected $fieldsDataType = 'array';
  public $maxLength;
  public $mode;
  public $name;
  protected $policyTagsType = TableFieldSchemaPolicyTags::class;
  protected $policyTagsDataType = '';
  public $precision;
  public $scale;
  public $type;

  /**
   * @param TableFieldSchemaCategories
   */
  public function setCategories(TableFieldSchemaCategories $categories)
  {
    $this->categories = $categories;
  }
  /**
   * @return TableFieldSchemaCategories
   */
  public function getCategories()
  {
    return $this->categories;
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
   * @param TableFieldSchema[]
   */
  public function setFields($fields)
  {
    $this->fields = $fields;
  }
  /**
   * @return TableFieldSchema[]
   */
  public function getFields()
  {
    return $this->fields;
  }
  public function setMaxLength($maxLength)
  {
    $this->maxLength = $maxLength;
  }
  public function getMaxLength()
  {
    return $this->maxLength;
  }
  public function setMode($mode)
  {
    $this->mode = $mode;
  }
  public function getMode()
  {
    return $this->mode;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param TableFieldSchemaPolicyTags
   */
  public function setPolicyTags(TableFieldSchemaPolicyTags $policyTags)
  {
    $this->policyTags = $policyTags;
  }
  /**
   * @return TableFieldSchemaPolicyTags
   */
  public function getPolicyTags()
  {
    return $this->policyTags;
  }
  public function setPrecision($precision)
  {
    $this->precision = $precision;
  }
  public function getPrecision()
  {
    return $this->precision;
  }
  public function setScale($scale)
  {
    $this->scale = $scale;
  }
  public function getScale()
  {
    return $this->scale;
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
class_alias(TableFieldSchema::class, 'Google_Service_Bigquery_TableFieldSchema');
