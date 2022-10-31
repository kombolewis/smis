<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "academic_session".
 *
 * @property int $acad_session_id
 * @property string $acad_session_name
 * @property string|null $acad_session_desc
 * @property string $start_date
 * @property string $end_date
 *
 * @property AcademicSessionSemester[] $academicSessionSemesters
 */
class AcademicSession extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.academic_session';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['acad_session_name', 'start_date', 'end_date'], 'required'],
            [['start_date', 'end_date'], 'safe'],
            [['acad_session_name'], 'string', 'max' => 50],
            [['acad_session_desc'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'acad_session_id' => 'Acad Session ID',
            'acad_session_name' => 'Acad Session Name',
            'acad_session_desc' => 'Acad Session Desc',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
        ];
    }

    /**
     * Gets query for [[AcademicSessionSemesters]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAcademicSessionSemesters()
    {
        return $this->hasMany(AcademicSessionSemester::className(), ['acad_session_id' => 'acad_session_id']);
    }
}
