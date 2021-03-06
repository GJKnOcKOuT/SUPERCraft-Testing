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

class DictlayerdataDictWordsSenses extends \Google\Collection
{
  protected $collection_key = 'synonyms';
  protected $conjugationsType = DictlayerdataDictWordsSensesConjugations::class;
  protected $conjugationsDataType = 'array';
  protected $definitionsType = DictlayerdataDictWordsSensesDefinitions::class;
  protected $definitionsDataType = 'array';
  public $partOfSpeech;
  public $pronunciation;
  public $pronunciationUrl;
  protected $sourceType = DictlayerdataDictWordsSensesSource::class;
  protected $sourceDataType = '';
  public $syllabification;
  protected $synonymsType = DictlayerdataDictWordsSensesSynonyms::class;
  protected $synonymsDataType = 'array';

  /**
   * @param DictlayerdataDictWordsSensesConjugations[]
   */
  public function setConjugations($conjugations)
  {
    $this->conjugations = $conjugations;
  }
  /**
   * @return DictlayerdataDictWordsSensesConjugations[]
   */
  public function getConjugations()
  {
    return $this->conjugations;
  }
  /**
   * @param DictlayerdataDictWordsSensesDefinitions[]
   */
  public function setDefinitions($definitions)
  {
    $this->definitions = $definitions;
  }
  /**
   * @return DictlayerdataDictWordsSensesDefinitions[]
   */
  public function getDefinitions()
  {
    return $this->definitions;
  }
  public function setPartOfSpeech($partOfSpeech)
  {
    $this->partOfSpeech = $partOfSpeech;
  }
  public function getPartOfSpeech()
  {
    return $this->partOfSpeech;
  }
  public function setPronunciation($pronunciation)
  {
    $this->pronunciation = $pronunciation;
  }
  public function getPronunciation()
  {
    return $this->pronunciation;
  }
  public function setPronunciationUrl($pronunciationUrl)
  {
    $this->pronunciationUrl = $pronunciationUrl;
  }
  public function getPronunciationUrl()
  {
    return $this->pronunciationUrl;
  }
  /**
   * @param DictlayerdataDictWordsSensesSource
   */
  public function setSource(DictlayerdataDictWordsSensesSource $source)
  {
    $this->source = $source;
  }
  /**
   * @return DictlayerdataDictWordsSensesSource
   */
  public function getSource()
  {
    return $this->source;
  }
  public function setSyllabification($syllabification)
  {
    $this->syllabification = $syllabification;
  }
  public function getSyllabification()
  {
    return $this->syllabification;
  }
  /**
   * @param DictlayerdataDictWordsSensesSynonyms[]
   */
  public function setSynonyms($synonyms)
  {
    $this->synonyms = $synonyms;
  }
  /**
   * @return DictlayerdataDictWordsSensesSynonyms[]
   */
  public function getSynonyms()
  {
    return $this->synonyms;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DictlayerdataDictWordsSenses::class, 'Google_Service_Books_DictlayerdataDictWordsSenses');
