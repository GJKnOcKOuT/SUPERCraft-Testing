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

namespace Google\Service\Container;

class AddonsConfig extends \Google\Model
{
  protected $cloudRunConfigType = CloudRunConfig::class;
  protected $cloudRunConfigDataType = '';
  protected $configConnectorConfigType = ConfigConnectorConfig::class;
  protected $configConnectorConfigDataType = '';
  protected $dnsCacheConfigType = DnsCacheConfig::class;
  protected $dnsCacheConfigDataType = '';
  protected $gcePersistentDiskCsiDriverConfigType = GcePersistentDiskCsiDriverConfig::class;
  protected $gcePersistentDiskCsiDriverConfigDataType = '';
  protected $horizontalPodAutoscalingType = HorizontalPodAutoscaling::class;
  protected $horizontalPodAutoscalingDataType = '';
  protected $httpLoadBalancingType = HttpLoadBalancing::class;
  protected $httpLoadBalancingDataType = '';
  protected $kubernetesDashboardType = KubernetesDashboard::class;
  protected $kubernetesDashboardDataType = '';
  protected $networkPolicyConfigType = NetworkPolicyConfig::class;
  protected $networkPolicyConfigDataType = '';

  /**
   * @param CloudRunConfig
   */
  public function setCloudRunConfig(CloudRunConfig $cloudRunConfig)
  {
    $this->cloudRunConfig = $cloudRunConfig;
  }
  /**
   * @return CloudRunConfig
   */
  public function getCloudRunConfig()
  {
    return $this->cloudRunConfig;
  }
  /**
   * @param ConfigConnectorConfig
   */
  public function setConfigConnectorConfig(ConfigConnectorConfig $configConnectorConfig)
  {
    $this->configConnectorConfig = $configConnectorConfig;
  }
  /**
   * @return ConfigConnectorConfig
   */
  public function getConfigConnectorConfig()
  {
    return $this->configConnectorConfig;
  }
  /**
   * @param DnsCacheConfig
   */
  public function setDnsCacheConfig(DnsCacheConfig $dnsCacheConfig)
  {
    $this->dnsCacheConfig = $dnsCacheConfig;
  }
  /**
   * @return DnsCacheConfig
   */
  public function getDnsCacheConfig()
  {
    return $this->dnsCacheConfig;
  }
  /**
   * @param GcePersistentDiskCsiDriverConfig
   */
  public function setGcePersistentDiskCsiDriverConfig(GcePersistentDiskCsiDriverConfig $gcePersistentDiskCsiDriverConfig)
  {
    $this->gcePersistentDiskCsiDriverConfig = $gcePersistentDiskCsiDriverConfig;
  }
  /**
   * @return GcePersistentDiskCsiDriverConfig
   */
  public function getGcePersistentDiskCsiDriverConfig()
  {
    return $this->gcePersistentDiskCsiDriverConfig;
  }
  /**
   * @param HorizontalPodAutoscaling
   */
  public function setHorizontalPodAutoscaling(HorizontalPodAutoscaling $horizontalPodAutoscaling)
  {
    $this->horizontalPodAutoscaling = $horizontalPodAutoscaling;
  }
  /**
   * @return HorizontalPodAutoscaling
   */
  public function getHorizontalPodAutoscaling()
  {
    return $this->horizontalPodAutoscaling;
  }
  /**
   * @param HttpLoadBalancing
   */
  public function setHttpLoadBalancing(HttpLoadBalancing $httpLoadBalancing)
  {
    $this->httpLoadBalancing = $httpLoadBalancing;
  }
  /**
   * @return HttpLoadBalancing
   */
  public function getHttpLoadBalancing()
  {
    return $this->httpLoadBalancing;
  }
  /**
   * @param KubernetesDashboard
   */
  public function setKubernetesDashboard(KubernetesDashboard $kubernetesDashboard)
  {
    $this->kubernetesDashboard = $kubernetesDashboard;
  }
  /**
   * @return KubernetesDashboard
   */
  public function getKubernetesDashboard()
  {
    return $this->kubernetesDashboard;
  }
  /**
   * @param NetworkPolicyConfig
   */
  public function setNetworkPolicyConfig(NetworkPolicyConfig $networkPolicyConfig)
  {
    $this->networkPolicyConfig = $networkPolicyConfig;
  }
  /**
   * @return NetworkPolicyConfig
   */
  public function getNetworkPolicyConfig()
  {
    return $this->networkPolicyConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(AddonsConfig::class, 'Google_Service_Container_AddonsConfig');
