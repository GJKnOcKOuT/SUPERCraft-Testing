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

namespace Google\Service\SQLAdmin;

class SslCert extends \Google\Model
{
  public $cert;
  public $certSerialNumber;
  public $commonName;
  public $createTime;
  public $expirationTime;
  public $instance;
  public $kind;
  public $selfLink;
  public $sha1Fingerprint;

  public function setCert($cert)
  {
    $this->cert = $cert;
  }
  public function getCert()
  {
    return $this->cert;
  }
  public function setCertSerialNumber($certSerialNumber)
  {
    $this->certSerialNumber = $certSerialNumber;
  }
  public function getCertSerialNumber()
  {
    return $this->certSerialNumber;
  }
  public function setCommonName($commonName)
  {
    $this->commonName = $commonName;
  }
  public function getCommonName()
  {
    return $this->commonName;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setExpirationTime($expirationTime)
  {
    $this->expirationTime = $expirationTime;
  }
  public function getExpirationTime()
  {
    return $this->expirationTime;
  }
  public function setInstance($instance)
  {
    $this->instance = $instance;
  }
  public function getInstance()
  {
    return $this->instance;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setSha1Fingerprint($sha1Fingerprint)
  {
    $this->sha1Fingerprint = $sha1Fingerprint;
  }
  public function getSha1Fingerprint()
  {
    return $this->sha1Fingerprint;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SslCert::class, 'Google_Service_SQLAdmin_SslCert');
