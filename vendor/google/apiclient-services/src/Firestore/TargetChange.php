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

namespace Google\Service\Firestore;

class TargetChange extends \Google\Collection
{
  protected $collection_key = 'targetIds';
  protected $causeType = Status::class;
  protected $causeDataType = '';
  public $readTime;
  public $resumeToken;
  public $targetChangeType;
  public $targetIds;

  /**
   * @param Status
   */
  public function setCause(Status $cause)
  {
    $this->cause = $cause;
  }
  /**
   * @return Status
   */
  public function getCause()
  {
    return $this->cause;
  }
  public function setReadTime($readTime)
  {
    $this->readTime = $readTime;
  }
  public function getReadTime()
  {
    return $this->readTime;
  }
  public function setResumeToken($resumeToken)
  {
    $this->resumeToken = $resumeToken;
  }
  public function getResumeToken()
  {
    return $this->resumeToken;
  }
  public function setTargetChangeType($targetChangeType)
  {
    $this->targetChangeType = $targetChangeType;
  }
  public function getTargetChangeType()
  {
    return $this->targetChangeType;
  }
  public function setTargetIds($targetIds)
  {
    $this->targetIds = $targetIds;
  }
  public function getTargetIds()
  {
    return $this->targetIds;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TargetChange::class, 'Google_Service_Firestore_TargetChange');
