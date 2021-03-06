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

namespace Google\Service\Document;

class GoogleCloudDocumentaiV1beta1DocumentStyle extends \Google\Model
{
  protected $backgroundColorType = GoogleTypeColor::class;
  protected $backgroundColorDataType = '';
  protected $colorType = GoogleTypeColor::class;
  protected $colorDataType = '';
  protected $fontSizeType = GoogleCloudDocumentaiV1beta1DocumentStyleFontSize::class;
  protected $fontSizeDataType = '';
  public $fontWeight;
  protected $textAnchorType = GoogleCloudDocumentaiV1beta1DocumentTextAnchor::class;
  protected $textAnchorDataType = '';
  public $textDecoration;
  public $textStyle;

  /**
   * @param GoogleTypeColor
   */
  public function setBackgroundColor(GoogleTypeColor $backgroundColor)
  {
    $this->backgroundColor = $backgroundColor;
  }
  /**
   * @return GoogleTypeColor
   */
  public function getBackgroundColor()
  {
    return $this->backgroundColor;
  }
  /**
   * @param GoogleTypeColor
   */
  public function setColor(GoogleTypeColor $color)
  {
    $this->color = $color;
  }
  /**
   * @return GoogleTypeColor
   */
  public function getColor()
  {
    return $this->color;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta1DocumentStyleFontSize
   */
  public function setFontSize(GoogleCloudDocumentaiV1beta1DocumentStyleFontSize $fontSize)
  {
    $this->fontSize = $fontSize;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta1DocumentStyleFontSize
   */
  public function getFontSize()
  {
    return $this->fontSize;
  }
  public function setFontWeight($fontWeight)
  {
    $this->fontWeight = $fontWeight;
  }
  public function getFontWeight()
  {
    return $this->fontWeight;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta1DocumentTextAnchor
   */
  public function setTextAnchor(GoogleCloudDocumentaiV1beta1DocumentTextAnchor $textAnchor)
  {
    $this->textAnchor = $textAnchor;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta1DocumentTextAnchor
   */
  public function getTextAnchor()
  {
    return $this->textAnchor;
  }
  public function setTextDecoration($textDecoration)
  {
    $this->textDecoration = $textDecoration;
  }
  public function getTextDecoration()
  {
    return $this->textDecoration;
  }
  public function setTextStyle($textStyle)
  {
    $this->textStyle = $textStyle;
  }
  public function getTextStyle()
  {
    return $this->textStyle;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDocumentaiV1beta1DocumentStyle::class, 'Google_Service_Document_GoogleCloudDocumentaiV1beta1DocumentStyle');
