<?php

namespace app\models\generated\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\generated\ProgrammeType;

/**
 * ProgrammeTypeSearch represents the model behind the search form of `app\models\generated\ProgrammeType`.
 */
class ProgrammeTypeSearch extends ProgrammeType
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PROG_TYPE_ID'], 'number'],
            [['PROG_TYPE_CODE', 'PROG_TYPE_NAME', 'STATUS'], 'safe'],
            [['PROG_TYPE_ORDER'], 'integer'],
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
        $query = ProgrammeType::find();

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
            'PROG_TYPE_ID' => $this->PROG_TYPE_ID,
            'PROG_TYPE_ORDER' => $this->PROG_TYPE_ORDER,
        ]);

        $query->andFilterWhere(['like', 'PROG_TYPE_CODE', $this->PROG_TYPE_CODE])
            ->andFilterWhere(['like', 'PROG_TYPE_NAME', $this->PROG_TYPE_NAME])
            ->andFilterWhere(['like', 'STATUS', $this->STATUS]);

        return $dataProvider;
    }
}
