<?php

namespace app\models\generated\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\generated\Student;

/**
 * StudentSearch represents the model behind the search form of `app\models\generated\Student`.
 */
class StudentSearch extends Student
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['STUDENT_ID'], 'number'],
            [['STUDENT_NUMBER', 'SURNAME', 'OTHER_NAMES', 'GENDER', 'NATIONALITY', 'DOB', 'ID_NO', 'PASSPORT_NO', 'BIRTH_CERT_NO','SPONSOR'], 'safe'],
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
        $query = Student::find();

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
            'STUDENT_ID' => $this->STUDENT_ID,
            'SPONSOR' => $this->SPONSOR,
        ]);

        $query->andFilterWhere(['like', 'STUDENT_NUMBER', $this->STUDENT_NUMBER])
            ->andFilterWhere(['like', 'SURNAME', $this->SURNAME])
            ->andFilterWhere(['like', 'OTHER_NAMES', $this->OTHER_NAMES])
            ->andFilterWhere(['like', 'GENDER', $this->GENDER])
            ->andFilterWhere(['like', 'NATIONALITY', $this->NATIONALITY])
            ->andFilterWhere(['like', "TO_CHAR(DOB,'DD-MON-YYYY')", strtoupper((string) $this->DOB)])
            ->andFilterWhere(['like', 'ID_NO', $this->ID_NO])
            ->andFilterWhere(['like', 'PASSPORT_NO', $this->PASSPORT_NO])
//            ->andFilterWhere(['like', 'BIRTH_CERT_NO', $this->BIRTH_CERT_NO]);
        ;

        return $dataProvider;
    }
}
