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

namespace Google\Service\Slides;

class Presentation extends \Google\Collection
{
  protected $collection_key = 'slides';
  protected $layoutsType = Page::class;
  protected $layoutsDataType = 'array';
  public $locale;
  protected $mastersType = Page::class;
  protected $mastersDataType = 'array';
  protected $notesMasterType = Page::class;
  protected $notesMasterDataType = '';
  protected $pageSizeType = Size::class;
  protected $pageSizeDataType = '';
  public $presentationId;
  public $revisionId;
  protected $slidesType = Page::class;
  protected $slidesDataType = 'array';
  public $title;

  /**
   * @param Page[]
   */
  public function setLayouts($layouts)
  {
    $this->layouts = $layouts;
  }
  /**
   * @return Page[]
   */
  public function getLayouts()
  {
    return $this->layouts;
  }
  public function setLocale($locale)
  {
    $this->locale = $locale;
  }
  public function getLocale()
  {
    return $this->locale;
  }
  /**
   * @param Page[]
   */
  public function setMasters($masters)
  {
    $this->masters = $masters;
  }
  /**
   * @return Page[]
   */
  public function getMasters()
  {
    return $this->masters;
  }
  /**
   * @param Page
   */
  public function setNotesMaster(Page $notesMaster)
  {
    $this->notesMaster = $notesMaster;
  }
  /**
   * @return Page
   */
  public function getNotesMaster()
  {
    return $this->notesMaster;
  }
  /**
   * @param Size
   */
  public function setPageSize(Size $pageSize)
  {
    $this->pageSize = $pageSize;
  }
  /**
   * @return Size
   */
  public function getPageSize()
  {
    return $this->pageSize;
  }
  public function setPresentationId($presentationId)
  {
    $this->presentationId = $presentationId;
  }
  public function getPresentationId()
  {
    return $this->presentationId;
  }
  public function setRevisionId($revisionId)
  {
    $this->revisionId = $revisionId;
  }
  public function getRevisionId()
  {
    return $this->revisionId;
  }
  /**
   * @param Page[]
   */
  public function setSlides($slides)
  {
    $this->slides = $slides;
  }
  /**
   * @return Page[]
   */
  public function getSlides()
  {
    return $this->slides;
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
class_alias(Presentation::class, 'Google_Service_Slides_Presentation');
