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
 * @package    arter\amos\partnershipprofiles\migrations
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

use arter\amos\core\migration\AmosMigrationPermissions;

/**
 * Class m190116_141125_modify_partnership_profiles_facilitator_permissions
 */
class m190116_141125_modify_partnership_profiles_facilitator_permissions extends AmosMigrationPermissions
{
    /**
     * @inheritdoc
     */
    protected function setRBACConfigurations()
    {
        return [
            [
                'name' => 'PARTNERSHIP_PROFILES_FACILITATOR',
                'update' => true,
                'newValues' => [
                    'addParents' => ['PARTNER_PROF_EXPR_OF_INT_ADMIN_FACILITATOR'],
                    'removeParents' => ['FACILITATOR']
                ]
            ]
        ];
    }
}
