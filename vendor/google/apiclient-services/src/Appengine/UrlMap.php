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

namespace Google\Service\Appengine;

class UrlMap extends \Google\Model
{
  protected $apiEndpointType = ApiEndpointHandler::class;
  protected $apiEndpointDataType = '';
  public $authFailAction;
  public $login;
  public $redirectHttpResponseCode;
  protected $scriptType = ScriptHandler::class;
  protected $scriptDataType = '';
  public $securityLevel;
  protected $staticFilesType = StaticFilesHandler::class;
  protected $staticFilesDataType = '';
  public $urlRegex;

  /**
   * @param ApiEndpointHandler
   */
  public function setApiEndpoint(ApiEndpointHandler $apiEndpoint)
  {
    $this->apiEndpoint = $apiEndpoint;
  }
  /**
   * @return ApiEndpointHandler
   */
  public function getApiEndpoint()
  {
    return $this->apiEndpoint;
  }
  public function setAuthFailAction($authFailAction)
  {
    $this->authFailAction = $authFailAction;
  }
  public function getAuthFailAction()
  {
    return $this->authFailAction;
  }
  public function setLogin($login)
  {
    $this->login = $login;
  }
  public function getLogin()
  {
    return $this->login;
  }
  public function setRedirectHttpResponseCode($redirectHttpResponseCode)
  {
    $this->redirectHttpResponseCode = $redirectHttpResponseCode;
  }
  public function getRedirectHttpResponseCode()
  {
    return $this->redirectHttpResponseCode;
  }
  /**
   * @param ScriptHandler
   */
  public function setScript(ScriptHandler $script)
  {
    $this->script = $script;
  }
  /**
   * @return ScriptHandler
   */
  public function getScript()
  {
    return $this->script;
  }
  public function setSecurityLevel($securityLevel)
  {
    $this->securityLevel = $securityLevel;
  }
  public function getSecurityLevel()
  {
    return $this->securityLevel;
  }
  /**
   * @param StaticFilesHandler
   */
  public function setStaticFiles(StaticFilesHandler $staticFiles)
  {
    $this->staticFiles = $staticFiles;
  }
  /**
   * @return StaticFilesHandler
   */
  public function getStaticFiles()
  {
    return $this->staticFiles;
  }
  public function setUrlRegex($urlRegex)
  {
    $this->urlRegex = $urlRegex;
  }
  public function getUrlRegex()
  {
    return $this->urlRegex;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(UrlMap::class, 'Google_Service_Appengine_UrlMap');
