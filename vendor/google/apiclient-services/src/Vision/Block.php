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

namespace Google\Service\Vision;

class Block extends \Google\Collection
{
  protected $collection_key = 'paragraphs';
  public $blockType;
  protected $boundingBoxType = BoundingPoly::class;
  protected $boundingBoxDataType = '';
  public $confidence;
  protected $paragraphsType = Paragraph::class;
  protected $paragraphsDataType = 'array';
  protected $propertyType = TextProperty::class;
  protected $propertyDataType = '';

  public function setBlockType($blockType)
  {
    $this->blockType = $blockType;
  }
  public function getBlockType()
  {
    return $this->blockType;
  }
  /**
   * @param BoundingPoly
   */
  public function setBoundingBox(BoundingPoly $boundingBox)
  {
    $this->boundingBox = $boundingBox;
  }
  /**
   * @return BoundingPoly
   */
  public function getBoundingBox()
  {
    return $this->boundingBox;
  }
  public function setConfidence($confidence)
  {
    $this->confidence = $confidence;
  }
  public function getConfidence()
  {
    return $this->confidence;
  }
  /**
   * @param Paragraph[]
   */
  public function setParagraphs($paragraphs)
  {
    $this->paragraphs = $paragraphs;
  }
  /**
   * @return Paragraph[]
   */
  public function getParagraphs()
  {
    return $this->paragraphs;
  }
  /**
   * @param TextProperty
   */
  public function setProperty(TextProperty $property)
  {
    $this->property = $property;
  }
  /**
   * @return TextProperty
   */
  public function getProperty()
  {
    return $this->property;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Block::class, 'Google_Service_Vision_Block');