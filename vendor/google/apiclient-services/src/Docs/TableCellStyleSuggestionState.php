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

namespace Google\Service\Docs;

class TableCellStyleSuggestionState extends \Google\Model
{
  public $backgroundColorSuggested;
  public $borderBottomSuggested;
  public $borderLeftSuggested;
  public $borderRightSuggested;
  public $borderTopSuggested;
  public $columnSpanSuggested;
  public $contentAlignmentSuggested;
  public $paddingBottomSuggested;
  public $paddingLeftSuggested;
  public $paddingRightSuggested;
  public $paddingTopSuggested;
  public $rowSpanSuggested;

  public function setBackgroundColorSuggested($backgroundColorSuggested)
  {
    $this->backgroundColorSuggested = $backgroundColorSuggested;
  }
  public function getBackgroundColorSuggested()
  {
    return $this->backgroundColorSuggested;
  }
  public function setBorderBottomSuggested($borderBottomSuggested)
  {
    $this->borderBottomSuggested = $borderBottomSuggested;
  }
  public function getBorderBottomSuggested()
  {
    return $this->borderBottomSuggested;
  }
  public function setBorderLeftSuggested($borderLeftSuggested)
  {
    $this->borderLeftSuggested = $borderLeftSuggested;
  }
  public function getBorderLeftSuggested()
  {
    return $this->borderLeftSuggested;
  }
  public function setBorderRightSuggested($borderRightSuggested)
  {
    $this->borderRightSuggested = $borderRightSuggested;
  }
  public function getBorderRightSuggested()
  {
    return $this->borderRightSuggested;
  }
  public function setBorderTopSuggested($borderTopSuggested)
  {
    $this->borderTopSuggested = $borderTopSuggested;
  }
  public function getBorderTopSuggested()
  {
    return $this->borderTopSuggested;
  }
  public function setColumnSpanSuggested($columnSpanSuggested)
  {
    $this->columnSpanSuggested = $columnSpanSuggested;
  }
  public function getColumnSpanSuggested()
  {
    return $this->columnSpanSuggested;
  }
  public function setContentAlignmentSuggested($contentAlignmentSuggested)
  {
    $this->contentAlignmentSuggested = $contentAlignmentSuggested;
  }
  public function getContentAlignmentSuggested()
  {
    return $this->contentAlignmentSuggested;
  }
  public function setPaddingBottomSuggested($paddingBottomSuggested)
  {
    $this->paddingBottomSuggested = $paddingBottomSuggested;
  }
  public function getPaddingBottomSuggested()
  {
    return $this->paddingBottomSuggested;
  }
  public function setPaddingLeftSuggested($paddingLeftSuggested)
  {
    $this->paddingLeftSuggested = $paddingLeftSuggested;
  }
  public function getPaddingLeftSuggested()
  {
    return $this->paddingLeftSuggested;
  }
  public function setPaddingRightSuggested($paddingRightSuggested)
  {
    $this->paddingRightSuggested = $paddingRightSuggested;
  }
  public function getPaddingRightSuggested()
  {
    return $this->paddingRightSuggested;
  }
  public function setPaddingTopSuggested($paddingTopSuggested)
  {
    $this->paddingTopSuggested = $paddingTopSuggested;
  }
  public function getPaddingTopSuggested()
  {
    return $this->paddingTopSuggested;
  }
  public function setRowSpanSuggested($rowSpanSuggested)
  {
    $this->rowSpanSuggested = $rowSpanSuggested;
  }
  public function getRowSpanSuggested()
  {
    return $this->rowSpanSuggested;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TableCellStyleSuggestionState::class, 'Google_Service_Docs_TableCellStyleSuggestionState');
