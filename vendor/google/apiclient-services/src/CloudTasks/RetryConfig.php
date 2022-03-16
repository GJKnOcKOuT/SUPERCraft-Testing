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

namespace Google\Service\CloudTasks;

class RetryConfig extends \Google\Model
{
  public $maxAttempts;
  public $maxBackoff;
  public $maxDoublings;
  public $maxRetryDuration;
  public $minBackoff;

  public function setMaxAttempts($maxAttempts)
  {
    $this->maxAttempts = $maxAttempts;
  }
  public function getMaxAttempts()
  {
    return $this->maxAttempts;
  }
  public function setMaxBackoff($maxBackoff)
  {
    $this->maxBackoff = $maxBackoff;
  }
  public function getMaxBackoff()
  {
    return $this->maxBackoff;
  }
  public function setMaxDoublings($maxDoublings)
  {
    $this->maxDoublings = $maxDoublings;
  }
  public function getMaxDoublings()
  {
    return $this->maxDoublings;
  }
  public function setMaxRetryDuration($maxRetryDuration)
  {
    $this->maxRetryDuration = $maxRetryDuration;
  }
  public function getMaxRetryDuration()
  {
    return $this->maxRetryDuration;
  }
  public function setMinBackoff($minBackoff)
  {
    $this->minBackoff = $minBackoff;
  }
  public function getMinBackoff()
  {
    return $this->minBackoff;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RetryConfig::class, 'Google_Service_CloudTasks_RetryConfig');
