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

namespace Google\Service\Books;

class DownloadAccessRestriction extends \Google\Model
{
  public $deviceAllowed;
  public $downloadsAcquired;
  public $justAcquired;
  public $kind;
  public $maxDownloadDevices;
  public $message;
  public $nonce;
  public $reasonCode;
  public $restricted;
  public $signature;
  public $source;
  public $volumeId;

  public function setDeviceAllowed($deviceAllowed)
  {
    $this->deviceAllowed = $deviceAllowed;
  }
  public function getDeviceAllowed()
  {
    return $this->deviceAllowed;
  }
  public function setDownloadsAcquired($downloadsAcquired)
  {
    $this->downloadsAcquired = $downloadsAcquired;
  }
  public function getDownloadsAcquired()
  {
    return $this->downloadsAcquired;
  }
  public function setJustAcquired($justAcquired)
  {
    $this->justAcquired = $justAcquired;
  }
  public function getJustAcquired()
  {
    return $this->justAcquired;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setMaxDownloadDevices($maxDownloadDevices)
  {
    $this->maxDownloadDevices = $maxDownloadDevices;
  }
  public function getMaxDownloadDevices()
  {
    return $this->maxDownloadDevices;
  }
  public function setMessage($message)
  {
    $this->message = $message;
  }
  public function getMessage()
  {
    return $this->message;
  }
  public function setNonce($nonce)
  {
    $this->nonce = $nonce;
  }
  public function getNonce()
  {
    return $this->nonce;
  }
  public function setReasonCode($reasonCode)
  {
    $this->reasonCode = $reasonCode;
  }
  public function getReasonCode()
  {
    return $this->reasonCode;
  }
  public function setRestricted($restricted)
  {
    $this->restricted = $restricted;
  }
  public function getRestricted()
  {
    return $this->restricted;
  }
  public function setSignature($signature)
  {
    $this->signature = $signature;
  }
  public function getSignature()
  {
    return $this->signature;
  }
  public function setSource($source)
  {
    $this->source = $source;
  }
  public function getSource()
  {
    return $this->source;
  }
  public function setVolumeId($volumeId)
  {
    $this->volumeId = $volumeId;
  }
  public function getVolumeId()
  {
    return $this->volumeId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DownloadAccessRestriction::class, 'Google_Service_Books_DownloadAccessRestriction');
