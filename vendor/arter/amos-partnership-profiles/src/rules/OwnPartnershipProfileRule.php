<?php
/**
 * Copyright 2020 Art-ER S. Cons. P.A.
 * EROI - Emilia Romagna Open Innovation is based on:
 * https://www.open2.0.regione.lombardia.it
 *
 * @see http://example.com Developers'community
 * @license GPLv3
 * @license https://opensource.org/licenses/gpl-3.0.html GNU General Public License version 3
 *
 * @package    arter\amos\partnershipprofiles\rules
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

namespace arter\amos\partnershipprofiles\rules;

use arter\amos\core\rules\BasicContentRule;
use arter\amos\partnershipprofiles\models\PartnershipProfiles;

/**
 * Class OwnPartnershipProfileRule
 * @package arter\amos\partnershipprofiles\rules
 */
abstract class OwnPartnershipProfileRule extends BasicContentRule
{
    /**
     * @inheritdoc
     */
    public function ruleLogic($user, $item, $params, $model)
    {
        /** @var PartnershipProfiles $model */

        $allowedStates = [
            PartnershipProfiles::PARTNERSHIP_PROFILES_WORKFLOW_STATUS_DRAFT,
        ];

        if (!in_array($model->status, $allowedStates) || ($model->created_by != $user)) {
            return false;
        }

        return $this->partnershipProfileLogic($user, $item, $params, $model);
    }

    /**
     * @param string|int $user the user ID. This should be either an integer or a string representing
     * the unique identifier of a user. See [[\yii\web\User::id]].
     * @param \yii\rbac\Item $item the role or permission that this rule is associated with
     * @param array $params parameters passed to [[CheckAccessInterface::checkAccess()]].
     * @param PartnershipProfiles $model
     * @return bool
     */
    abstract public function partnershipProfileLogic($user, $item, $params, $model);
}
