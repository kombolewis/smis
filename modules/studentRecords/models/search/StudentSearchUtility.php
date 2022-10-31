<?php

namespace app\modules\studentRecords\models\search;

use app\models\generated\search\StudentSearch;
use app\models\generated\Student;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * StudentSearchUtility extends `app\models\generated\search\StudentSearch`.
 * Custom search queries
 */
class StudentSearchUtility extends StudentSearch
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['STUDENT_NUMBER', 'SURNAME', 'OTHER_NAMES', 'NATIONALITY', 'ID_NO', 'PASSPORT_NO','SPONSOR' ], 'safe'],
        ];
    }
    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params): ActiveDataProvider
    {
        $query = Student::find();

        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->load($params) && $this->validate()) {
            $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'STUDENT_ID' => $this->STUDENT_ID,
            'SPONSOR' => $this->SPONSOR,
        ]);

        $query->andFilterWhere(['like', 'STUDENT_NUMBER', $this->STUDENT_NUMBER])
            ->andFilterWhere(['like', 'SURNAME', $this->SURNAME])
            ->andFilterWhere(['like', 'OTHER_NAMES', $this->OTHER_NAMES])
            ->andFilterWhere(['like', 'GENDER', $this->GENDER])
            ->andFilterWhere(['like', 'NATIONALITY', $this->NATIONALITY])
            ->andFilterWhere(['like', 'DOB', $this->DOB])
            ->andFilterWhere(['like', 'ID_NO', $this->ID_NO])
            ->andFilterWhere(['like', 'PASSPORT_NO', $this->PASSPORT_NO])
        ;

        return $dataProvider;
    }
}
