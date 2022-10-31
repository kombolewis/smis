<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CohortSession;

/**
 * CohortSessionSearch represents the model behind the search form of `app\models\CohortSession`.
 */
class CohortSessionSearch extends CohortSession
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cohort_session_id', 'cohort_id', 'prog_curriculum_semester_id'], 'integer'],
            [['cohort_session_name', 'status'], 'safe'],
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
        $query = CohortSession::find();

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
            'cohort_session_id' => $this->cohort_session_id,
            'cohort_id' => $this->cohort_id,
            'prog_curriculum_semester_id' => $this->prog_curriculum_semester_id,
        ]);

        $query->andFilterWhere(['ilike', 'cohort_session_name', $this->cohort_session_name])
            ->andFilterWhere(['ilike', 'status', $this->status]);

        return $dataProvider;
    }
}
