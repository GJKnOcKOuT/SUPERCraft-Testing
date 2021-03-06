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
 * @package    arter\amos\ticket\models\search
 * @category   CategoryName
 * @author     Elite Division S.r.l.
 */

namespace arter\amos\ticket\models\search;

use arter\amos\ticket\models\TicketCategorie;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * TicketCategorieSearch represents the model behind the search form about `pen2\amos\ticket\models\TicketCategorie`.
 */
class TicketCategorieSearch extends TicketCategorie
{
    /**
     * @see    \yii\base\Model::rules()    for more info.
     */
    public function rules()
    {
        return [
            [['id', 'abilita_ticket', 'attiva', 'tecnica','filemanager_mediafile_id', 'created_by', 'updated_by', 'deleted_by', 'version', 'categoria_padre_id'], 'integer'],
            [['titolo', 'email_tecnica','sottotitolo', 'descrizione_breve', 'descrizione', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
        ];
    }

    /**
     * @see    \yii\base\Model::scenarios()    for more info.
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Metodo search da utilizzare per recuperare le categorie dei ticket.
     *
     * @param array $params Array di parametri
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = TicketCategorie::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $abilita_per_community = false;

        // If scope set, filter categories for cwh
        $moduleCwh = \Yii::$app->getModule('cwh');
        if (isset($moduleCwh) && !empty($moduleCwh->getCwhScope())) {
            $scope = $moduleCwh->getCwhScope();
            if (isset($scope['community'])) {

                $abilita_per_community = true;

                $query->andFilterWhere([
                    'community_id' => $scope['community'],
                ]);

            }
        }

        $query->andFilterWhere([
            'abilita_per_community' => $abilita_per_community,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'filemanager_mediafile_id' => $this->filemanager_mediafile_id,
            'categoria_padre_id' => $this->categoria_padre_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'deleted_by' => $this->deleted_by,
            'version' => $this->version,
        ]);

        $query->andFilterWhere(['like', 'titolo', $this->titolo])
            ->andFilterWhere(['like', 'sottotitolo', $this->sottotitolo])
           // ->andFilterWhere(['like', 'descrizione_breve', $this->descrizione_breve])
            ->andFilterWhere(['like', 'descrizione', $this->descrizione]);

        return $dataProvider;
    }
    
    /**
     * Metodo search da utilizzare per recuperare le categorie da visualizzare nella pagina delle faq
     *
     * @param array $params Array di parametri
     * @return ActiveDataProvider
     */
    public function searchPerFaq($params)
    {

        $query = TicketCategorie::find()->andWhere(["attiva"=>true]);

        $abilita_per_community = false;

        // If scope set, filter categories for cwh
        $moduleCwh = \Yii::$app->getModule('cwh');
        if (isset($moduleCwh) && !empty($moduleCwh->getCwhScope())) {
            $scope = $moduleCwh->getCwhScope();
            if (isset($scope['community'])) {

                $abilita_per_community = true;

                $query->andFilterWhere([
                    'community_id' => $scope['community'],
                ]);

            }
        }

        $query->andFilterWhere([
            'abilita_per_community' => $abilita_per_community,
        ]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        //pr($params);
        /*$tmp2 = $query->createCommand()->getRawSql();
        print "tmp2: ".$tmp2;*/
        
        //$this->load($params);
        //if (!($this->load($params) && $this->validate())) {
            //$query->andWhere(["categoria_padre_id"=>null]);
          //  return $dataProvider;
        //}
        
        $query->andWhere(["categoria_padre_id"=>$this->categoria_padre_id]);
      
        return $dataProvider;
    }
}
