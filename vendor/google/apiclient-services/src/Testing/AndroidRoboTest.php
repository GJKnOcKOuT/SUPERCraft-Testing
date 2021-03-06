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

namespace Google\Service\Testing;

class AndroidRoboTest extends \Google\Collection
{
  protected $collection_key = 'startingIntents';
  protected $appApkType = FileReference::class;
  protected $appApkDataType = '';
  protected $appBundleType = AppBundle::class;
  protected $appBundleDataType = '';
  public $appInitialActivity;
  public $appPackageId;
  public $maxDepth;
  public $maxSteps;
  protected $roboDirectivesType = RoboDirective::class;
  protected $roboDirectivesDataType = 'array';
  protected $roboScriptType = FileReference::class;
  protected $roboScriptDataType = '';
  protected $startingIntentsType = RoboStartingIntent::class;
  protected $startingIntentsDataType = 'array';

  /**
   * @param FileReference
   */
  public function setAppApk(FileReference $appApk)
  {
    $this->appApk = $appApk;
  }
  /**
   * @return FileReference
   */
  public function getAppApk()
  {
    return $this->appApk;
  }
  /**
   * @param AppBundle
   */
  public function setAppBundle(AppBundle $appBundle)
  {
    $this->appBundle = $appBundle;
  }
  /**
   * @return AppBundle
   */
  public function getAppBundle()
  {
    return $this->appBundle;
  }
  public function setAppInitialActivity($appInitialActivity)
  {
    $this->appInitialActivity = $appInitialActivity;
  }
  public function getAppInitialActivity()
  {
    return $this->appInitialActivity;
  }
  public function setAppPackageId($appPackageId)
  {
    $this->appPackageId = $appPackageId;
  }
  public function getAppPackageId()
  {
    return $this->appPackageId;
  }
  public function setMaxDepth($maxDepth)
  {
    $this->maxDepth = $maxDepth;
  }
  public function getMaxDepth()
  {
    return $this->maxDepth;
  }
  public function setMaxSteps($maxSteps)
  {
    $this->maxSteps = $maxSteps;
  }
  public function getMaxSteps()
  {
    return $this->maxSteps;
  }
  /**
   * @param RoboDirective[]
   */
  public function setRoboDirectives($roboDirectives)
  {
    $this->roboDirectives = $roboDirectives;
  }
  /**
   * @return RoboDirective[]
   */
  public function getRoboDirectives()
  {
    return $this->roboDirectives;
  }
  /**
   * @param FileReference
   */
  public function setRoboScript(FileReference $roboScript)
  {
    $this->roboScript = $roboScript;
  }
  /**
   * @return FileReference
   */
  public function getRoboScript()
  {
    return $this->roboScript;
  }
  /**
   * @param RoboStartingIntent[]
   */
  public function setStartingIntents($startingIntents)
  {
    $this->startingIntents = $startingIntents;
  }
  /**
   * @return RoboStartingIntent[]
   */
  public function getStartingIntents()
  {
    return $this->startingIntents;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AndroidRoboTest::class, 'Google_Service_Testing_AndroidRoboTest');
