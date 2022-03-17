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

namespace Google\Service\Dialogflow;

class GoogleCloudDialogflowCxV3Flow extends \Google\Collection
{
  protected $collection_key = 'transitionRoutes';
  public $description;
  public $displayName;
  protected $eventHandlersType = GoogleCloudDialogflowCxV3EventHandler::class;
  protected $eventHandlersDataType = 'array';
  public $name;
  protected $nluSettingsType = GoogleCloudDialogflowCxV3NluSettings::class;
  protected $nluSettingsDataType = '';
  public $transitionRouteGroups;
  protected $transitionRoutesType = GoogleCloudDialogflowCxV3TransitionRoute::class;
  protected $transitionRoutesDataType = 'array';

  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  /**
   * @param GoogleCloudDialogflowCxV3EventHandler[]
   */
  public function setEventHandlers($eventHandlers)
  {
    $this->eventHandlers = $eventHandlers;
  }
  /**
   * @return GoogleCloudDialogflowCxV3EventHandler[]
   */
  public function getEventHandlers()
  {
    return $this->eventHandlers;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param GoogleCloudDialogflowCxV3NluSettings
   */
  public function setNluSettings(GoogleCloudDialogflowCxV3NluSettings $nluSettings)
  {
    $this->nluSettings = $nluSettings;
  }
  /**
   * @return GoogleCloudDialogflowCxV3NluSettings
   */
  public function getNluSettings()
  {
    return $this->nluSettings;
  }
  public function setTransitionRouteGroups($transitionRouteGroups)
  {
    $this->transitionRouteGroups = $transitionRouteGroups;
  }
  public function getTransitionRouteGroups()
  {
    return $this->transitionRouteGroups;
  }
  /**
   * @param GoogleCloudDialogflowCxV3TransitionRoute[]
   */
  public function setTransitionRoutes($transitionRoutes)
  {
    $this->transitionRoutes = $transitionRoutes;
  }
  /**
   * @return GoogleCloudDialogflowCxV3TransitionRoute[]
   */
  public function getTransitionRoutes()
  {
    return $this->transitionRoutes;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3Flow::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3Flow');
