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

namespace Google\Service\AdExchangeBuyer;

class MarketplaceNote extends \Google\Model
{
  public $creatorRole;
  public $dealId;
  public $kind;
  public $note;
  public $noteId;
  public $proposalId;
  public $proposalRevisionNumber;
  public $timestampMs;

  public function setCreatorRole($creatorRole)
  {
    $this->creatorRole = $creatorRole;
  }
  public function getCreatorRole()
  {
    return $this->creatorRole;
  }
  public function setDealId($dealId)
  {
    $this->dealId = $dealId;
  }
  public function getDealId()
  {
    return $this->dealId;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setNote($note)
  {
    $this->note = $note;
  }
  public function getNote()
  {
    return $this->note;
  }
  public function setNoteId($noteId)
  {
    $this->noteId = $noteId;
  }
  public function getNoteId()
  {
    return $this->noteId;
  }
  public function setProposalId($proposalId)
  {
    $this->proposalId = $proposalId;
  }
  public function getProposalId()
  {
    return $this->proposalId;
  }
  public function setProposalRevisionNumber($proposalRevisionNumber)
  {
    $this->proposalRevisionNumber = $proposalRevisionNumber;
  }
  public function getProposalRevisionNumber()
  {
    return $this->proposalRevisionNumber;
  }
  public function setTimestampMs($timestampMs)
  {
    $this->timestampMs = $timestampMs;
  }
  public function getTimestampMs()
  {
    return $this->timestampMs;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MarketplaceNote::class, 'Google_Service_AdExchangeBuyer_MarketplaceNote');