<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Programmes;

/**
 * ProgrammesSearch represents the model behind the search form of `app\models\Programmes`.
 */
class ProgrammesSearch extends Programmes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prog_id', 'prog_type_id', 'prog_cat_id'], 'integer'],
            [['prog_code', 'prog_short_name', 'prog_full_name', 'status'], 'safe'],
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
        $query = Programmes::find();

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
            'prog_id' => $this->prog_id,
            'prog_type_id' => $this->prog_type_id,
            'prog_cat_id' => $this->prog_cat_id,
        ]);

        $query->andFilterWhere(['ilike', 'prog_code', $this->prog_code])
            ->andFilterWhere(['ilike', 'prog_short_name', $this->prog_short_name])
            ->andFilterWhere(['ilike', 'prog_full_name', $this->prog_full_name])
            ->andFilterWhere(['ilike', 'status', $this->status]);

        return $dataProvider;
    }
}
