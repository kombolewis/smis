<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cohort_session".
 *
 * @property int $cohort_session_id
 * @property string $cohort_session_name
 * @property int $cohort_id
 * @property int $prog_curriculum_semester_id
 * @property string $status
 *
 * @property Cohort $cohort
 * @property ProgCurriculumSemester $progCurriculumSemester
 */
class CohortSession extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.cohort_session';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cohort_session_name', 'cohort_id', 'prog_curriculum_semester_id'], 'required'],
            [['cohort_id', 'prog_curriculum_semester_id'], 'default', 'value' => null],
            [['cohort_id', 'prog_curriculum_semester_id'], 'integer'],
            [['cohort_session_name'], 'string', 'max' => 50],
            [['status'], 'string', 'max' => 10],
            [['cohort_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cohort::className(), 'targetAttribute' => ['cohort_id' => 'cohort_id']],
            [['prog_curriculum_semester_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProgCurriculumSemester::className(), 'targetAttribute' => ['prog_curriculum_semester_id' => 'prog_curriculum_semester_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cohort_session_id' => 'Cohort Session ID',
            'cohort_session_name' => 'Cohort Session Name',
            'cohort_id' => 'Cohort ID',
            'prog_curriculum_semester_id' => 'Prog Curriculum Semester ID',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Cohort]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCohort()
    {
        return $this->hasOne(Cohort::className(), ['cohort_id' => 'cohort_id']);
    }

    /**
     * Gets query for [[ProgCurriculumSemester]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProgCurriculumSemester()
    {
        return $this->hasOne(ProgCurriculumSemester::className(), ['prog_curriculum_semester_id' => 'prog_curriculum_semester_id']);
    }
}
