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

class NestingLevel extends \Google\Model
{
  public $bulletAlignment;
  public $glyphFormat;
  public $glyphSymbol;
  public $glyphType;
  protected $indentFirstLineType = Dimension::class;
  protected $indentFirstLineDataType = '';
  protected $indentStartType = Dimension::class;
  protected $indentStartDataType = '';
  public $startNumber;
  protected $textStyleType = TextStyle::class;
  protected $textStyleDataType = '';

  public function setBulletAlignment($bulletAlignment)
  {
    $this->bulletAlignment = $bulletAlignment;
  }
  public function getBulletAlignment()
  {
    return $this->bulletAlignment;
  }
  public function setGlyphFormat($glyphFormat)
  {
    $this->glyphFormat = $glyphFormat;
  }
  public function getGlyphFormat()
  {
    return $this->glyphFormat;
  }
  public function setGlyphSymbol($glyphSymbol)
  {
    $this->glyphSymbol = $glyphSymbol;
  }
  public function getGlyphSymbol()
  {
    return $this->glyphSymbol;
  }
  public function setGlyphType($glyphType)
  {
    $this->glyphType = $glyphType;
  }
  public function getGlyphType()
  {
    return $this->glyphType;
  }
  /**
   * @param Dimension
   */
  public function setIndentFirstLine(Dimension $indentFirstLine)
  {
    $this->indentFirstLine = $indentFirstLine;
  }
  /**
   * @return Dimension
   */
  public function getIndentFirstLine()
  {
    return $this->indentFirstLine;
  }
  /**
   * @param Dimension
   */
  public function setIndentStart(Dimension $indentStart)
  {
    $this->indentStart = $indentStart;
  }
  /**
   * @return Dimension
   */
  public function getIndentStart()
  {
    return $this->indentStart;
  }
  public function setStartNumber($startNumber)
  {
    $this->startNumber = $startNumber;
  }
  public function getStartNumber()
  {
    return $this->startNumber;
  }
  /**
   * @param TextStyle
   */
  public function setTextStyle(TextStyle $textStyle)
  {
    $this->textStyle = $textStyle;
  }
  /**
   * @return TextStyle
   */
  public function getTextStyle()
  {
    return $this->textStyle;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(NestingLevel::class, 'Google_Service_Docs_NestingLevel');
