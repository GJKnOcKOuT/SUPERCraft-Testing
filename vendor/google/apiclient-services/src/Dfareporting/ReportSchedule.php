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

namespace Google\Service\Dfareporting;

class ReportSchedule extends \Google\Collection
{
  protected $collection_key = 'repeatsOnWeekDays';
  public $active;
  public $every;
  public $expirationDate;
  public $repeats;
  public $repeatsOnWeekDays;
  public $runsOnDayOfMonth;
  public $startDate;

  public function setActive($active)
  {
    $this->active = $active;
  }
  public function getActive()
  {
    return $this->active;
  }
  public function setEvery($every)
  {
    $this->every = $every;
  }
  public function getEvery()
  {
    return $this->every;
  }
  public function setExpirationDate($expirationDate)
  {
    $this->expirationDate = $expirationDate;
  }
  public function getExpirationDate()
  {
    return $this->expirationDate;
  }
  public function setRepeats($repeats)
  {
    $this->repeats = $repeats;
  }
  public function getRepeats()
  {
    return $this->repeats;
  }
  public function setRepeatsOnWeekDays($repeatsOnWeekDays)
  {
    $this->repeatsOnWeekDays = $repeatsOnWeekDays;
  }
  public function getRepeatsOnWeekDays()
  {
    return $this->repeatsOnWeekDays;
  }
  public function setRunsOnDayOfMonth($runsOnDayOfMonth)
  {
    $this->runsOnDayOfMonth = $runsOnDayOfMonth;
  }
  public function getRunsOnDayOfMonth()
  {
    return $this->runsOnDayOfMonth;
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
class_alias(ReportSchedule::class, 'Google_Service_Dfareporting_ReportSchedule');
