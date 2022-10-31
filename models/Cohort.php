<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cohort".
 *
 * @property int $cohort_id
 * @property string $cohort_desc
 *
 * @property CohortSession[] $cohortSessions
 * @property StudentCohortHistory[] $studentCohortHistories
 */
class Cohort extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.cohort';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cohort_desc'], 'required'],
            [['cohort_desc'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cohort_id' => 'Cohort ID',
            'cohort_desc' => 'Cohort Desc',
        ];
    }

    /**
     * Gets query for [[CohortSessions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCohortSessions()
    {
        return $this->hasMany(CohortSession::className(), ['cohort_id' => 'cohort_id']);
    }

    /**
     * Gets query for [[StudentCohortHistories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudentCohortHistories()
    {
        return $this->hasMany(StudentCohortHistory::className(), ['cohort_id' => 'cohort_id']);
    }
}
