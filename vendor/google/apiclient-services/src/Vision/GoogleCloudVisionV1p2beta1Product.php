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

namespace Google\Service\Vision;

class GoogleCloudVisionV1p2beta1Product extends \Google\Collection
{
  protected $collection_key = 'productLabels';
  public $description;
  public $displayName;
  public $name;
  public $productCategory;
  protected $productLabelsType = GoogleCloudVisionV1p2beta1ProductKeyValue::class;
  protected $productLabelsDataType = 'array';

  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setProductCategory($productCategory)
  {
    $this->productCategory = $productCategory;
  }
  public function getProductCategory()
  {
    return $this->productCategory;
  }
  /**
   * @param GoogleCloudVisionV1p2beta1ProductKeyValue[]
   */
  public function setProductLabels($productLabels)
  {
    $this->productLabels = $productLabels;
  }
  /**
   * @return GoogleCloudVisionV1p2beta1ProductKeyValue[]
   */
  public function getProductLabels()
  {
    return $this->productLabels;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudVisionV1p2beta1Product::class, 'Google_Service_Vision_GoogleCloudVisionV1p2beta1Product');
