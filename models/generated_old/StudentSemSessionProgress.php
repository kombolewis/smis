<?php

namespace app\models\generated;

use Yii;

/**
 * This is the model class for table "STUDENT_SEM_SESSION_PROGRESS".
 *
 * @property float $STUDENT_SEMESTER_SESSION_ID
 * @property float $STUDENT_PROG_CURRICULUM_ID
 * @property int|null $SEMESTER_PROGRESS
 * @property string $REGISTRATION_DATE
 * @property float $ACADEMIC_LEVEL_ID
 * @property float $SEM_PROGRESS_NUMBER
 * @property int|null $BILLABLE
 * @property string $STATUS
 *
 * @property StudentProgrammeCurriculum $sTUDENTPROGCURRICULUM
 */
class StudentSemSessionProgress extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'STUDENT_SEM_SESSION_PROGRESS';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['STUDENT_SEMESTER_SESSION_ID', 'STUDENT_PROG_CURRICULUM_ID', 'ACADEMIC_LEVEL_ID', 'SEM_PROGRESS_NUMBER'], 'number'],
            [['STUDENT_PROG_CURRICULUM_ID', 'REGISTRATION_DATE', 'ACADEMIC_LEVEL_ID', 'SEM_PROGRESS_NUMBER'], 'required'],
            [['SEMESTER_PROGRESS', 'BILLABLE'], 'integer'],
            [['REGISTRATION_DATE'], 'safe'],
            [['STATUS'], 'string', 'max' => 10],
            [['STUDENT_SEMESTER_SESSION_ID'], 'unique'],
            [['STUDENT_PROG_CURRICULUM_ID'], 'exist', 'skipOnError' => true, 'targetClass' => StudentProgrammeCurriculum::className(), 'targetAttribute' => ['STUDENT_PROG_CURRICULUM_ID' => 'STUDENT_PROG_CURRICULUM_ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'STUDENT_SEMESTER_SESSION_ID' => 'Student Semester Session ID',
            'STUDENT_PROG_CURRICULUM_ID' => 'Student Prog Curriculum ID',
            'SEMESTER_PROGRESS' => 'Semester Progress',
            'REGISTRATION_DATE' => 'Registration Date',
            'ACADEMIC_LEVEL_ID' => 'Academic Level ID',
            'SEM_PROGRESS_NUMBER' => 'Sem Progress Number',
            'BILLABLE' => 'Billable',
            'STATUS' => 'Status',
        ];
    }

    /**
     * Gets query for [[STUDENTPROGCURRICULUM]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSTUDENTPROGCURRICULUM()
    {
        return $this->hasOne(StudentProgrammeCurriculum::className(), ['STUDENT_PROG_CURRICULUM_ID' => 'STUDENT_PROG_CURRICULUM_ID']);
    }
}
