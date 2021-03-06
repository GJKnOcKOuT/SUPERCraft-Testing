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

namespace Google\Service\YouTube;

class LiveBroadcastContentDetails extends \Google\Model
{
  public $boundStreamId;
  public $boundStreamLastUpdateTimeMs;
  public $closedCaptionsType;
  public $enableAutoStart;
  public $enableAutoStop;
  public $enableClosedCaptions;
  public $enableContentEncryption;
  public $enableDvr;
  public $enableEmbed;
  public $enableLowLatency;
  public $latencyPreference;
  public $mesh;
  protected $monitorStreamType = MonitorStreamInfo::class;
  protected $monitorStreamDataType = '';
  public $projection;
  public $recordFromStart;
  public $startWithSlate;
  public $stereoLayout;

  public function setBoundStreamId($boundStreamId)
  {
    $this->boundStreamId = $boundStreamId;
  }
  public function getBoundStreamId()
  {
    return $this->boundStreamId;
  }
  public function setBoundStreamLastUpdateTimeMs($boundStreamLastUpdateTimeMs)
  {
    $this->boundStreamLastUpdateTimeMs = $boundStreamLastUpdateTimeMs;
  }
  public function getBoundStreamLastUpdateTimeMs()
  {
    return $this->boundStreamLastUpdateTimeMs;
  }
  public function setClosedCaptionsType($closedCaptionsType)
  {
    $this->closedCaptionsType = $closedCaptionsType;
  }
  public function getClosedCaptionsType()
  {
    return $this->closedCaptionsType;
  }
  public function setEnableAutoStart($enableAutoStart)
  {
    $this->enableAutoStart = $enableAutoStart;
  }
  public function getEnableAutoStart()
  {
    return $this->enableAutoStart;
  }
  public function setEnableAutoStop($enableAutoStop)
  {
    $this->enableAutoStop = $enableAutoStop;
  }
  public function getEnableAutoStop()
  {
    return $this->enableAutoStop;
  }
  public function setEnableClosedCaptions($enableClosedCaptions)
  {
    $this->enableClosedCaptions = $enableClosedCaptions;
  }
  public function getEnableClosedCaptions()
  {
    return $this->enableClosedCaptions;
  }
  public function setEnableContentEncryption($enableContentEncryption)
  {
    $this->enableContentEncryption = $enableContentEncryption;
  }
  public function getEnableContentEncryption()
  {
    return $this->enableContentEncryption;
  }
  public function setEnableDvr($enableDvr)
  {
    $this->enableDvr = $enableDvr;
  }
  public function getEnableDvr()
  {
    return $this->enableDvr;
  }
  public function setEnableEmbed($enableEmbed)
  {
    $this->enableEmbed = $enableEmbed;
  }
  public function getEnableEmbed()
  {
    return $this->enableEmbed;
  }
  public function setEnableLowLatency($enableLowLatency)
  {
    $this->enableLowLatency = $enableLowLatency;
  }
  public function getEnableLowLatency()
  {
    return $this->enableLowLatency;
  }
  public function setLatencyPreference($latencyPreference)
  {
    $this->latencyPreference = $latencyPreference;
  }
  public function getLatencyPreference()
  {
    return $this->latencyPreference;
  }
  public function setMesh($mesh)
  {
    $this->mesh = $mesh;
  }
  public function getMesh()
  {
    return $this->mesh;
  }
  /**
   * @param MonitorStreamInfo
   */
  public function setMonitorStream(MonitorStreamInfo $monitorStream)
  {
    $this->monitorStream = $monitorStream;
  }
  /**
   * @return MonitorStreamInfo
   */
  public function getMonitorStream()
  {
    return $this->monitorStream;
  }
  public function setProjection($projection)
  {
    $this->projection = $projection;
  }
  public function getProjection()
  {
    return $this->projection;
  }
  public function setRecordFromStart($recordFromStart)
  {
    $this->recordFromStart = $recordFromStart;
  }
  public function getRecordFromStart()
  {
    return $this->recordFromStart;
  }
  public function setStartWithSlate($startWithSlate)
  {
    $this->startWithSlate = $startWithSlate;
  }
  public function getStartWithSlate()
  {
    return $this->startWithSlate;
  }
  public function setStereoLayout($stereoLayout)
  {
    $this->stereoLayout = $stereoLayout;
  }
  public function getStereoLayout()
  {
    return $this->stereoLayout;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LiveBroadcastContentDetails::class, 'Google_Service_YouTube_LiveBroadcastContentDetails');
