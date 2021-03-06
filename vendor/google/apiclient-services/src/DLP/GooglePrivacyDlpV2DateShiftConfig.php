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

namespace Google\Service\DLP;

class GooglePrivacyDlpV2DateShiftConfig extends \Google\Model
{
  protected $contextType = GooglePrivacyDlpV2FieldId::class;
  protected $contextDataType = '';
  protected $cryptoKeyType = GooglePrivacyDlpV2CryptoKey::class;
  protected $cryptoKeyDataType = '';
  public $lowerBoundDays;
  public $upperBoundDays;

  /**
   * @param GooglePrivacyDlpV2FieldId
   */
  public function setContext(GooglePrivacyDlpV2FieldId $context)
  {
    $this->context = $context;
  }
  /**
   * @return GooglePrivacyDlpV2FieldId
   */
  public function getContext()
  {
    return $this->context;
  }
  /**
   * @param GooglePrivacyDlpV2CryptoKey
   */
  public function setCryptoKey(GooglePrivacyDlpV2CryptoKey $cryptoKey)
  {
    $this->cryptoKey = $cryptoKey;
  }
  /**
   * @return GooglePrivacyDlpV2CryptoKey
   */
  public function getCryptoKey()
  {
    return $this->cryptoKey;
  }
  public function setLowerBoundDays($lowerBoundDays)
  {
    $this->lowerBoundDays = $lowerBoundDays;
  }
  public function getLowerBoundDays()
  {
    return $this->lowerBoundDays;
  }
  public function setUpperBoundDays($upperBoundDays)
  {
    $this->upperBoundDays = $upperBoundDays;
  }
  public function getUpperBoundDays()
  {
    return $this->upperBoundDays;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2DateShiftConfig::class, 'Google_Service_DLP_GooglePrivacyDlpV2DateShiftConfig');
