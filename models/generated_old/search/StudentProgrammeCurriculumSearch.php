<?php

namespace app\models\generated\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\generated\StudentProgrammeCurriculum;

/**
 * StudentProgrammeCurriculumSearch represents the model behind the search form of `app\models\generated\StudentProgrammeCurriculum`.
 */
class StudentProgrammeCurriculumSearch extends StudentProgrammeCurriculum
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['STUDENT_PROG_CURRICULUM_ID', 'STUDENT_ID', 'PROG_CURRICULUM_ID'], 'number'],
            [['REGISTRATION_NUMBER'], 'safe'],
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
        $query = StudentProgrammeCurriculum::find();

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
            'STUDENT_PROG_CURRICULUM_ID' => $this->STUDENT_PROG_CURRICULUM_ID,
            'STUDENT_ID' => $this->STUDENT_ID,
            'PROG_CURRICULUM_ID' => $this->PROG_CURRICULUM_ID,
        ]);

        $query->andFilterWhere(['like', 'REGISTRATION_NUMBER', $this->REGISTRATION_NUMBER]);

        return $dataProvider;
    }
}
