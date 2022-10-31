<?php

namespace app\models\generated\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\generated\ProgrammeCategory;

/**
 * ProgrammeCategorySearch represents the model behind the search form of `app\models\generated\ProgrammeCategory`.
 */
class ProgrammeCategorySearch extends ProgrammeCategory
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PROG_CAT_ID', 'PROG_CAT_ORDER'], 'integer'],
            [['PROG_CAT_CODE', 'PROG_CAT_NAME', 'STATUS'], 'safe'],
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
        $query = ProgrammeCategory::find();

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
            'PROG_CAT_ID' => $this->PROG_CAT_ID,
            'PROG_CAT_ORDER' => $this->PROG_CAT_ORDER,
        ]);

        $query->andFilterWhere(['like', 'PROG_CAT_CODE', $this->PROG_CAT_CODE])
            ->andFilterWhere(['like', 'PROG_CAT_NAME', $this->PROG_CAT_NAME])
            ->andFilterWhere(['like', 'STATUS', $this->STATUS]);

        return $dataProvider;
    }
}
