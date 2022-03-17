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

namespace Google\Service\Gmail;

class SmimeInfo extends \Google\Model
{
  public $encryptedKeyPassword;
  public $expiration;
  public $id;
  public $isDefault;
  public $issuerCn;
  public $pem;
  public $pkcs12;

  public function setEncryptedKeyPassword($encryptedKeyPassword)
  {
    $this->encryptedKeyPassword = $encryptedKeyPassword;
  }
  public function getEncryptedKeyPassword()
  {
    return $this->encryptedKeyPassword;
  }
  public function setExpiration($expiration)
  {
    $this->expiration = $expiration;
  }
  public function getExpiration()
  {
    return $this->expiration;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setIsDefault($isDefault)
  {
    $this->isDefault = $isDefault;
  }
  public function getIsDefault()
  {
    return $this->isDefault;
  }
  public function setIssuerCn($issuerCn)
  {
    $this->issuerCn = $issuerCn;
  }
  public function getIssuerCn()
  {
    return $this->issuerCn;
  }
  public function setPem($pem)
  {
    $this->pem = $pem;
  }
  public function getPem()
  {
    return $this->pem;
  }
  public function setPkcs12($pkcs12)
  {
    $this->pkcs12 = $pkcs12;
  }
  public function getPkcs12()
  {
    return $this->pkcs12;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SmimeInfo::class, 'Google_Service_Gmail_SmimeInfo');