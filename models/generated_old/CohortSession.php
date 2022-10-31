<?php

namespace app\models\generated;

use Yii;

/**
 * This is the model class for table "COHORT_SESSION".
 *
 * @property int $COHORT_SESSION_ID
 * @property string $COHORT_SESSION_NAME
 * @property float $COHORT_ID
 * @property float $PROG_CURRICULUM_SEMESTER_ID
 * @property string $STATUS
 *
 * @property ProgCurriculumSemester $pROGCURRICULUMSEMESTER
 */
class CohortSession extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'COHORT_SESSION';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['COHORT_SESSION_ID'], 'integer'],
            [['COHORT_ID', 'PROG_CURRICULUM_SEMESTER_ID'], 'required'],
            [['COHORT_ID', 'PROG_CURRICULUM_SEMESTER_ID'], 'number'],
            [['COHORT_SESSION_NAME'], 'string', 'max' => 20],
            [['STATUS'], 'string', 'max' => 10],
            [['COHORT_SESSION_ID'], 'unique'],
            [['PROG_CURRICULUM_SEMESTER_ID'], 'exist', 'skipOnError' => true, 'targetClass' => ProgCurriculumSemester::className(), 'targetAttribute' => ['PROG_CURRICULUM_SEMESTER_ID' => 'PROG_CURRICULUM_SEMESTER_ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'COHORT_SESSION_ID' => 'Cohort Session ID',
            'COHORT_SESSION_NAME' => 'Cohort Session Name',
            'COHORT_ID' => 'Cohort ID',
            'PROG_CURRICULUM_SEMESTER_ID' => 'Prog Curriculum Semester ID',
            'STATUS' => 'Status',
        ];
    }

    /**
     * Gets query for [[PROGCURRICULUMSEMESTER]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPROGCURRICULUMSEMESTER()
    {
        return $this->hasOne(ProgCurriculumSemester::className(), ['PROG_CURRICULUM_SEMESTER_ID' => 'PROG_CURRICULUM_SEMESTER_ID']);
    }
}
