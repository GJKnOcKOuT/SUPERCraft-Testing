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

namespace Google\Service\Container;

class MasterAuth extends \Google\Model
{
  public $clientCertificate;
  protected $clientCertificateConfigType = ClientCertificateConfig::class;
  protected $clientCertificateConfigDataType = '';
  public $clientKey;
  public $clusterCaCertificate;
  public $password;
  public $username;

  public function setClientCertificate($clientCertificate)
  {
    $this->clientCertificate = $clientCertificate;
  }
  public function getClientCertificate()
  {
    return $this->clientCertificate;
  }
  /**
   * @param ClientCertificateConfig
   */
  public function setClientCertificateConfig(ClientCertificateConfig $clientCertificateConfig)
  {
    $this->clientCertificateConfig = $clientCertificateConfig;
  }
  /**
   * @return ClientCertificateConfig
   */
  public function getClientCertificateConfig()
  {
    return $this->clientCertificateConfig;
  }
  public function setClientKey($clientKey)
  {
    $this->clientKey = $clientKey;
  }
  public function getClientKey()
  {
    return $this->clientKey;
  }
  public function setClusterCaCertificate($clusterCaCertificate)
  {
    $this->clusterCaCertificate = $clusterCaCertificate;
  }
  public function getClusterCaCertificate()
  {
    return $this->clusterCaCertificate;
  }
  public function setPassword($password)
  {
    $this->password = $password;
  }
  public function getPassword()
  {
    return $this->password;
  }
  public function setUsername($username)
  {
    $this->username = $username;
  }
  public function getUsername()
  {
    return $this->username;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MasterAuth::class, 'Google_Service_Container_MasterAuth');