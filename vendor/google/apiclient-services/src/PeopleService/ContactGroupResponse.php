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

namespace Google\Service\PeopleService;

class ContactGroupResponse extends \Google\Model
{
  protected $contactGroupType = ContactGroup::class;
  protected $contactGroupDataType = '';
  public $requestedResourceName;
  protected $statusType = Status::class;
  protected $statusDataType = '';

  /**
   * @param ContactGroup
   */
  public function setContactGroup(ContactGroup $contactGroup)
  {
    $this->contactGroup = $contactGroup;
  }
  /**
   * @return ContactGroup
   */
  public function getContactGroup()
  {
    return $this->contactGroup;
  }
  public function setRequestedResourceName($requestedResourceName)
  {
    $this->requestedResourceName = $requestedResourceName;
  }
  public function getRequestedResourceName()
  {
    return $this->requestedResourceName;
  }
  /**
   * @param Status
   */
  public function setStatus(Status $status)
  {
    $this->status = $status;
  }
  /**
   * @return Status
   */
  public function getStatus()
  {
    return $this->status;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ContactGroupResponse::class, 'Google_Service_PeopleService_ContactGroupResponse');
