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

class DiscoveryclustersClustersBannerWithContentContainer extends \Google\Model
{
  public $fillColorArgb;
  public $imageUrl;
  public $maskColorArgb;
  public $moreButtonText;
  public $moreButtonUrl;
  public $textColorArgb;

  public function setFillColorArgb($fillColorArgb)
  {
    $this->fillColorArgb = $fillColorArgb;
  }
  public function getFillColorArgb()
  {
    return $this->fillColorArgb;
  }
  public function setImageUrl($imageUrl)
  {
    $this->imageUrl = $imageUrl;
  }
  public function getImageUrl()
  {
    return $this->imageUrl;
  }
  public function setMaskColorArgb($maskColorArgb)
  {
    $this->maskColorArgb = $maskColorArgb;
  }
  public function getMaskColorArgb()
  {
    return $this->maskColorArgb;
  }
  public function setMoreButtonText($moreButtonText)
  {
    $this->moreButtonText = $moreButtonText;
  }
  public function getMoreButtonText()
  {
    return $this->moreButtonText;
  }
  public function setMoreButtonUrl($moreButtonUrl)
  {
    $this->moreButtonUrl = $moreButtonUrl;
  }
  public function getMoreButtonUrl()
  {
    return $this->moreButtonUrl;
  }
  public function setTextColorArgb($textColorArgb)
  {
    $this->textColorArgb = $textColorArgb;
  }
  public function getTextColorArgb()
  {
    return $this->textColorArgb;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DiscoveryclustersClustersBannerWithContentContainer::class, 'Google_Service_Books_DiscoveryclustersClustersBannerWithContentContainer');
