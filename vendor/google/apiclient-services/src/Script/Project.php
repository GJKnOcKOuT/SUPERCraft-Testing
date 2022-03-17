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

namespace Google\Service\Script;

class Project extends \Google\Model
{
  public $createTime;
  protected $creatorType = GoogleAppsScriptTypeUser::class;
  protected $creatorDataType = '';
  protected $lastModifyUserType = GoogleAppsScriptTypeUser::class;
  protected $lastModifyUserDataType = '';
  public $parentId;
  public $scriptId;
  public $title;
  public $updateTime;

  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param GoogleAppsScriptTypeUser
   */
  public function setCreator(GoogleAppsScriptTypeUser $creator)
  {
    $this->creator = $creator;
  }
  /**
   * @return GoogleAppsScriptTypeUser
   */
  public function getCreator()
  {
    return $this->creator;
  }
  /**
   * @param GoogleAppsScriptTypeUser
   */
  public function setLastModifyUser(GoogleAppsScriptTypeUser $lastModifyUser)
  {
    $this->lastModifyUser = $lastModifyUser;
  }
  /**
   * @return GoogleAppsScriptTypeUser
   */
  public function getLastModifyUser()
  {
    return $this->lastModifyUser;
  }
  public function setParentId($parentId)
  {
    $this->parentId = $parentId;
  }
  public function getParentId()
  {
    return $this->parentId;
  }
  public function setScriptId($scriptId)
  {
    $this->scriptId = $scriptId;
  }
  public function getScriptId()
  {
    return $this->scriptId;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Project::class, 'Google_Service_Script_Project');