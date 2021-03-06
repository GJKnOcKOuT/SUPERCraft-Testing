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

class GooglePrivacyDlpV2ContentLocation extends \Google\Model
{
  public $containerName;
  public $containerTimestamp;
  public $containerVersion;
  protected $documentLocationType = GooglePrivacyDlpV2DocumentLocation::class;
  protected $documentLocationDataType = '';
  protected $imageLocationType = GooglePrivacyDlpV2ImageLocation::class;
  protected $imageLocationDataType = '';
  protected $metadataLocationType = GooglePrivacyDlpV2MetadataLocation::class;
  protected $metadataLocationDataType = '';
  protected $recordLocationType = GooglePrivacyDlpV2RecordLocation::class;
  protected $recordLocationDataType = '';

  public function setContainerName($containerName)
  {
    $this->containerName = $containerName;
  }
  public function getContainerName()
  {
    return $this->containerName;
  }
  public function setContainerTimestamp($containerTimestamp)
  {
    $this->containerTimestamp = $containerTimestamp;
  }
  public function getContainerTimestamp()
  {
    return $this->containerTimestamp;
  }
  public function setContainerVersion($containerVersion)
  {
    $this->containerVersion = $containerVersion;
  }
  public function getContainerVersion()
  {
    return $this->containerVersion;
  }
  /**
   * @param GooglePrivacyDlpV2DocumentLocation
   */
  public function setDocumentLocation(GooglePrivacyDlpV2DocumentLocation $documentLocation)
  {
    $this->documentLocation = $documentLocation;
  }
  /**
   * @return GooglePrivacyDlpV2DocumentLocation
   */
  public function getDocumentLocation()
  {
    return $this->documentLocation;
  }
  /**
   * @param GooglePrivacyDlpV2ImageLocation
   */
  public function setImageLocation(GooglePrivacyDlpV2ImageLocation $imageLocation)
  {
    $this->imageLocation = $imageLocation;
  }
  /**
   * @return GooglePrivacyDlpV2ImageLocation
   */
  public function getImageLocation()
  {
    return $this->imageLocation;
  }
  /**
   * @param GooglePrivacyDlpV2MetadataLocation
   */
  public function setMetadataLocation(GooglePrivacyDlpV2MetadataLocation $metadataLocation)
  {
    $this->metadataLocation = $metadataLocation;
  }
  /**
   * @return GooglePrivacyDlpV2MetadataLocation
   */
  public function getMetadataLocation()
  {
    return $this->metadataLocation;
  }
  /**
   * @param GooglePrivacyDlpV2RecordLocation
   */
  public function setRecordLocation(GooglePrivacyDlpV2RecordLocation $recordLocation)
  {
    $this->recordLocation = $recordLocation;
  }
  /**
   * @return GooglePrivacyDlpV2RecordLocation
   */
  public function getRecordLocation()
  {
    return $this->recordLocation;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GooglePrivacyDlpV2ContentLocation::class, 'Google_Service_DLP_GooglePrivacyDlpV2ContentLocation');
