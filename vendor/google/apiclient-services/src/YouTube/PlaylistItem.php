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

class PlaylistItem extends \Google\Model
{
  protected $contentDetailsType = PlaylistItemContentDetails::class;
  protected $contentDetailsDataType = '';
  public $etag;
  public $id;
  public $kind;
  protected $snippetType = PlaylistItemSnippet::class;
  protected $snippetDataType = '';
  protected $statusType = PlaylistItemStatus::class;
  protected $statusDataType = '';

  /**
   * @param PlaylistItemContentDetails
   */
  public function setContentDetails(PlaylistItemContentDetails $contentDetails)
  {
    $this->contentDetails = $contentDetails;
  }
  /**
   * @return PlaylistItemContentDetails
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
   * @param PlaylistItemSnippet
   */
  public function setSnippet(PlaylistItemSnippet $snippet)
  {
    $this->snippet = $snippet;
  }
  /**
   * @return PlaylistItemSnippet
   */
  public function getSnippet()
  {
    return $this->snippet;
  }
  /**
   * @param PlaylistItemStatus
   */
  public function setStatus(PlaylistItemStatus $status)
  {
    $this->status = $status;
  }
  /**
   * @return PlaylistItemStatus
   */
  public function getStatus()
  {
    return $this->status;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PlaylistItem::class, 'Google_Service_YouTube_PlaylistItem');