<?php

namespace app\models\generated\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\generated\Programme;

/**
 * ProgrammeSearch represents the model behind the search form of `app\models\generated\Programme`.
 */
class ProgrammeSearch extends Programme
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PROG_ID', 'PROG_TYPE_ID', 'PROG_CAT_ID'], 'number'],
            [['PROG_CODE', 'PROG_SHORT_NAME', 'PROG_FULL_NAME', 'PROG_PREFIX', 'STATUS'], 'safe'],
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
        $query = Programme::find();

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
            'PROG_ID' => $this->PROG_ID,
            'PROG_TYPE_ID' => $this->PROG_TYPE_ID,
            'PROG_CAT_ID' => $this->PROG_CAT_ID,
        ]);

        $query->andFilterWhere(['like', 'PROG_CODE', $this->PROG_CODE])
            ->andFilterWhere(['like', 'PROG_SHORT_NAME', $this->PROG_SHORT_NAME])
            ->andFilterWhere(['like', 'PROG_FULL_NAME', $this->PROG_FULL_NAME])
            ->andFilterWhere(['like', 'PROG_PREFIX', $this->PROG_PREFIX])
            ->andFilterWhere(['like', 'STATUS', $this->STATUS]);

        return $dataProvider;
    }
}
