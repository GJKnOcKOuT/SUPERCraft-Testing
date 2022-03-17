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

namespace Google\Service\GamesManagement\Resource;

use Google\Service\GamesManagement\PlayerScoreResetAllResponse;
use Google\Service\GamesManagement\PlayerScoreResetResponse;
use Google\Service\GamesManagement\ScoresResetMultipleForAllRequest;

/**
 * The "scores" collection of methods.
 * Typical usage is:
 *  <code>
 *   $gamesManagementService = new Google\Service\GamesManagement(...);
 *   $scores = $gamesManagementService->scores;
 *  </code>
 */
class Scores extends \Google\Service\Resource
{
  /**
   * Resets scores for the leaderboard with the given ID for the currently
   * authenticated player. This method is only accessible to whitelisted tester
   * accounts for your application. (scores.reset)
   *
   * @param string $leaderboardId The ID of the leaderboard.
   * @param array $optParams Optional parameters.
   * @return PlayerScoreResetResponse
   */
  public function reset($leaderboardId, $optParams = [])
  {
    $params = ['leaderboardId' => $leaderboardId];
    $params = array_merge($params, $optParams);
    return $this->call('reset', [$params], PlayerScoreResetResponse::class);
  }
  /**
   * Resets all scores for all leaderboards for the currently authenticated
   * players. This method is only accessible to whitelisted tester accounts for
   * your application. (scores.resetAll)
   *
   * @param array $optParams Optional parameters.
   * @return PlayerScoreResetAllResponse
   */
  public function resetAll($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('resetAll', [$params], PlayerScoreResetAllResponse::class);
  }
  /**
   * Resets scores for all draft leaderboards for all players. This method is only
   * available to user accounts for your developer console.
   * (scores.resetAllForAllPlayers)
   *
   * @param array $optParams Optional parameters.
   */
  public function resetAllForAllPlayers($optParams = [])
  {
    $params = [];
    $params = array_merge($params, $optParams);
    return $this->call('resetAllForAllPlayers', [$params]);
  }
  /**
   * Resets scores for the leaderboard with the given ID for all players. This
   * method is only available to user accounts for your developer console. Only
   * draft leaderboards can be reset. (scores.resetForAllPlayers)
   *
   * @param string $leaderboardId The ID of the leaderboard.
   * @param array $optParams Optional parameters.
   */
  public function resetForAllPlayers($leaderboardId, $optParams = [])
  {
    $params = ['leaderboardId' => $leaderboardId];
    $params = array_merge($params, $optParams);
    return $this->call('resetForAllPlayers', [$params]);
  }
  /**
   * Resets scores for the leaderboards with the given IDs for all players. This
   * method is only available to user accounts for your developer console. Only
   * draft leaderboards may be reset. (scores.resetMultipleForAllPlayers)
   *
   * @param ScoresResetMultipleForAllRequest $postBody
   * @param array $optParams Optional parameters.
   */
  public function resetMultipleForAllPlayers(ScoresResetMultipleForAllRequest $postBody, $optParams = [])
  {
    $params = ['postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('resetMultipleForAllPlayers', [$params]);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Scores::class, 'Google_Service_GamesManagement_Resource_Scores');
