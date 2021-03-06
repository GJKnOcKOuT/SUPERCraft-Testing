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


namespace arter\amos\een\models\search;

use arter\amos\een\models\EenExprOfInterest;
use arter\amos\een\models\EenStaff;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\db\ActiveQuery;

/**
 * Class EenExprOfInterestSearch
 * EenExprOfInterestSearch represents the model behind the search form about `backend\models\EenExprOfInterest`.
 * @package arter\amos\een\models\search
 */
class EenExprOfInterestSearch extends \arter\amos\een\models\EenExprOfInterest
{
    public $reference_external;
    public $title_proposal;
    public $date_from;
    public $date_to;
    public $type_expr_of_interest;
    public $nome;
    public $status_expr_of_int;
    public $statusSearch;
    public $cognome;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'een_partnership_proposal_id', 'privacy'], 'integer'],
            [['area', 'company_organization', 'sector', 'address', 'city', 'postal_code', 'web_site', 'contact_person', 'phone', 'fax', 'email',
                'technology_interest', 'organization_presentation', 'status',
                'created_at', 'updated_at', 'deleted_at', 'created_by', 'updated_by', 'deleted_by',
                'title_proposal', 'reference_external', 'type_expr_of_interest', 'nome', 'cognome', 'status_expr_of_int', 'statusSearch',
                'date_from', 'date_to'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function getScope($params)
    {
        $scope = $this->formName();
        if (!isset($params[$scope])) {
            $scope = '';
        }
        return $scope;
    }

    /**
     * @param $params
     * @return ActiveDataProvider
     * @throws \yii\base\InvalidConfigException
     */
    public function searchReceived($params)
    {
        $query = EenExprOfInterest::find()
            ->innerJoinWith('eenPartnershipProposal');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $scope = $this->getScope($params);

        $dataProvider->setSort([
            'defaultOrder' => [
                'created_at' => SORT_DESC,
            ]
        ]);


//        //RECEIVED EXPR_OF_INTEREST
        $staff = EenStaff::find()->andWhere(['user_id' => \Yii::$app->user->id])->one();
        if ($staff) {
            //staff default and ADMIN can see all the expression of interest
            $query->joinWith('eenStaff')
                ->andWhere(['OR',
                    ['een_staff.user_id' => \Yii::$app->user->id],
                    ['AND',
                        ['een_expr_of_interest.een_network_node_id' => $staff->een_network_node_id],
                        ['IS', 'een_staff_id', null]
                    ]
                ]);
        }
        if (!($this->load($params, $scope) && $this->validate())) {
            return $dataProvider;
        }

        $this->baseFilterSearch($query);

        return $dataProvider;
    }

    /**
     * @param $params
     * @return ActiveDataProvider
     * @throws \yii\base\InvalidConfigException
     */
    public function searchOwnExprOfInterest($params)
    {
        $query = EenExprOfInterest::find();
        $query->andWhere(['een_expr_of_interest.user_id' => \Yii::$app->user->id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $scope = $this->getScope($params);
        $dataProvider->setSort([
            'defaultOrder' => [
                'created_at' => SORT_DESC,
            ]
        ]);

        if (!($this->load($params, $scope) && $this->validate())) {
            return $dataProvider;
        }

        $this->baseFilterSearch($query);

        return $dataProvider;
    }

    /**
     * @param $params
     * @return ActiveDataProvider
     * @throws \yii\base\InvalidConfigException
     */
    public function searchAll($params)
    {
        $query = EenExprOfInterest::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $scope = $this->getScope($params);
        $dataProvider->setSort([
            'defaultOrder' => [
                'created_at' => SORT_DESC,
            ]
        ]);

        if (!($this->load($params, $scope) && $this->validate())) {
            return $dataProvider;
        }

        $this->baseFilterSearch($query);

        return $dataProvider;
    }

    /**
     * @param $query ActiveQuery
     * @return mixed
     */
    public function baseFilterSearch($query)
    {
        $query->andFilterWhere([
            'id' => $this->id,
            'een_partnership_proposal_id' => $this->een_partnership_proposal_id,
            'privacy' => $this->privacy,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'deleted_by' => $this->deleted_by,
        ]);

        if (!empty($this->nome) || !empty($this->cognome)) {
            $query->innerJoinWith('user.userProfile')
                ->andFilterWhere(['like', 'user_profile.nome', $this->nome])
                ->andFilterWhere(['like', 'user_profile.cognome', $this->cognome]);
        }

        if (!empty($this->reference_external) || !empty($this->title_proposal)) {
            $query->innerJoinWith('eenPartnershipProposal')
                ->andFilterWhere(['like', 'reference_external', $this->reference_external])
                ->andFilterWhere(['like', 'content_title', $this->title_proposal]);
        }

        $query->andFilterWhere(['like', 'een_network_node_id', $this->een_network_node_id])
            ->andFilterWhere(['is_request_more_info' => $this->type_expr_of_interest])
            ->andFilterWhere(['>=', 'een_expr_of_interest.created_at', $this->date_from])
            ->andFilterWhere(['<=', 'een_expr_of_interest.created_at', $this->date_to])
            ->andFilterWhere(['like', 'een_expr_of_interest.status', $this->statusSearch]);

        return $query;
    }


    /**
     * @param $params
     * @return ActiveDataProvider
     * @throws \yii\base\InvalidConfigException
     */
    public function searchEoiToTakeOver($params)
    {
        /** @var ActiveQuery $query */
        $query = EenExprOfInterest::find()
            ->innerJoinWith('eenPartnershipProposal');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $staff = EenStaff::find()->andWhere(['user_id' => \Yii::$app->user->id])->one();

        if (!\Yii::$app->user->can('STAFF_EEN') || empty($staff)) {
            $dataProvider->query->andWhere(0);
            return $dataProvider;
        }

        $scope = $this->getScope($params);

        $dataProvider->setSort([
            'defaultOrder' => [
                'created_at' => SORT_DESC,
            ]
        ]);

        $eenExprOfIntTable = EenExprOfInterest::tableName();

//        //RECEIVED EXPR_OF_INTEREST
        if ($staff) {
            //staff default and ADMIN can see all the expression of interest
            if ($staff->isStaffDefault()) {
                $query->andWhere(
                    ['OR',
                        ['AND',
                            [$eenExprOfIntTable . '.een_network_node_id' => $staff->een_network_node_id],
                            ['OR',
                                [
                                    $eenExprOfIntTable . '.een_staff_id' => null
                                ],
                                [
                                    $eenExprOfIntTable . '.een_staff_id' => $staff->id
                                ]
                            ]
                        ],
                        [
                            $eenExprOfIntTable . '.een_staff_id' => null
                        ],
                    ]
                );
            } else {
                $query->andWhere(
                    ['AND',
                        [$eenExprOfIntTable . '.een_network_node_id' => $staff->een_network_node_id],
                        ['OR',
                            [
                                $eenExprOfIntTable . '.een_staff_id' => null
                            ],
                            [
                                $eenExprOfIntTable . '.een_staff_id' => $staff->id
                            ]
                        ]
                    ]
                );
            }
        }

        $query->andWhere([$eenExprOfIntTable . '.status' => EenExprOfInterest::EEN_EXPR_WORKFLOW_STATUS_SUSPENDED]);

        return $dataProvider;
    }
}
