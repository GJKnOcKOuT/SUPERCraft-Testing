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

namespace Google\Service\AndroidEnterprise;

class ProductSigningCertificate extends \Google\Model
{
  public $certificateHashSha1;
  public $certificateHashSha256;

  public function setCertificateHashSha1($certificateHashSha1)
  {
    $this->certificateHashSha1 = $certificateHashSha1;
  }
  public function getCertificateHashSha1()
  {
    return $this->certificateHashSha1;
  }
  public function setCertificateHashSha256($certificateHashSha256)
  {
    $this->certificateHashSha256 = $certificateHashSha256;
  }
  public function getCertificateHashSha256()
  {
    return $this->certificateHashSha256;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProductSigningCertificate::class, 'Google_Service_AndroidEnterprise_ProductSigningCertificate');
