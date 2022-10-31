<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\OrgUnitHistory;

/**
 * OrgUnitHistorySearch represents the model behind the search form of `app\models\OrgUnitHistory`.
 */
class OrgUnitHistorySearch extends OrgUnitHistory
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['org_unit_history_id', 'org_unit_id', 'org_type_id', 'parent_id', 'successor_id', 'unit_head_id', 'unit_head_user_id', 'user_id'], 'integer'],
            [['start_date', 'end_date', 'date_created'], 'safe'],
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
        $query = OrgUnitHistory::find();

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
            'org_unit_history_id' => $this->org_unit_history_id,
            'org_unit_id' => $this->org_unit_id,
            'org_type_id' => $this->org_type_id,
            'parent_id' => $this->parent_id,
            'successor_id' => $this->successor_id,
            'unit_head_id' => $this->unit_head_id,
            'unit_head_user_id' => $this->unit_head_user_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'user_id' => $this->user_id,
            'date_created' => $this->date_created,
        ]);

        return $dataProvider;
    }
}
