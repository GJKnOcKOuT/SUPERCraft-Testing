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

namespace Google\Service\Monitoring;

class HttpCheck extends \Google\Model
{
  protected $authInfoType = BasicAuthentication::class;
  protected $authInfoDataType = '';
  public $body;
  public $contentType;
  public $headers;
  public $maskHeaders;
  public $path;
  public $port;
  public $requestMethod;
  public $useSsl;
  public $validateSsl;

  /**
   * @param BasicAuthentication
   */
  public function setAuthInfo(BasicAuthentication $authInfo)
  {
    $this->authInfo = $authInfo;
  }
  /**
   * @return BasicAuthentication
   */
  public function getAuthInfo()
  {
    return $this->authInfo;
  }
  public function setBody($body)
  {
    $this->body = $body;
  }
  public function getBody()
  {
    return $this->body;
  }
  public function setContentType($contentType)
  {
    $this->contentType = $contentType;
  }
  public function getContentType()
  {
    return $this->contentType;
  }
  public function setHeaders($headers)
  {
    $this->headers = $headers;
  }
  public function getHeaders()
  {
    return $this->headers;
  }
  public function setMaskHeaders($maskHeaders)
  {
    $this->maskHeaders = $maskHeaders;
  }
  public function getMaskHeaders()
  {
    return $this->maskHeaders;
  }
  public function setPath($path)
  {
    $this->path = $path;
  }
  public function getPath()
  {
    return $this->path;
  }
  public function setPort($port)
  {
    $this->port = $port;
  }
  public function getPort()
  {
    return $this->port;
  }
  public function setRequestMethod($requestMethod)
  {
    $this->requestMethod = $requestMethod;
  }
  public function getRequestMethod()
  {
    return $this->requestMethod;
  }
  public function setUseSsl($useSsl)
  {
    $this->useSsl = $useSsl;
  }
  public function getUseSsl()
  {
    return $this->useSsl;
  }
  public function setValidateSsl($validateSsl)
  {
    $this->validateSsl = $validateSsl;
  }
  public function getValidateSsl()
  {
    return $this->validateSsl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(HttpCheck::class, 'Google_Service_Monitoring_HttpCheck');