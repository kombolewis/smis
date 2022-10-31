<?php

namespace app\models\generated\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\generated\OrgUnitHead;

/**
 * OrgUnitHeadSearch represents the model behind the search form of `app\models\generated\OrgUnitHead`.
 */
class OrgUnitHeadSearch extends OrgUnitHead
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['UNIT_HEAD_ID'], 'number'],
            [['UNIT_HEAD_NAME', 'STATUS'], 'safe'],
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
        $query = OrgUnitHead::find();

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
            'UNIT_HEAD_ID' => $this->UNIT_HEAD_ID,
        ]);

        $query->andFilterWhere(['like', 'UNIT_HEAD_NAME', $this->UNIT_HEAD_NAME])
            ->andFilterWhere(['like', 'STATUS', $this->STATUS]);

        return $dataProvider;
    }
}
