<?php

namespace app\models\generated\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\generated\OrgUnitHistory;

/**
 * OrgUnitHistorytSearch represents the model behind the search form of `app\models\generated\OrgUnitHistory`.
 */
class OrgUnitHistorytSearch extends OrgUnitHistory
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ORG_UNIT_HISTORY_ID', 'ORG_UNIT_ID', 'ORG_TYPE_ID', 'PARENT_ID', 'SUCCESSOR_ID', 'UNIT_HEAD_ID', 'UNIT_HEAD_USER_ID', 'USER_ID'], 'number'],
            [['START_DATE', 'END_DATE', 'DATE_CREATED'], 'safe'],
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
        $query = OrgUnitHistory::find();

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
            'ORG_UNIT_HISTORY_ID' => $this->ORG_UNIT_HISTORY_ID,
            'ORG_UNIT_ID' => $this->ORG_UNIT_ID,
            'ORG_TYPE_ID' => $this->ORG_TYPE_ID,
            'PARENT_ID' => $this->PARENT_ID,
            'SUCCESSOR_ID' => $this->SUCCESSOR_ID,
            'UNIT_HEAD_ID' => $this->UNIT_HEAD_ID,
            'UNIT_HEAD_USER_ID' => $this->UNIT_HEAD_USER_ID,
            'START_DATE' => $this->START_DATE,
            'USER_ID' => $this->USER_ID,
            'DATE_CREATED' => $this->DATE_CREATED,
        ]);

        $query->andFilterWhere(['like', 'END_DATE', $this->END_DATE]);

        return $dataProvider;
    }
}
