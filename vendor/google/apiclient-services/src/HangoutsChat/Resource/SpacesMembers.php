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

namespace Google\Service\HangoutsChat\Resource;

use Google\Service\HangoutsChat\ListMembershipsResponse;
use Google\Service\HangoutsChat\Membership;

/**
 * The "members" collection of methods.
 * Typical usage is:
 *  <code>
 *   $chatService = new Google\Service\HangoutsChat(...);
 *   $members = $chatService->members;
 *  </code>
 */
class SpacesMembers extends \Google\Service\Resource
{
  /**
   * Returns a membership. (members.get)
   *
   * @param string $name Required. Resource name of the membership to be
   * retrieved, in the form "spaces/members". Example:
   * spaces/AAAAMpdlehY/members/105115627578887013105
   * @param array $optParams Optional parameters.
   * @return Membership
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], Membership::class);
  }
  /**
   * Lists human memberships in a space. (members.listSpacesMembers)
   *
   * @param string $parent Required. The resource name of the space for which
   * membership list is to be fetched, in the form "spaces". Example:
   * spaces/AAAAMpdlehY
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize Requested page size. The value is capped at 1000.
   * Server may return fewer results than requested. If unspecified, server will
   * default to 100.
   * @opt_param string pageToken A token identifying a page of results the server
   * should return.
   * @return ListMembershipsResponse
   */
  public function listSpacesMembers($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], ListMembershipsResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SpacesMembers::class, 'Google_Service_HangoutsChat_Resource_SpacesMembers');
