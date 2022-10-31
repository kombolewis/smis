<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "academic_session_semester".
 *
 * @property int $acad_session_semester_id
 * @property int $acad_session_id
 * @property int $semester_code
 * @property string|null $acad_session_semester_desc
 *
 * @property AcademicSession $acadSession
 * @property ProgCurriculumSemester[] $progCurriculumSemesters
 * @property SemesterCode $semesterCode
 */
class AcademicSessionSemester extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.academic_session_semester';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['acad_session_id', 'semester_code'], 'required'],
            [['acad_session_id', 'semester_code'], 'default', 'value' => null],
            [['acad_session_id', 'semester_code'], 'integer'],
            [['acad_session_semester_desc'], 'string', 'max' => 50],
            [['acad_session_id'], 'exist', 'skipOnError' => true, 'targetClass' => AcademicSession::className(), 'targetAttribute' => ['acad_session_id' => 'acad_session_id']],
            [['semester_code'], 'exist', 'skipOnError' => true, 'targetClass' => SemesterCode::className(), 'targetAttribute' => ['semester_code' => 'semester_code']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'acad_session_semester_id' => 'Acad Session Semester ID',
            'acad_session_id' => 'Acad Session ID',
            'semester_code' => 'Semester Code',
            'acad_session_semester_desc' => 'Acad Session Semester Desc',
        ];
    }

    /**
     * Gets query for [[AcadSession]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAcadSession()
    {
        return $this->hasOne(AcademicSession::className(), ['acad_session_id' => 'acad_session_id']);
    }

    /**
     * Gets query for [[ProgCurriculumSemesters]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProgCurriculumSemesters()
    {
        return $this->hasMany(ProgCurriculumSemester::className(), ['acad_session_semester_id' => 'acad_session_semester_id']);
    }

    /**
     * Gets query for [[SemesterCode]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSemesterCode()
    {
        return $this->hasOne(SemesterCode::className(), ['semester_code' => 'semester_code']);
    }
}
