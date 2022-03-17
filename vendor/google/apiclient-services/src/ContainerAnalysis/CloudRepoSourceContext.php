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

namespace Google\Service\ContainerAnalysis;

class CloudRepoSourceContext extends \Google\Model
{
  protected $aliasContextType = AliasContext::class;
  protected $aliasContextDataType = '';
  protected $repoIdType = RepoId::class;
  protected $repoIdDataType = '';
  public $revisionId;

  /**
   * @param AliasContext
   */
  public function setAliasContext(AliasContext $aliasContext)
  {
    $this->aliasContext = $aliasContext;
  }
  /**
   * @return AliasContext
   */
  public function getAliasContext()
  {
    return $this->aliasContext;
  }
  /**
   * @param RepoId
   */
  public function setRepoId(RepoId $repoId)
  {
    $this->repoId = $repoId;
  }
  /**
   * @return RepoId
   */
  public function getRepoId()
  {
    return $this->repoId;
  }
  public function setRevisionId($revisionId)
  {
    $this->revisionId = $revisionId;
  }
  public function getRevisionId()
  {
    return $this->revisionId;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(CloudRepoSourceContext::class, 'Google_Service_ContainerAnalysis_CloudRepoSourceContext');