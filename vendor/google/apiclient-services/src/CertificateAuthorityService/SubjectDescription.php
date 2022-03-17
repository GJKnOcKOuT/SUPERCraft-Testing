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

namespace Google\Service\CertificateAuthorityService;

class SubjectDescription extends \Google\Model
{
  public $hexSerialNumber;
  public $lifetime;
  public $notAfterTime;
  public $notBeforeTime;
  protected $subjectType = Subject::class;
  protected $subjectDataType = '';
  protected $subjectAltNameType = SubjectAltNames::class;
  protected $subjectAltNameDataType = '';

  public function setHexSerialNumber($hexSerialNumber)
  {
    $this->hexSerialNumber = $hexSerialNumber;
  }
  public function getHexSerialNumber()
  {
    return $this->hexSerialNumber;
  }
  public function setLifetime($lifetime)
  {
    $this->lifetime = $lifetime;
  }
  public function getLifetime()
  {
    return $this->lifetime;
  }
  public function setNotAfterTime($notAfterTime)
  {
    $this->notAfterTime = $notAfterTime;
  }
  public function getNotAfterTime()
  {
    return $this->notAfterTime;
  }
  public function setNotBeforeTime($notBeforeTime)
  {
    $this->notBeforeTime = $notBeforeTime;
  }
  public function getNotBeforeTime()
  {
    return $this->notBeforeTime;
  }
  /**
   * @param Subject
   */
  public function setSubject(Subject $subject)
  {
    $this->subject = $subject;
  }
  /**
   * @return Subject
   */
  public function getSubject()
  {
    return $this->subject;
  }
  /**
   * @param SubjectAltNames
   */
  public function setSubjectAltName(SubjectAltNames $subjectAltName)
  {
    $this->subjectAltName = $subjectAltName;
  }
  /**
   * @return SubjectAltNames
   */
  public function getSubjectAltName()
  {
    return $this->subjectAltName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SubjectDescription::class, 'Google_Service_CertificateAuthorityService_SubjectDescription');
