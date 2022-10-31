<?php

namespace app\models\generated\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\generated\Cohort;

/**
 * CohortSearch represents the model behind the search form of `app\models\generated\Cohort`.
 */
class CohortSearch extends Cohort
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['COHORT_ID'], 'number'],
            [['COHORT_DESC'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Cohort::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'COHORT_ID' => $this->COHORT_ID,
        ]);

        $query->andFilterWhere(['like', 'COHORT_DESC', $this->COHORT_DESC]);

        return $dataProvider;
    }
}
