<?php

namespace app\models\generated;

use Yii;

/**
 * This is the model class for table "PROG_CURRICULUM_SEMESTER_GROUP".
 *
 * @property float $PROG_CURRICULUM_SEM_GROUP_ID
 * @property float $PROG_CURRICULUM_SEMESTER_ID
 * @property float $STUDY_CENTRE_GROUP_ID
 * @property string $START_DATE
 * @property string|null $END_DATE
 * @property string|null $REGISTRATION_DEADLINE
 * @property string|null $DISPLAY_DATE
 * @property string $STATUS
 *
 * @property StudyCentreGroup $sTUDYCENTREGROUP
 */
class ProgCurriculumSemesterGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'PROG_CURRICULUM_SEMESTER_GROUP';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PROG_CURRICULUM_SEM_GROUP_ID', 'PROG_CURRICULUM_SEMESTER_ID', 'STUDY_CENTRE_GROUP_ID'], 'number'],
            [['PROG_CURRICULUM_SEMESTER_ID', 'STUDY_CENTRE_GROUP_ID', 'START_DATE'], 'required'],
            [['START_DATE', 'END_DATE', 'REGISTRATION_DEADLINE', 'DISPLAY_DATE'], 'safe'],
            [['STATUS'], 'string', 'max' => 10],
            [['PROG_CURRICULUM_SEM_GROUP_ID'], 'unique'],
            [['STUDY_CENTRE_GROUP_ID'], 'exist', 'skipOnError' => true, 'targetClass' => StudyCentreGroup::className(), 'targetAttribute' => ['STUDY_CENTRE_GROUP_ID' => 'STUDY_CENTRE_GROUP_ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'PROG_CURRICULUM_SEM_GROUP_ID' => 'Prog Curriculum Sem Group ID',
            'PROG_CURRICULUM_SEMESTER_ID' => 'Prog Curriculum Semester ID',
            'STUDY_CENTRE_GROUP_ID' => 'Study Centre Group ID',
            'START_DATE' => 'Start Date',
            'END_DATE' => 'End Date',
            'REGISTRATION_DEADLINE' => 'Registration Deadline',
            'DISPLAY_DATE' => 'Display Date',
            'STATUS' => 'Status',
        ];
    }

    /**
     * Gets query for [[STUDYCENTREGROUP]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSTUDYCENTREGROUP()
    {
        return $this->hasOne(StudyCentreGroup::className(), ['STUDY_CENTRE_GROUP_ID' => 'STUDY_CENTRE_GROUP_ID']);
    }
}
