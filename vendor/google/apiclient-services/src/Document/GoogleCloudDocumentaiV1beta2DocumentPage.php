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

class GoogleCloudDocumentaiV1beta2DocumentPage extends \Google\Collection
{
  protected $collection_key = 'visualElements';
  protected $blocksType = GoogleCloudDocumentaiV1beta2DocumentPageBlock::class;
  protected $blocksDataType = 'array';
  protected $detectedLanguagesType = GoogleCloudDocumentaiV1beta2DocumentPageDetectedLanguage::class;
  protected $detectedLanguagesDataType = 'array';
  protected $dimensionType = GoogleCloudDocumentaiV1beta2DocumentPageDimension::class;
  protected $dimensionDataType = '';
  protected $formFieldsType = GoogleCloudDocumentaiV1beta2DocumentPageFormField::class;
  protected $formFieldsDataType = 'array';
  protected $imageType = GoogleCloudDocumentaiV1beta2DocumentPageImage::class;
  protected $imageDataType = '';
  protected $layoutType = GoogleCloudDocumentaiV1beta2DocumentPageLayout::class;
  protected $layoutDataType = '';
  protected $linesType = GoogleCloudDocumentaiV1beta2DocumentPageLine::class;
  protected $linesDataType = 'array';
  public $pageNumber;
  protected $paragraphsType = GoogleCloudDocumentaiV1beta2DocumentPageParagraph::class;
  protected $paragraphsDataType = 'array';
  protected $provenanceType = GoogleCloudDocumentaiV1beta2DocumentProvenance::class;
  protected $provenanceDataType = '';
  protected $tablesType = GoogleCloudDocumentaiV1beta2DocumentPageTable::class;
  protected $tablesDataType = 'array';
  protected $tokensType = GoogleCloudDocumentaiV1beta2DocumentPageToken::class;
  protected $tokensDataType = 'array';
  protected $transformsType = GoogleCloudDocumentaiV1beta2DocumentPageMatrix::class;
  protected $transformsDataType = 'array';
  protected $visualElementsType = GoogleCloudDocumentaiV1beta2DocumentPageVisualElement::class;
  protected $visualElementsDataType = 'array';

  /**
   * @param GoogleCloudDocumentaiV1beta2DocumentPageBlock[]
   */
  public function setBlocks($blocks)
  {
    $this->blocks = $blocks;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta2DocumentPageBlock[]
   */
  public function getBlocks()
  {
    return $this->blocks;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta2DocumentPageDetectedLanguage[]
   */
  public function setDetectedLanguages($detectedLanguages)
  {
    $this->detectedLanguages = $detectedLanguages;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta2DocumentPageDetectedLanguage[]
   */
  public function getDetectedLanguages()
  {
    return $this->detectedLanguages;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta2DocumentPageDimension
   */
  public function setDimension(GoogleCloudDocumentaiV1beta2DocumentPageDimension $dimension)
  {
    $this->dimension = $dimension;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta2DocumentPageDimension
   */
  public function getDimension()
  {
    return $this->dimension;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta2DocumentPageFormField[]
   */
  public function setFormFields($formFields)
  {
    $this->formFields = $formFields;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta2DocumentPageFormField[]
   */
  public function getFormFields()
  {
    return $this->formFields;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta2DocumentPageImage
   */
  public function setImage(GoogleCloudDocumentaiV1beta2DocumentPageImage $image)
  {
    $this->image = $image;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta2DocumentPageImage
   */
  public function getImage()
  {
    return $this->image;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta2DocumentPageLayout
   */
  public function setLayout(GoogleCloudDocumentaiV1beta2DocumentPageLayout $layout)
  {
    $this->layout = $layout;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta2DocumentPageLayout
   */
  public function getLayout()
  {
    return $this->layout;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta2DocumentPageLine[]
   */
  public function setLines($lines)
  {
    $this->lines = $lines;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta2DocumentPageLine[]
   */
  public function getLines()
  {
    return $this->lines;
  }
  public function setPageNumber($pageNumber)
  {
    $this->pageNumber = $pageNumber;
  }
  public function getPageNumber()
  {
    return $this->pageNumber;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta2DocumentPageParagraph[]
   */
  public function setParagraphs($paragraphs)
  {
    $this->paragraphs = $paragraphs;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta2DocumentPageParagraph[]
   */
  public function getParagraphs()
  {
    return $this->paragraphs;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta2DocumentProvenance
   */
  public function setProvenance(GoogleCloudDocumentaiV1beta2DocumentProvenance $provenance)
  {
    $this->provenance = $provenance;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta2DocumentProvenance
   */
  public function getProvenance()
  {
    return $this->provenance;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta2DocumentPageTable[]
   */
  public function setTables($tables)
  {
    $this->tables = $tables;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta2DocumentPageTable[]
   */
  public function getTables()
  {
    return $this->tables;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta2DocumentPageToken[]
   */
  public function setTokens($tokens)
  {
    $this->tokens = $tokens;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta2DocumentPageToken[]
   */
  public function getTokens()
  {
    return $this->tokens;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta2DocumentPageMatrix[]
   */
  public function setTransforms($transforms)
  {
    $this->transforms = $transforms;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta2DocumentPageMatrix[]
   */
  public function getTransforms()
  {
    return $this->transforms;
  }
  /**
   * @param GoogleCloudDocumentaiV1beta2DocumentPageVisualElement[]
   */
  public function setVisualElements($visualElements)
  {
    $this->visualElements = $visualElements;
  }
  /**
   * @return GoogleCloudDocumentaiV1beta2DocumentPageVisualElement[]
   */
  public function getVisualElements()
  {
    return $this->visualElements;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDocumentaiV1beta2DocumentPage::class, 'Google_Service_Document_GoogleCloudDocumentaiV1beta2DocumentPage');
