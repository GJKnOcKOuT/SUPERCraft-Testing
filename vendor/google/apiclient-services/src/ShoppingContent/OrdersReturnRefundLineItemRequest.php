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

class OrdersReturnRefundLineItemRequest extends \Google\Model
{
  public $lineItemId;
  public $operationId;
  protected $priceAmountType = Price::class;
  protected $priceAmountDataType = '';
  public $productId;
  public $quantity;
  public $reason;
  public $reasonText;
  protected $taxAmountType = Price::class;
  protected $taxAmountDataType = '';

  public function setLineItemId($lineItemId)
  {
    $this->lineItemId = $lineItemId;
  }
  public function getLineItemId()
  {
    return $this->lineItemId;
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
   * @param Price
   */
  public function setPriceAmount(Price $priceAmount)
  {
    $this->priceAmount = $priceAmount;
  }
  /**
   * @return Price
   */
  public function getPriceAmount()
  {
    return $this->priceAmount;
  }
  public function setProductId($productId)
  {
    $this->productId = $productId;
  }
  public function getProductId()
  {
    return $this->productId;
  }
  public function setQuantity($quantity)
  {
    $this->quantity = $quantity;
  }
  public function getQuantity()
  {
    return $this->quantity;
  }
  public function setReason($reason)
  {
    $this->reason = $reason;
  }
  public function getReason()
  {
    return $this->reason;
  }
  public function setReasonText($reasonText)
  {
    $this->reasonText = $reasonText;
  }
  public function getReasonText()
  {
    return $this->reasonText;
  }
  /**
   * @param Price
   */
  public function setTaxAmount(Price $taxAmount)
  {
    $this->taxAmount = $taxAmount;
  }
  /**
   * @return Price
   */
  public function getTaxAmount()
  {
    return $this->taxAmount;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OrdersReturnRefundLineItemRequest::class, 'Google_Service_ShoppingContent_OrdersReturnRefundLineItemRequest');
