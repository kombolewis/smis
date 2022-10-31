<?php

namespace app\models\generated;

use Yii;

/**
 * This is the model class for table "STUDENT_SEMESTER_GROUP".
 *
 * @property float $STUDENT_SEMESTER_GROUP_ID
 * @property float $PROG_CURRICULUM_SEMESTER_ID
 * @property float $STUDENT_SEMESTER_SESSION_ID
 * @property string $STATUS
 *
 * @property ProgCurriculumSemester $pROGCURRICULUMSEMESTER
 */
class StudentSemesterGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'STUDENT_SEMESTER_GROUP';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['STUDENT_SEMESTER_GROUP_ID', 'PROG_CURRICULUM_SEMESTER_ID', 'STUDENT_SEMESTER_SESSION_ID'], 'number'],
            [['PROG_CURRICULUM_SEMESTER_ID', 'STUDENT_SEMESTER_SESSION_ID'], 'required'],
            [['STATUS'], 'string', 'max' => 10],
            [['STUDENT_SEMESTER_GROUP_ID'], 'unique'],
            [['PROG_CURRICULUM_SEMESTER_ID'], 'exist', 'skipOnError' => true, 'targetClass' => ProgCurriculumSemester::className(), 'targetAttribute' => ['PROG_CURRICULUM_SEMESTER_ID' => 'PROG_CURRICULUM_SEMESTER_ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'STUDENT_SEMESTER_GROUP_ID' => 'Student Semester Group ID',
            'PROG_CURRICULUM_SEMESTER_ID' => 'Prog Curriculum Semester ID',
            'STUDENT_SEMESTER_SESSION_ID' => 'Student Semester Session ID',
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
