<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Option;

/**
 * OptionSearch represents the model behind the search form of `app\models\Option`.
 */
class OptionSearch extends Option
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['option_id'], 'integer'],
            [['option_code', 'option_name', 'degree_id', 'option_desc', 'option_status', 'progress_type'], 'safe'],
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
        $query = Option::find();

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
            'option_id' => $this->option_id,
        ]);

        $query->andFilterWhere(['ilike', 'option_code', $this->option_code])
            ->andFilterWhere(['ilike', 'option_name', $this->option_name])
            ->andFilterWhere(['ilike', 'degree_id', $this->degree_id])
            ->andFilterWhere(['ilike', 'option_desc', $this->option_desc])
            ->andFilterWhere(['ilike', 'option_status', $this->option_status])
            ->andFilterWhere(['ilike', 'progress_type', $this->progress_type]);

        return $dataProvider;
    }
}
