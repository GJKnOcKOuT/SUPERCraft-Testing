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

class GeolayerdataCommon extends \Google\Model
{
  public $lang;
  public $previewImageUrl;
  public $snippet;
  public $snippetUrl;
  public $title;

  public function setLang($lang)
  {
    $this->lang = $lang;
  }
  public function getLang()
  {
    return $this->lang;
  }
  public function setPreviewImageUrl($previewImageUrl)
  {
    $this->previewImageUrl = $previewImageUrl;
  }
  public function getPreviewImageUrl()
  {
    return $this->previewImageUrl;
  }
  public function setSnippet($snippet)
  {
    $this->snippet = $snippet;
  }
  public function getSnippet()
  {
    return $this->snippet;
  }
  public function setSnippetUrl($snippetUrl)
  {
    $this->snippetUrl = $snippetUrl;
  }
  public function getSnippetUrl()
  {
    return $this->snippetUrl;
  }
  public function setTitle($title)
  {
    $this->title = $title;
  }
  public function getTitle()
  {
    return $this->title;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GeolayerdataCommon::class, 'Google_Service_Books_GeolayerdataCommon');
