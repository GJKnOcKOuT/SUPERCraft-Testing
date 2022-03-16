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

class OrderreturnsProcessRequest extends \Google\Collection
{
  protected $collection_key = 'returnItems';
  public $fullChargeReturnShippingCost;
  public $operationId;
  protected $refundShippingFeeType = OrderreturnsRefundOperation::class;
  protected $refundShippingFeeDataType = '';
  protected $returnItemsType = OrderreturnsReturnItem::class;
  protected $returnItemsDataType = 'array';

  public function setFullChargeReturnShippingCost($fullChargeReturnShippingCost)
  {
    $this->fullChargeReturnShippingCost = $fullChargeReturnShippingCost;
  }
  public function getFullChargeReturnShippingCost()
  {
    return $this->fullChargeReturnShippingCost;
  }
  public function setOperationId($operationId)
  {
    $this->operationId = $operationId;
  }
  public function getOperationId()
  {
    return $this->operationId;
  }
  /**
   * @param OrderreturnsRefundOperation
   */
  public function setRefundShippingFee(OrderreturnsRefundOperation $refundShippingFee)
  {
    $this->refundShippingFee = $refundShippingFee;
  }
  /**
   * @return OrderreturnsRefundOperation
   */
  public function getRefundShippingFee()
  {
    return $this->refundShippingFee;
  }
  /**
   * @param OrderreturnsReturnItem[]
   */
  public function setReturnItems($returnItems)
  {
    $this->returnItems = $returnItems;
  }
  /**
   * @return OrderreturnsReturnItem[]
   */
  public function getReturnItems()
  {
    return $this->returnItems;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrderreturnsProcessRequest::class, 'Google_Service_ShoppingContent_OrderreturnsProcessRequest');
