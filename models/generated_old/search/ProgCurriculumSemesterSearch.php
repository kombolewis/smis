<?php

namespace app\models\generated\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\generated\ProgCurriculumSemester;

/**
 * ProgCurriculumSemesterSearch represents the model behind the search form of `app\models\generated\ProgCurriculumSemester`.
 */
class ProgCurriculumSemesterSearch extends ProgCurriculumSemester
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PROG_CURRICULUM_SEMESTER_ID', 'PROG_CURRICULUM_ID', 'ACAD_SESSION_SEMESTER_ID'], 'number'],
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
        $query = ProgCurriculumSemester::find();

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
            'PROG_CURRICULUM_SEMESTER_ID' => $this->PROG_CURRICULUM_SEMESTER_ID,
            'PROG_CURRICULUM_ID' => $this->PROG_CURRICULUM_ID,
            'ACAD_SESSION_SEMESTER_ID' => $this->ACAD_SESSION_SEMESTER_ID,
        ]);

        return $dataProvider;
    }
}
