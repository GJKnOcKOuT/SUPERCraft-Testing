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

namespace Google\Service\ToolResults;

class PerfSampleSeries extends \Google\Model
{
  protected $basicPerfSampleSeriesType = BasicPerfSampleSeries::class;
  protected $basicPerfSampleSeriesDataType = '';
  public $executionId;
  public $historyId;
  public $projectId;
  public $sampleSeriesId;
  public $stepId;

  /**
   * @param BasicPerfSampleSeries
   */
  public function setBasicPerfSampleSeries(BasicPerfSampleSeries $basicPerfSampleSeries)
  {
    $this->basicPerfSampleSeries = $basicPerfSampleSeries;
  }
  /**
   * @return BasicPerfSampleSeries
   */
  public function getBasicPerfSampleSeries()
  {
    return $this->basicPerfSampleSeries;
  }
  public function setExecutionId($executionId)
  {
    $this->executionId = $executionId;
  }
  public function getExecutionId()
  {
    return $this->executionId;
  }
  public function setHistoryId($historyId)
  {
    $this->historyId = $historyId;
  }
  public function getHistoryId()
  {
    return $this->historyId;
  }
  public function setProjectId($projectId)
  {
    $this->projectId = $projectId;
  }
  public function getProjectId()
  {
    return $this->projectId;
  }
  public function setSampleSeriesId($sampleSeriesId)
  {
    $this->sampleSeriesId = $sampleSeriesId;
  }
  public function getSampleSeriesId()
  {
    return $this->sampleSeriesId;
  }
  public function setStepId($stepId)
  {
    $this->stepId = $stepId;
  }
  public function getStepId()
  {
    return $this->stepId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PerfSampleSeries::class, 'Google_Service_ToolResults_PerfSampleSeries');