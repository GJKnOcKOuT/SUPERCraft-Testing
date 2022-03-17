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

namespace Google\Service\CloudMachineLearningEngine;

class GoogleCloudMlV1ContainerSpec extends \Google\Collection
{
  protected $collection_key = 'ports';
  public $args;
  public $command;
  protected $envType = GoogleCloudMlV1EnvVar::class;
  protected $envDataType = 'array';
  public $image;
  protected $portsType = GoogleCloudMlV1ContainerPort::class;
  protected $portsDataType = 'array';

  public function setArgs($args)
  {
    $this->args = $args;
  }
  public function getArgs()
  {
    return $this->args;
  }
  public function setCommand($command)
  {
    $this->command = $command;
  }
  public function getCommand()
  {
    return $this->command;
  }
  /**
   * @param GoogleCloudMlV1EnvVar[]
   */
  public function setEnv($env)
  {
    $this->env = $env;
  }
  /**
   * @return GoogleCloudMlV1EnvVar[]
   */
  public function getEnv()
  {
    return $this->env;
  }
  public function setImage($image)
  {
    $this->image = $image;
  }
  public function getImage()
  {
    return $this->image;
  }
  /**
   * @param GoogleCloudMlV1ContainerPort[]
   */
  public function setPorts($ports)
  {
    $this->ports = $ports;
  }
  /**
   * @return GoogleCloudMlV1ContainerPort[]
   */
  public function getPorts()
  {
    return $this->ports;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudMlV1ContainerSpec::class, 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1ContainerSpec');