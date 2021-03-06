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

namespace Google\Service\Dialogflow;

class GoogleCloudDialogflowCxV3CalculateCoverageResponse extends \Google\Model
{
  public $agent;
  protected $intentCoverageType = GoogleCloudDialogflowCxV3IntentCoverage::class;
  protected $intentCoverageDataType = '';
  protected $routeGroupCoverageType = GoogleCloudDialogflowCxV3TransitionRouteGroupCoverage::class;
  protected $routeGroupCoverageDataType = '';
  protected $transitionCoverageType = GoogleCloudDialogflowCxV3TransitionCoverage::class;
  protected $transitionCoverageDataType = '';

  public function setAgent($agent)
  {
    $this->agent = $agent;
  }
  public function getAgent()
  {
    return $this->agent;
  }
  /**
   * @param GoogleCloudDialogflowCxV3IntentCoverage
   */
  public function setIntentCoverage(GoogleCloudDialogflowCxV3IntentCoverage $intentCoverage)
  {
    $this->intentCoverage = $intentCoverage;
  }
  /**
   * @return GoogleCloudDialogflowCxV3IntentCoverage
   */
  public function getIntentCoverage()
  {
    return $this->intentCoverage;
  }
  /**
   * @param GoogleCloudDialogflowCxV3TransitionRouteGroupCoverage
   */
  public function setRouteGroupCoverage(GoogleCloudDialogflowCxV3TransitionRouteGroupCoverage $routeGroupCoverage)
  {
    $this->routeGroupCoverage = $routeGroupCoverage;
  }
  /**
   * @return GoogleCloudDialogflowCxV3TransitionRouteGroupCoverage
   */
  public function getRouteGroupCoverage()
  {
    return $this->routeGroupCoverage;
  }
  /**
   * @param GoogleCloudDialogflowCxV3TransitionCoverage
   */
  public function setTransitionCoverage(GoogleCloudDialogflowCxV3TransitionCoverage $transitionCoverage)
  {
    $this->transitionCoverage = $transitionCoverage;
  }
  /**
   * @return GoogleCloudDialogflowCxV3TransitionCoverage
   */
  public function getTransitionCoverage()
  {
    return $this->transitionCoverage;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3CalculateCoverageResponse::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3CalculateCoverageResponse');
