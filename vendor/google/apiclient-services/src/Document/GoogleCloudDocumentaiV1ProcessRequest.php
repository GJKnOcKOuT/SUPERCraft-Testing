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

class GoogleCloudDocumentaiV1ProcessRequest extends \Google\Model
{
  protected $inlineDocumentType = GoogleCloudDocumentaiV1Document::class;
  protected $inlineDocumentDataType = '';
  protected $rawDocumentType = GoogleCloudDocumentaiV1RawDocument::class;
  protected $rawDocumentDataType = '';
  public $skipHumanReview;

  /**
   * @param GoogleCloudDocumentaiV1Document
   */
  public function setInlineDocument(GoogleCloudDocumentaiV1Document $inlineDocument)
  {
    $this->inlineDocument = $inlineDocument;
  }
  /**
   * @return GoogleCloudDocumentaiV1Document
   */
  public function getInlineDocument()
  {
    return $this->inlineDocument;
  }
  /**
   * @param GoogleCloudDocumentaiV1RawDocument
   */
  public function setRawDocument(GoogleCloudDocumentaiV1RawDocument $rawDocument)
  {
    $this->rawDocument = $rawDocument;
  }
  /**
   * @return GoogleCloudDocumentaiV1RawDocument
   */
  public function getRawDocument()
  {
    return $this->rawDocument;
  }
  public function setSkipHumanReview($skipHumanReview)
  {
    $this->skipHumanReview = $skipHumanReview;
  }
  public function getSkipHumanReview()
  {
    return $this->skipHumanReview;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDocumentaiV1ProcessRequest::class, 'Google_Service_Document_GoogleCloudDocumentaiV1ProcessRequest');
