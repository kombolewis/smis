<?php

namespace app\models\generated;

use Yii;

/**
 * This is the model class for table "ACADEMIC_SESSION_SEMESTER".
 *
 * @property float $ACAD_SESSION_SEMESTER_ID
 * @property float $ACAD_SESSION_ID
 * @property float $SEMESTER_CODE
 * @property string|null $ACAD_SESSION_SEMESTER_DESC
 *
 * @property SemesterCode $sEMESTERCODE
 */
class AcademicSessionSemester extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ACADEMIC_SESSION_SEMESTER';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ACAD_SESSION_SEMESTER_ID', 'ACAD_SESSION_ID', 'SEMESTER_CODE'], 'number'],
            [['ACAD_SESSION_ID', 'SEMESTER_CODE'], 'required'],
            [['ACAD_SESSION_SEMESTER_DESC'], 'string', 'max' => 50],
            [['ACAD_SESSION_SEMESTER_ID'], 'unique'],
            [['SEMESTER_CODE'], 'exist', 'skipOnError' => true, 'targetClass' => SemesterCode::className(), 'targetAttribute' => ['SEMESTER_CODE' => 'SEMESTER_CODE']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ACAD_SESSION_SEMESTER_ID' => 'Acad Session Semester ID',
            'ACAD_SESSION_ID' => 'Acad Session ID',
            'SEMESTER_CODE' => 'Semester Code',
            'ACAD_SESSION_SEMESTER_DESC' => 'Acad Session Semester Desc',
        ];
    }

    /**
     * Gets query for [[SEMESTERCODE]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSEMESTERCODE()
    {
        return $this->hasOne(SemesterCode::className(), ['SEMESTER_CODE' => 'SEMESTER_CODE']);
    }
}
