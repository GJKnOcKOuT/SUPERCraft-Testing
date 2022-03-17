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

namespace Google\Service\Adsense;

class ReportResult extends \Google\Collection
{
  protected $collection_key = 'warnings';
  protected $averagesType = Row::class;
  protected $averagesDataType = '';
  protected $endDateType = Date::class;
  protected $endDateDataType = '';
  protected $headersType = Header::class;
  protected $headersDataType = 'array';
  protected $rowsType = Row::class;
  protected $rowsDataType = 'array';
  protected $startDateType = Date::class;
  protected $startDateDataType = '';
  public $totalMatchedRows;
  protected $totalsType = Row::class;
  protected $totalsDataType = '';
  public $warnings;

  /**
   * @param Row
   */
  public function setAverages(Row $averages)
  {
    $this->averages = $averages;
  }
  /**
   * @return Row
   */
  public function getAverages()
  {
    return $this->averages;
  }
  /**
   * @param Date
   */
  public function setEndDate(Date $endDate)
  {
    $this->endDate = $endDate;
  }
  /**
   * @return Date
   */
  public function getEndDate()
  {
    return $this->endDate;
  }
  /**
   * @param Header[]
   */
  public function setHeaders($headers)
  {
    $this->headers = $headers;
  }
  /**
   * @return Header[]
   */
  public function getHeaders()
  {
    return $this->headers;
  }
  /**
   * @param Row[]
   */
  public function setRows($rows)
  {
    $this->rows = $rows;
  }
  /**
   * @return Row[]
   */
  public function getRows()
  {
    return $this->rows;
  }
  /**
   * @param Date
   */
  public function setStartDate(Date $startDate)
  {
    $this->startDate = $startDate;
  }
  /**
   * @return Date
   */
  public function getStartDate()
  {
    return $this->startDate;
  }
  public function setTotalMatchedRows($totalMatchedRows)
  {
    $this->totalMatchedRows = $totalMatchedRows;
  }
  public function getTotalMatchedRows()
  {
    return $this->totalMatchedRows;
  }
  /**
   * @param Row
   */
  public function setTotals(Row $totals)
  {
    $this->totals = $totals;
  }
  /**
   * @return Row
   */
  public function getTotals()
  {
    return $this->totals;
  }
  public function setWarnings($warnings)
  {
    $this->warnings = $warnings;
  }
  public function getWarnings()
  {
    return $this->warnings;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ReportResult::class, 'Google_Service_Adsense_ReportResult');
