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

namespace Google\Service\Testing;

class IosTestSetup extends \Google\Collection
{
  protected $collection_key = 'pushFiles';
  protected $additionalIpasType = FileReference::class;
  protected $additionalIpasDataType = 'array';
  public $networkProfile;
  protected $pullDirectoriesType = IosDeviceFile::class;
  protected $pullDirectoriesDataType = 'array';
  protected $pushFilesType = IosDeviceFile::class;
  protected $pushFilesDataType = 'array';

  /**
   * @param FileReference[]
   */
  public function setAdditionalIpas($additionalIpas)
  {
    $this->additionalIpas = $additionalIpas;
  }
  /**
   * @return FileReference[]
   */
  public function getAdditionalIpas()
  {
    return $this->additionalIpas;
  }
  public function setNetworkProfile($networkProfile)
  {
    $this->networkProfile = $networkProfile;
  }
  public function getNetworkProfile()
  {
    return $this->networkProfile;
  }
  /**
   * @param IosDeviceFile[]
   */
  public function setPullDirectories($pullDirectories)
  {
    $this->pullDirectories = $pullDirectories;
  }
  /**
   * @return IosDeviceFile[]
   */
  public function getPullDirectories()
  {
    return $this->pullDirectories;
  }
  /**
   * @param IosDeviceFile[]
   */
  public function setPushFiles($pushFiles)
  {
    $this->pushFiles = $pushFiles;
  }
  /**
   * @return IosDeviceFile[]
   */
  public function getPushFiles()
  {
    return $this->pushFiles;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IosTestSetup::class, 'Google_Service_Testing_IosTestSetup');