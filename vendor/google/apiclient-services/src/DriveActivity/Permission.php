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

namespace Google\Service\DriveActivity;

class Permission extends \Google\Model
{
  public $allowDiscovery;
  protected $anyoneType = Anyone::class;
  protected $anyoneDataType = '';
  protected $domainType = Domain::class;
  protected $domainDataType = '';
  protected $groupType = Group::class;
  protected $groupDataType = '';
  public $role;
  protected $userType = User::class;
  protected $userDataType = '';

  public function setAllowDiscovery($allowDiscovery)
  {
    $this->allowDiscovery = $allowDiscovery;
  }
  public function getAllowDiscovery()
  {
    return $this->allowDiscovery;
  }
  /**
   * @param Anyone
   */
  public function setAnyone(Anyone $anyone)
  {
    $this->anyone = $anyone;
  }
  /**
   * @return Anyone
   */
  public function getAnyone()
  {
    return $this->anyone;
  }
  /**
   * @param Domain
   */
  public function setDomain(Domain $domain)
  {
    $this->domain = $domain;
  }
  /**
   * @return Domain
   */
  public function getDomain()
  {
    return $this->domain;
  }
  /**
   * @param Group
   */
  public function setGroup(Group $group)
  {
    $this->group = $group;
  }
  /**
   * @return Group
   */
  public function getGroup()
  {
    return $this->group;
  }
  public function setRole($role)
  {
    $this->role = $role;
  }
  public function getRole()
  {
    return $this->role;
  }
  /**
   * @param User
   */
  public function setUser(User $user)
  {
    $this->user = $user;
  }
  /**
   * @return User
   */
  public function getUser()
  {
    return $this->user;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Permission::class, 'Google_Service_DriveActivity_Permission');
