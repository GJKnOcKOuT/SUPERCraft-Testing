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

namespace Google\Service\ArtifactRegistry\Resource;

use Google\Service\ArtifactRegistry\ListDockerImagesResponse;

/**
 * The "dockerImages" collection of methods.
 * Typical usage is:
 *  <code>
 *   $artifactregistryService = new Google\Service\ArtifactRegistry(...);
 *   $dockerImages = $artifactregistryService->dockerImages;
 *  </code>
 */
class ProjectsLocationsRepositoriesDockerImages extends \Google\Service\Resource
{
  /**
   * Lists docker images.
   * (dockerImages.listProjectsLocationsRepositoriesDockerImages)
   *
   * @param string $parent Required. The name of the parent resource whose docker
   * images will be listed.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of artifacts to return.
   * @opt_param string pageToken The next_page_token value returned from a
   * previous list request, if any.
   * @return ListDockerImagesResponse
   */
  public function listProjectsLocationsRepositoriesDockerImages($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListDockerImagesResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsRepositoriesDockerImages::class, 'Google_Service_ArtifactRegistry_Resource_ProjectsLocationsRepositoriesDockerImages');