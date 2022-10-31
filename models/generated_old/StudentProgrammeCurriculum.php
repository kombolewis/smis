<?php

namespace app\models\generated;

use Yii;

/**
 * This is the model class for table "STUDENT_PROGRAMME_CURRICULUM".
 *
 * @property float $STUDENT_PROG_CURRICULUM_ID
 * @property float $STUDENT_ID
 * @property string $REGISTRATION_NUMBER
 * @property float $PROG_CURRICULUM_ID
 *
 * @property ProgrammeCurriculum $progCurriculum
 * @property StudentSemSessionProgress[] $studentSemSessionProgresses
 * @property Student $student
 */
class StudentProgrammeCurriculum extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'STUDENT_PROGRAMME_CURRICULUM';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['STUDENT_PROG_CURRICULUM_ID', 'STUDENT_ID', 'PROG_CURRICULUM_ID'], 'number'],
            [['STUDENT_ID', 'PROG_CURRICULUM_ID'], 'required'],
            [['REGISTRATION_NUMBER'], 'string', 'max' => 20],
            [['STUDENT_PROG_CURRICULUM_ID'], 'unique'],
            [['PROG_CURRICULUM_ID'], 'exist', 'skipOnError' => true, 'targetClass' => ProgrammeCurriculum::className(), 'targetAttribute' => ['PROG_CURRICULUM_ID' => 'PROG_CURRICULUM_ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'STUDENT_PROG_CURRICULUM_ID' => 'Student Prog Curriculum ID',
            'STUDENT_ID' => 'Student ID',
            'REGISTRATION_NUMBER' => 'Registration Number',
            'PROG_CURRICULUM_ID' => 'Prog Curriculum ID',
        ];
    }

    /**
     * Gets query for [[PROGCURRICULUM]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProgCurriculum()
    {
        return $this->hasOne(ProgrammeCurriculum::class, ['PROG_CURRICULUM_ID' => 'PROG_CURRICULUM_ID']);
    }

    /**
     * Gets query for [[StudentSemSessionProgresses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudentSemSessionProgresses()
    {
        return $this->hasMany(StudentSemSessionProgress::class, ['STUDENT_PROG_CURRICULUM_ID' => 'STUDENT_PROG_CURRICULUM_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::class, ['STUDENT_ID' => 'STUDENT_ID']);
    }
}
