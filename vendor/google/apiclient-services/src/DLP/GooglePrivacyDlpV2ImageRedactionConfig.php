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

class GooglePrivacyDlpV2ImageRedactionConfig extends \Google\Model
{
  protected $infoTypeType = GooglePrivacyDlpV2InfoType::class;
  protected $infoTypeDataType = '';
  public $redactAllText;
  protected $redactionColorType = GooglePrivacyDlpV2Color::class;
  protected $redactionColorDataType = '';

  /**
   * @param GooglePrivacyDlpV2InfoType
   */
  public function setInfoType(GooglePrivacyDlpV2InfoType $infoType)
  {
    $this->infoType = $infoType;
  }
  /**
   * @return GooglePrivacyDlpV2InfoType
   */
  public function getInfoType()
  {
    return $this->infoType;
  }
  public function setRedactAllText($redactAllText)
  {
    $this->redactAllText = $redactAllText;
  }
  public function getRedactAllText()
  {
    return $this->redactAllText;
  }
  /**
   * @param GooglePrivacyDlpV2Color
   */
  public function setRedactionColor(GooglePrivacyDlpV2Color $redactionColor)
  {
    $this->redactionColor = $redactionColor;
  }
  /**
   * @return GooglePrivacyDlpV2Color
   */
  public function getRedactionColor()
  {
    return $this->redactionColor;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2ImageRedactionConfig::class, 'Google_Service_DLP_GooglePrivacyDlpV2ImageRedactionConfig');
