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

namespace Google\Service\Dataflow;

class InstructionOutput extends \Google\Model
{
  public $codec;
  public $name;
  public $onlyCountKeyBytes;
  public $onlyCountValueBytes;
  public $originalName;
  public $systemName;

  public function setCodec($codec)
  {
    $this->codec = $codec;
  }
  public function getCodec()
  {
    return $this->codec;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setOnlyCountKeyBytes($onlyCountKeyBytes)
  {
    $this->onlyCountKeyBytes = $onlyCountKeyBytes;
  }
  public function getOnlyCountKeyBytes()
  {
    return $this->onlyCountKeyBytes;
  }
  public function setOnlyCountValueBytes($onlyCountValueBytes)
  {
    $this->onlyCountValueBytes = $onlyCountValueBytes;
  }
  public function getOnlyCountValueBytes()
  {
    return $this->onlyCountValueBytes;
  }
  public function setOriginalName($originalName)
  {
    $this->originalName = $originalName;
  }
  public function getOriginalName()
  {
    return $this->originalName;
  }
  public function setSystemName($systemName)
  {
    $this->systemName = $systemName;
  }
  public function getSystemName()
  {
    return $this->systemName;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(InstructionOutput::class, 'Google_Service_Dataflow_InstructionOutput');