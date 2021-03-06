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

namespace Google\Service\AccessApproval\Resource;

use Google\Service\AccessApproval\AccessApprovalSettings;
use Google\Service\AccessApproval\AccessapprovalEmpty;

/**
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $accessapprovalService = new Google\Service\AccessApproval(...);
 *   $projects = $accessapprovalService->projects;
 *  </code>
 */
class Projects extends \Google\Service\Resource
{
  /**
   * Deletes the settings associated with a project, folder, or organization. This
   * will have the effect of disabling Access Approval for the project, folder, or
   * organization, but only if all ancestors also have Access Approval disabled.
   * If Access Approval is enabled at a higher level of the hierarchy, then Access
   * Approval will still be enabled at this level as the settings are inherited.
   * (projects.deleteAccessApprovalSettings)
   *
   * @param string $name Name of the AccessApprovalSettings to delete.
   * @param array $optParams Optional parameters.
   * @return AccessapprovalEmpty
   */
  public function deleteAccessApprovalSettings($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('deleteAccessApprovalSettings', [$params], AccessapprovalEmpty::class);
  }
  /**
   * Gets the settings associated with a project, folder, or organization.
   * (projects.getAccessApprovalSettings)
   *
   * @param string $name Name of the AccessApprovalSettings to retrieve.
   * @param array $optParams Optional parameters.
   * @return AccessApprovalSettings
   */
  public function getAccessApprovalSettings($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('getAccessApprovalSettings', [$params], AccessApprovalSettings::class);
  }
  /**
   * Updates the settings associated with a project, folder, or organization.
   * Settings to update are determined by the value of field_mask.
   * (projects.updateAccessApprovalSettings)
   *
   * @param string $name The resource name of the settings. Format is one of: *
   * "projects/{project}/accessApprovalSettings" *
   * "folders/{folder}/accessApprovalSettings" *
   * "organizations/{organization}/accessApprovalSettings"
   * @param AccessApprovalSettings $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask The update mask applies to the settings. Only
   * the top level fields of AccessApprovalSettings (notification_emails &
   * enrolled_services) are supported. For each field, if it is included, the
   * currently stored value will be entirely overwritten with the value of the
   * field passed in this request. For the `FieldMask` definition, see
   * https://developers.google.com/protocol-
   * buffers/docs/reference/google.protobuf#fieldmask If this field is left unset,
   * only the notification_emails field will be updated.
   * @return AccessApprovalSettings
   */
  public function updateAccessApprovalSettings($name, AccessApprovalSettings $postBody, $optParams = [])
  {
    $params = ['name' => $name, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('updateAccessApprovalSettings', [$params], AccessApprovalSettings::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Projects::class, 'Google_Service_AccessApproval_Resource_Projects');
