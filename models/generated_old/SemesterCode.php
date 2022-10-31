<?php

namespace app\models\generated;

use Yii;

/**
 * This is the model class for table "SEMESTER_CODES".
 *
 * @property int $SEMESTER_CODE
 * @property string $SEMSTER_NAME
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
        return 'SEMESTER_CODES';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['SEMESTER_CODE'], 'required'],
            [['SEMESTER_CODE'], 'integer'],
            [['SEMSTER_NAME'], 'string', 'max' => 30],
            [['SEMESTER_CODE'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'SEMESTER_CODE' => 'Semester Code',
            'SEMSTER_NAME' => 'Semster Name',
        ];
    }

    /**
     * Gets query for [[AcademicSessionSemesters]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAcademicSessionSemesters()
    {
        return $this->hasMany(AcademicSessionSemester::className(), ['SEMESTER_CODE' => 'SEMESTER_CODE']);
    }
}
