<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\OptionCourse;

/**
 * OptionCourseSearch represents the model behind the search form of `app\models\OptionCourse`.
 */
class OptionCourseSearch extends OptionCourse
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['option_course_id', 'option_id', 'course_id', 'prog_cur_id'], 'integer'],
            [['course_type', 'degree_code'], 'safe'],
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
        $query = OptionCourse::find();

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
            'option_course_id' => $this->option_course_id,
            'option_id' => $this->option_id,
            'course_id' => $this->course_id,
            'prog_cur_id' => $this->prog_cur_id,
        ]);

        $query->andFilterWhere(['ilike', 'course_type', $this->course_type])
            ->andFilterWhere(['ilike', 'degree_code', $this->degree_code]);

        return $dataProvider;
    }
}
