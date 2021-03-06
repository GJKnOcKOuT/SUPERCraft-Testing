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

namespace Google\Service\Sheets;

class BatchUpdateValuesByDataFilterRequest extends \Google\Collection
{
  protected $collection_key = 'data';
  protected $dataType = DataFilterValueRange::class;
  protected $dataDataType = 'array';
  public $includeValuesInResponse;
  public $responseDateTimeRenderOption;
  public $responseValueRenderOption;
  public $valueInputOption;

  /**
   * @param DataFilterValueRange[]
   */
  public function setData($data)
  {
    $this->data = $data;
  }
  /**
   * @return DataFilterValueRange[]
   */
  public function getData()
  {
    return $this->data;
  }
  public function setIncludeValuesInResponse($includeValuesInResponse)
  {
    $this->includeValuesInResponse = $includeValuesInResponse;
  }
  public function getIncludeValuesInResponse()
  {
    return $this->includeValuesInResponse;
  }
  public function setResponseDateTimeRenderOption($responseDateTimeRenderOption)
  {
    $this->responseDateTimeRenderOption = $responseDateTimeRenderOption;
  }
  public function getResponseDateTimeRenderOption()
  {
    return $this->responseDateTimeRenderOption;
  }
  public function setResponseValueRenderOption($responseValueRenderOption)
  {
    $this->responseValueRenderOption = $responseValueRenderOption;
  }
  public function getResponseValueRenderOption()
  {
    return $this->responseValueRenderOption;
  }
  public function setValueInputOption($valueInputOption)
  {
    $this->valueInputOption = $valueInputOption;
  }
  public function getValueInputOption()
  {
    return $this->valueInputOption;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BatchUpdateValuesByDataFilterRequest::class, 'Google_Service_Sheets_BatchUpdateValuesByDataFilterRequest');
