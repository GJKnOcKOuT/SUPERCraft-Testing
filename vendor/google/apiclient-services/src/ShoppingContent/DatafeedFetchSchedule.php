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

class DatafeedFetchSchedule extends \Google\Model
{
  public $dayOfMonth;
  public $fetchUrl;
  public $hour;
  public $minuteOfHour;
  public $password;
  public $paused;
  public $timeZone;
  public $username;
  public $weekday;

  public function setDayOfMonth($dayOfMonth)
  {
    $this->dayOfMonth = $dayOfMonth;
  }
  public function getDayOfMonth()
  {
    return $this->dayOfMonth;
  }
  public function setFetchUrl($fetchUrl)
  {
    $this->fetchUrl = $fetchUrl;
  }
  public function getFetchUrl()
  {
    return $this->fetchUrl;
  }
  public function setHour($hour)
  {
    $this->hour = $hour;
  }
  public function getHour()
  {
    return $this->hour;
  }
  public function setMinuteOfHour($minuteOfHour)
  {
    $this->minuteOfHour = $minuteOfHour;
  }
  public function getMinuteOfHour()
  {
    return $this->minuteOfHour;
  }
  public function setPassword($password)
  {
    $this->password = $password;
  }
  public function getPassword()
  {
    return $this->password;
  }
  public function setPaused($paused)
  {
    $this->paused = $paused;
  }
  public function getPaused()
  {
    return $this->paused;
  }
  public function setTimeZone($timeZone)
  {
    $this->timeZone = $timeZone;
  }
  public function getTimeZone()
  {
    return $this->timeZone;
  }
  public function setUsername($username)
  {
    $this->username = $username;
  }
  public function getUsername()
  {
    return $this->username;
  }
  public function setWeekday($weekday)
  {
    $this->weekday = $weekday;
  }
  public function getWeekday()
  {
    return $this->weekday;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DatafeedFetchSchedule::class, 'Google_Service_ShoppingContent_DatafeedFetchSchedule');
