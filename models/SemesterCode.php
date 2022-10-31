<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "semester_code".
 *
 * @property int $semester_code
 * @property string $semster_name
 *
 * @property AcademicSessionSemester[] $academicSessionSemesters
 */
class SemesterCode extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.semester_code';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['semester_code', 'semster_name'], 'required'],
            [['semester_code'], 'default', 'value' => null],
            [['semester_code'], 'integer'],
            [['semster_name'], 'string', 'max' => 30],
            [['semester_code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'semester_code' => 'Semester Code',
            'semster_name' => 'Semster Name',
        ];
    }

    /**
     * Gets query for [[AcademicSessionSemesters]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAcademicSessionSemesters()
    {
        return $this->hasMany(AcademicSessionSemester::className(), ['semester_code' => 'semester_code']);
    }
}
