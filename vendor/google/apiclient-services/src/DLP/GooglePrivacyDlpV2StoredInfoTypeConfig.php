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

class GooglePrivacyDlpV2StoredInfoTypeConfig extends \Google\Model
{
  public $description;
  protected $dictionaryType = GooglePrivacyDlpV2Dictionary::class;
  protected $dictionaryDataType = '';
  public $displayName;
  protected $largeCustomDictionaryType = GooglePrivacyDlpV2LargeCustomDictionaryConfig::class;
  protected $largeCustomDictionaryDataType = '';
  protected $regexType = GooglePrivacyDlpV2Regex::class;
  protected $regexDataType = '';

  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param GooglePrivacyDlpV2Dictionary
   */
  public function setDictionary(GooglePrivacyDlpV2Dictionary $dictionary)
  {
    $this->dictionary = $dictionary;
  }
  /**
   * @return GooglePrivacyDlpV2Dictionary
   */
  public function getDictionary()
  {
    return $this->dictionary;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param GooglePrivacyDlpV2LargeCustomDictionaryConfig
   */
  public function setLargeCustomDictionary(GooglePrivacyDlpV2LargeCustomDictionaryConfig $largeCustomDictionary)
  {
    $this->largeCustomDictionary = $largeCustomDictionary;
  }
  /**
   * @return GooglePrivacyDlpV2LargeCustomDictionaryConfig
   */
  public function getLargeCustomDictionary()
  {
    return $this->largeCustomDictionary;
  }
  /**
   * @param GooglePrivacyDlpV2Regex
   */
  public function setRegex(GooglePrivacyDlpV2Regex $regex)
  {
    $this->regex = $regex;
  }
  /**
   * @return GooglePrivacyDlpV2Regex
   */
  public function getRegex()
  {
    return $this->regex;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2StoredInfoTypeConfig::class, 'Google_Service_DLP_GooglePrivacyDlpV2StoredInfoTypeConfig');
