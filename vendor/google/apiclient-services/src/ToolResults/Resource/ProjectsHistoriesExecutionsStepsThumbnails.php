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

namespace Google\Service\ToolResults\Resource;

use Google\Service\ToolResults\ListStepThumbnailsResponse;

/**
 * The "thumbnails" collection of methods.
 * Typical usage is:
 *  <code>
 *   $toolresultsService = new Google\Service\ToolResults(...);
 *   $thumbnails = $toolresultsService->thumbnails;
 *  </code>
 */
class ProjectsHistoriesExecutionsStepsThumbnails extends \Google\Service\Resource
{
  /**
   * Lists thumbnails of images attached to a step. May return any of the
   * following canonical error codes: - PERMISSION_DENIED - if the user is not
   * authorized to read from the project, or from any of the images -
   * INVALID_ARGUMENT - if the request is malformed - NOT_FOUND - if the step does
   * not exist, or if any of the images do not exist
   * (thumbnails.listProjectsHistoriesExecutionsStepsThumbnails)
   *
   * @param string $projectId A Project id. Required.
   * @param string $historyId A History id. Required.
   * @param string $executionId An Execution id. Required.
   * @param string $stepId A Step id. Required.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of thumbnails to fetch. Default
   * value: 50. The server will use this default if the field is not set or has a
   * value of 0. Optional.
   * @opt_param string pageToken A continuation token to resume the query at the
   * next item. Optional.
   * @return ListStepThumbnailsResponse
   */
  public function listProjectsHistoriesExecutionsStepsThumbnails($projectId, $historyId, $executionId, $stepId, $optParams = [])
  {
    $params = ['projectId' => $projectId, 'historyId' => $historyId, 'executionId' => $executionId, 'stepId' => $stepId];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListStepThumbnailsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsHistoriesExecutionsStepsThumbnails::class, 'Google_Service_ToolResults_Resource_ProjectsHistoriesExecutionsStepsThumbnails');
