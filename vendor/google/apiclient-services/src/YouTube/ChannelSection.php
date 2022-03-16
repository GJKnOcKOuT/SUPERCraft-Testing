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

namespace Google\Service\YouTube;

class ChannelSection extends \Google\Model
{
  protected $contentDetailsType = ChannelSectionContentDetails::class;
  protected $contentDetailsDataType = '';
  public $etag;
  public $id;
  public $kind;
  protected $localizationsType = ChannelSectionLocalization::class;
  protected $localizationsDataType = 'map';
  protected $snippetType = ChannelSectionSnippet::class;
  protected $snippetDataType = '';
  protected $targetingType = ChannelSectionTargeting::class;
  protected $targetingDataType = '';

  /**
   * @param ChannelSectionContentDetails
   */
  public function setContentDetails(ChannelSectionContentDetails $contentDetails)
  {
    $this->contentDetails = $contentDetails;
  }
  /**
   * @return ChannelSectionContentDetails
   */
  public function getContentDetails()
  {
    return $this->contentDetails;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param ChannelSectionLocalization[]
   */
  public function setLocalizations($localizations)
  {
    $this->localizations = $localizations;
  }
  /**
   * @return ChannelSectionLocalization[]
   */
  public function getLocalizations()
  {
    return $this->localizations;
  }
  /**
   * @param ChannelSectionSnippet
   */
  public function setSnippet(ChannelSectionSnippet $snippet)
  {
    $this->snippet = $snippet;
  }
  /**
   * @return ChannelSectionSnippet
   */
  public function getSnippet()
  {
    return $this->snippet;
  }
  /**
   * @param ChannelSectionTargeting
   */
  public function setTargeting(ChannelSectionTargeting $targeting)
  {
    $this->targeting = $targeting;
  }
  /**
   * @return ChannelSectionTargeting
   */
  public function getTargeting()
  {
    return $this->targeting;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ChannelSection::class, 'Google_Service_YouTube_ChannelSection');
