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

namespace Google\Service\Doubleclicksearch;

class ReportApiColumnSpec extends \Google\Model
{
  public $columnName;
  public $customDimensionName;
  public $customMetricName;
  public $endDate;
  public $groupByColumn;
  public $headerText;
  public $platformSource;
  public $productReportPerspective;
  public $savedColumnName;
  public $startDate;

  public function setColumnName($columnName)
  {
    $this->columnName = $columnName;
  }
  public function getColumnName()
  {
    return $this->columnName;
  }
  public function setCustomDimensionName($customDimensionName)
  {
    $this->customDimensionName = $customDimensionName;
  }
  public function getCustomDimensionName()
  {
    return $this->customDimensionName;
  }
  public function setCustomMetricName($customMetricName)
  {
    $this->customMetricName = $customMetricName;
  }
  public function getCustomMetricName()
  {
    return $this->customMetricName;
  }
  public function setEndDate($endDate)
  {
    $this->endDate = $endDate;
  }
  public function getEndDate()
  {
    return $this->endDate;
  }
  public function setGroupByColumn($groupByColumn)
  {
    $this->groupByColumn = $groupByColumn;
  }
  public function getGroupByColumn()
  {
    return $this->groupByColumn;
  }
  public function setHeaderText($headerText)
  {
    $this->headerText = $headerText;
  }
  public function getHeaderText()
  {
    return $this->headerText;
  }
  public function setPlatformSource($platformSource)
  {
    $this->platformSource = $platformSource;
  }
  public function getPlatformSource()
  {
    return $this->platformSource;
  }
  public function setProductReportPerspective($productReportPerspective)
  {
    $this->productReportPerspective = $productReportPerspective;
  }
  public function getProductReportPerspective()
  {
    return $this->productReportPerspective;
  }
  public function setSavedColumnName($savedColumnName)
  {
    $this->savedColumnName = $savedColumnName;
  }
  public function getSavedColumnName()
  {
    return $this->savedColumnName;
  }
  public function setStartDate($startDate)
  {
    $this->startDate = $startDate;
  }
  public function getStartDate()
  {
    return $this->startDate;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ReportApiColumnSpec::class, 'Google_Service_Doubleclicksearch_ReportApiColumnSpec');