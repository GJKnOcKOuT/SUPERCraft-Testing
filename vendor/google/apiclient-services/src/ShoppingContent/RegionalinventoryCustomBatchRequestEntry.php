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

namespace Google\Service\ShoppingContent;

class RegionalinventoryCustomBatchRequestEntry extends \Google\Model
{
  public $batchId;
  public $merchantId;
  public $method;
  public $productId;
  protected $regionalInventoryType = RegionalInventory::class;
  protected $regionalInventoryDataType = '';

  public function setBatchId($batchId)
  {
    $this->batchId = $batchId;
  }
  public function getBatchId()
  {
    return $this->batchId;
  }
  public function setMerchantId($merchantId)
  {
    $this->merchantId = $merchantId;
  }
  public function getMerchantId()
  {
    return $this->merchantId;
  }
  public function setMethod($method)
  {
    $this->method = $method;
  }
  public function getMethod()
  {
    return $this->method;
  }
  public function setProductId($productId)
  {
    $this->productId = $productId;
  }
  public function getProductId()
  {
    return $this->productId;
  }
  /**
   * @param RegionalInventory
   */
  public function setRegionalInventory(RegionalInventory $regionalInventory)
  {
    $this->regionalInventory = $regionalInventory;
  }
  /**
   * @return RegionalInventory
   */
  public function getRegionalInventory()
  {
    return $this->regionalInventory;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RegionalinventoryCustomBatchRequestEntry::class, 'Google_Service_ShoppingContent_RegionalinventoryCustomBatchRequestEntry');