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

class TestCase extends \Google\Collection
{
  protected $collection_key = 'toolOutputs';
  protected $elapsedTimeType = Duration::class;
  protected $elapsedTimeDataType = '';
  protected $endTimeType = Timestamp::class;
  protected $endTimeDataType = '';
  public $skippedMessage;
  protected $stackTracesType = StackTrace::class;
  protected $stackTracesDataType = 'array';
  protected $startTimeType = Timestamp::class;
  protected $startTimeDataType = '';
  public $status;
  public $testCaseId;
  protected $testCaseReferenceType = TestCaseReference::class;
  protected $testCaseReferenceDataType = '';
  protected $toolOutputsType = ToolOutputReference::class;
  protected $toolOutputsDataType = 'array';

  /**
   * @param Duration
   */
  public function setElapsedTime(Duration $elapsedTime)
  {
    $this->elapsedTime = $elapsedTime;
  }
  /**
   * @return Duration
   */
  public function getElapsedTime()
  {
    return $this->elapsedTime;
  }
  /**
   * @param Timestamp
   */
  public function setEndTime(Timestamp $endTime)
  {
    $this->endTime = $endTime;
  }
  /**
   * @return Timestamp
   */
  public function getEndTime()
  {
    return $this->endTime;
  }
  public function setSkippedMessage($skippedMessage)
  {
    $this->skippedMessage = $skippedMessage;
  }
  public function getSkippedMessage()
  {
    return $this->skippedMessage;
  }
  /**
   * @param StackTrace[]
   */
  public function setStackTraces($stackTraces)
  {
    $this->stackTraces = $stackTraces;
  }
  /**
   * @return StackTrace[]
   */
  public function getStackTraces()
  {
    return $this->stackTraces;
  }
  /**
   * @param Timestamp
   */
  public function setStartTime(Timestamp $startTime)
  {
    $this->startTime = $startTime;
  }
  /**
   * @return Timestamp
   */
  public function getStartTime()
  {
    return $this->startTime;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
  public function setTestCaseId($testCaseId)
  {
    $this->testCaseId = $testCaseId;
  }
  public function getTestCaseId()
  {
    return $this->testCaseId;
  }
  /**
   * @param TestCaseReference
   */
  public function setTestCaseReference(TestCaseReference $testCaseReference)
  {
    $this->testCaseReference = $testCaseReference;
  }
  /**
   * @return TestCaseReference
   */
  public function getTestCaseReference()
  {
    return $this->testCaseReference;
  }
  /**
   * @param ToolOutputReference[]
   */
  public function setToolOutputs($toolOutputs)
  {
    $this->toolOutputs = $toolOutputs;
  }
  /**
   * @return ToolOutputReference[]
   */
  public function getToolOutputs()
  {
    return $this->toolOutputs;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TestCase::class, 'Google_Service_ToolResults_TestCase');