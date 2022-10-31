<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prog_curriculum_semester".
 *
 * @property int $prog_curriculum_semester_id
 * @property int $prog_curriculum_id
 * @property int $acad_session_semester_id
 *
 * @property AcademicSessionSemester $acadSessionSemester
 * @property CohortSession[] $cohortSessions
 * @property ProgrammeCurriculum $progCurriculum
 * @property ProgCurriculumSemesterGroup[] $progCurriculumSemesterGroups
 * @property StudentSemesterGroup[] $studentSemesterGroups
 */
class ProgCurriculumSemester extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.prog_curriculum_semester';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prog_curriculum_id', 'acad_session_semester_id'], 'required'],
            [['prog_curriculum_id', 'acad_session_semester_id'], 'default', 'value' => null],
            [['prog_curriculum_id', 'acad_session_semester_id'], 'integer'],
            [['acad_session_semester_id'], 'exist', 'skipOnError' => true, 'targetClass' => AcademicSessionSemester::className(), 'targetAttribute' => ['acad_session_semester_id' => 'acad_session_semester_id']],
            [['prog_curriculum_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProgrammeCurriculum::className(), 'targetAttribute' => ['prog_curriculum_id' => 'prog_curriculum_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'prog_curriculum_semester_id' => 'Prog Curriculum Semester ID',
            'prog_curriculum_id' => 'Prog Curriculum ID',
            'acad_session_semester_id' => 'Acad Session Semester ID',
        ];
    }

    /**
     * Gets query for [[AcadSessionSemester]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAcadSessionSemester()
    {
        return $this->hasOne(AcademicSessionSemester::className(), ['acad_session_semester_id' => 'acad_session_semester_id']);
    }

    /**
     * Gets query for [[CohortSessions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCohortSessions()
    {
        return $this->hasMany(CohortSession::className(), ['prog_curriculum_semester_id' => 'prog_curriculum_semester_id']);
    }

    /**
     * Gets query for [[ProgCurriculum]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProgCurriculum()
    {
        return $this->hasOne(ProgrammeCurriculum::className(), ['prog_curriculum_id' => 'prog_curriculum_id']);
    }

    /**
     * Gets query for [[ProgCurriculumSemesterGroups]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProgCurriculumSemesterGroups()
    {
        return $this->hasMany(ProgCurriculumSemesterGroup::className(), ['prog_curriculum_semester_id' => 'prog_curriculum_semester_id']);
    }

    /**
     * Gets query for [[StudentSemesterGroups]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudentSemesterGroups()
    {
        return $this->hasMany(StudentSemesterGroup::className(), ['prog_curriculum_semester_id' => 'prog_curriculum_semester_id']);
    }
}
