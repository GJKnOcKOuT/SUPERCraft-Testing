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

namespace Google\Service\CloudAsset;

class SoftwarePackage extends \Google\Model
{
  protected $aptPackageType = VersionedPackage::class;
  protected $aptPackageDataType = '';
  protected $cosPackageType = VersionedPackage::class;
  protected $cosPackageDataType = '';
  protected $googetPackageType = VersionedPackage::class;
  protected $googetPackageDataType = '';
  protected $qfePackageType = WindowsQuickFixEngineeringPackage::class;
  protected $qfePackageDataType = '';
  protected $wuaPackageType = WindowsUpdatePackage::class;
  protected $wuaPackageDataType = '';
  protected $yumPackageType = VersionedPackage::class;
  protected $yumPackageDataType = '';
  protected $zypperPackageType = VersionedPackage::class;
  protected $zypperPackageDataType = '';
  protected $zypperPatchType = ZypperPatch::class;
  protected $zypperPatchDataType = '';

  /**
   * @param VersionedPackage
   */
  public function setAptPackage(VersionedPackage $aptPackage)
  {
    $this->aptPackage = $aptPackage;
  }
  /**
   * @return VersionedPackage
   */
  public function getAptPackage()
  {
    return $this->aptPackage;
  }
  /**
   * @param VersionedPackage
   */
  public function setCosPackage(VersionedPackage $cosPackage)
  {
    $this->cosPackage = $cosPackage;
  }
  /**
   * @return VersionedPackage
   */
  public function getCosPackage()
  {
    return $this->cosPackage;
  }
  /**
   * @param VersionedPackage
   */
  public function setGoogetPackage(VersionedPackage $googetPackage)
  {
    $this->googetPackage = $googetPackage;
  }
  /**
   * @return VersionedPackage
   */
  public function getGoogetPackage()
  {
    return $this->googetPackage;
  }
  /**
   * @param WindowsQuickFixEngineeringPackage
   */
  public function setQfePackage(WindowsQuickFixEngineeringPackage $qfePackage)
  {
    $this->qfePackage = $qfePackage;
  }
  /**
   * @return WindowsQuickFixEngineeringPackage
   */
  public function getQfePackage()
  {
    return $this->qfePackage;
  }
  /**
   * @param WindowsUpdatePackage
   */
  public function setWuaPackage(WindowsUpdatePackage $wuaPackage)
  {
    $this->wuaPackage = $wuaPackage;
  }
  /**
   * @return WindowsUpdatePackage
   */
  public function getWuaPackage()
  {
    return $this->wuaPackage;
  }
  /**
   * @param VersionedPackage
   */
  public function setYumPackage(VersionedPackage $yumPackage)
  {
    $this->yumPackage = $yumPackage;
  }
  /**
   * @return VersionedPackage
   */
  public function getYumPackage()
  {
    return $this->yumPackage;
  }
  /**
   * @param VersionedPackage
   */
  public function setZypperPackage(VersionedPackage $zypperPackage)
  {
    $this->zypperPackage = $zypperPackage;
  }
  /**
   * @return VersionedPackage
   */
  public function getZypperPackage()
  {
    return $this->zypperPackage;
  }
  /**
   * @param ZypperPatch
   */
  public function setZypperPatch(ZypperPatch $zypperPatch)
  {
    $this->zypperPatch = $zypperPatch;
  }
  /**
   * @return ZypperPatch
   */
  public function getZypperPatch()
  {
    return $this->zypperPatch;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(SoftwarePackage::class, 'Google_Service_CloudAsset_SoftwarePackage');
