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

class GoogleCloudDialogflowCxV3WebhookRequest extends \Google\Collection
{
  protected $collection_key = 'messages';
  public $detectIntentResponseId;
  protected $fulfillmentInfoType = GoogleCloudDialogflowCxV3WebhookRequestFulfillmentInfo::class;
  protected $fulfillmentInfoDataType = '';
  protected $intentInfoType = GoogleCloudDialogflowCxV3WebhookRequestIntentInfo::class;
  protected $intentInfoDataType = '';
  public $languageCode;
  protected $messagesType = GoogleCloudDialogflowCxV3ResponseMessage::class;
  protected $messagesDataType = 'array';
  protected $pageInfoType = GoogleCloudDialogflowCxV3PageInfo::class;
  protected $pageInfoDataType = '';
  public $payload;
  protected $sentimentAnalysisResultType = GoogleCloudDialogflowCxV3WebhookRequestSentimentAnalysisResult::class;
  protected $sentimentAnalysisResultDataType = '';
  protected $sessionInfoType = GoogleCloudDialogflowCxV3SessionInfo::class;
  protected $sessionInfoDataType = '';
  public $text;
  public $transcript;
  public $triggerEvent;
  public $triggerIntent;

  public function setDetectIntentResponseId($detectIntentResponseId)
  {
    $this->detectIntentResponseId = $detectIntentResponseId;
  }
  public function getDetectIntentResponseId()
  {
    return $this->detectIntentResponseId;
  }
  /**
   * @param GoogleCloudDialogflowCxV3WebhookRequestFulfillmentInfo
   */
  public function setFulfillmentInfo(GoogleCloudDialogflowCxV3WebhookRequestFulfillmentInfo $fulfillmentInfo)
  {
    $this->fulfillmentInfo = $fulfillmentInfo;
  }
  /**
   * @return GoogleCloudDialogflowCxV3WebhookRequestFulfillmentInfo
   */
  public function getFulfillmentInfo()
  {
    return $this->fulfillmentInfo;
  }
  /**
   * @param GoogleCloudDialogflowCxV3WebhookRequestIntentInfo
   */
  public function setIntentInfo(GoogleCloudDialogflowCxV3WebhookRequestIntentInfo $intentInfo)
  {
    $this->intentInfo = $intentInfo;
  }
  /**
   * @return GoogleCloudDialogflowCxV3WebhookRequestIntentInfo
   */
  public function getIntentInfo()
  {
    return $this->intentInfo;
  }
  public function setLanguageCode($languageCode)
  {
    $this->languageCode = $languageCode;
  }
  public function getLanguageCode()
  {
    return $this->languageCode;
  }
  /**
   * @param GoogleCloudDialogflowCxV3ResponseMessage[]
   */
  public function setMessages($messages)
  {
    $this->messages = $messages;
  }
  /**
   * @return GoogleCloudDialogflowCxV3ResponseMessage[]
   */
  public function getMessages()
  {
    return $this->messages;
  }
  /**
   * @param GoogleCloudDialogflowCxV3PageInfo
   */
  public function setPageInfo(GoogleCloudDialogflowCxV3PageInfo $pageInfo)
  {
    $this->pageInfo = $pageInfo;
  }
  /**
   * @return GoogleCloudDialogflowCxV3PageInfo
   */
  public function getPageInfo()
  {
    return $this->pageInfo;
  }
  public function setPayload($payload)
  {
    $this->payload = $payload;
  }
  public function getPayload()
  {
    return $this->payload;
  }
  /**
   * @param GoogleCloudDialogflowCxV3WebhookRequestSentimentAnalysisResult
   */
  public function setSentimentAnalysisResult(GoogleCloudDialogflowCxV3WebhookRequestSentimentAnalysisResult $sentimentAnalysisResult)
  {
    $this->sentimentAnalysisResult = $sentimentAnalysisResult;
  }
  /**
   * @return GoogleCloudDialogflowCxV3WebhookRequestSentimentAnalysisResult
   */
  public function getSentimentAnalysisResult()
  {
    return $this->sentimentAnalysisResult;
  }
  /**
   * @param GoogleCloudDialogflowCxV3SessionInfo
   */
  public function setSessionInfo(GoogleCloudDialogflowCxV3SessionInfo $sessionInfo)
  {
    $this->sessionInfo = $sessionInfo;
  }
  /**
   * @return GoogleCloudDialogflowCxV3SessionInfo
   */
  public function getSessionInfo()
  {
    return $this->sessionInfo;
  }
  public function setText($text)
  {
    $this->text = $text;
  }
  public function getText()
  {
    return $this->text;
  }
  public function setTranscript($transcript)
  {
    $this->transcript = $transcript;
  }
  public function getTranscript()
  {
    return $this->transcript;
  }
  public function setTriggerEvent($triggerEvent)
  {
    $this->triggerEvent = $triggerEvent;
  }
  public function getTriggerEvent()
  {
    return $this->triggerEvent;
  }
  public function setTriggerIntent($triggerIntent)
  {
    $this->triggerIntent = $triggerIntent;
  }
  public function getTriggerIntent()
  {
    return $this->triggerIntent;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3WebhookRequest::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3WebhookRequest');
