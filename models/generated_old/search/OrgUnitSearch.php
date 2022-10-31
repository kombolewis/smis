<?php

namespace app\models\generated\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\generated\OrgUnit;

/**
 * OrgUnitSearch represents the model behind the search form of `app\models\generated\OrgUnit`.
 */
class OrgUnitSearch extends OrgUnit
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['UNIT_ID'], 'integer'],
            [['UNIT_CODE', 'UNIT_NAME'], 'safe'],
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
        $query = OrgUnit::find();

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
            'UNIT_ID' => $this->UNIT_ID,
        ]);

        $query->andFilterWhere(['like', 'UNIT_CODE', $this->UNIT_CODE])
            ->andFilterWhere(['like', 'UNIT_NAME', $this->UNIT_NAME]);

        return $dataProvider;
    }
}
