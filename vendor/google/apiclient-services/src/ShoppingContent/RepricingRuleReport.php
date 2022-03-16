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

class RepricingRuleReport extends \Google\Collection
{
  protected $collection_key = 'inapplicableProducts';
  protected $buyboxWinningRuleStatsType = RepricingRuleReportBuyboxWinningRuleStats::class;
  protected $buyboxWinningRuleStatsDataType = '';
  protected $dateType = Date::class;
  protected $dateDataType = '';
  public $impactedProducts;
  protected $inapplicabilityDetailsType = InapplicabilityDetails::class;
  protected $inapplicabilityDetailsDataType = 'array';
  public $inapplicableProducts;
  public $orderItemCount;
  public $ruleId;
  protected $totalGmvType = PriceAmount::class;
  protected $totalGmvDataType = '';
  public $type;

  /**
   * @param RepricingRuleReportBuyboxWinningRuleStats
   */
  public function setBuyboxWinningRuleStats(RepricingRuleReportBuyboxWinningRuleStats $buyboxWinningRuleStats)
  {
    $this->buyboxWinningRuleStats = $buyboxWinningRuleStats;
  }
  /**
   * @return RepricingRuleReportBuyboxWinningRuleStats
   */
  public function getBuyboxWinningRuleStats()
  {
    return $this->buyboxWinningRuleStats;
  }
  /**
   * @param Date
   */
  public function setDate(Date $date)
  {
    $this->date = $date;
  }
  /**
   * @return Date
   */
  public function getDate()
  {
    return $this->date;
  }
  public function setImpactedProducts($impactedProducts)
  {
    $this->impactedProducts = $impactedProducts;
  }
  public function getImpactedProducts()
  {
    return $this->impactedProducts;
  }
  /**
   * @param InapplicabilityDetails[]
   */
  public function setInapplicabilityDetails($inapplicabilityDetails)
  {
    $this->inapplicabilityDetails = $inapplicabilityDetails;
  }
  /**
   * @return InapplicabilityDetails[]
   */
  public function getInapplicabilityDetails()
  {
    return $this->inapplicabilityDetails;
  }
  public function setInapplicableProducts($inapplicableProducts)
  {
    $this->inapplicableProducts = $inapplicableProducts;
  }
  public function getInapplicableProducts()
  {
    return $this->inapplicableProducts;
  }
  public function setOrderItemCount($orderItemCount)
  {
    $this->orderItemCount = $orderItemCount;
  }
  public function getOrderItemCount()
  {
    return $this->orderItemCount;
  }
  public function setRuleId($ruleId)
  {
    $this->ruleId = $ruleId;
  }
  public function getRuleId()
  {
    return $this->ruleId;
  }
  /**
   * @param PriceAmount
   */
  public function setTotalGmv(PriceAmount $totalGmv)
  {
    $this->totalGmv = $totalGmv;
  }
  /**
   * @return PriceAmount
   */
  public function getTotalGmv()
  {
    return $this->totalGmv;
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
class_alias(RepricingRuleReport::class, 'Google_Service_ShoppingContent_RepricingRuleReport');
