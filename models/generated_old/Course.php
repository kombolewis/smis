<?php

namespace app\models\generated;

use Yii;

/**
 * This is the model class for table "COURSES".
 *
 * @property float $COURSE_ID
 * @property string $COURSE_CODE
 * @property string $COURSE_NAME
 * @property int $LEVEL_OF_STUDY
 * @property int $SEMESTER
 * @property int $ACADEMIC_HOURS
 * @property string $STATUS
 *
 * @property OrgUnitCourse[] $orgUnitCourses
 * @property ProgCurriculumCourse[] $progCurriculumCourses
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'COURSES';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['COURSE_ID'], 'number'],
            [['LEVEL_OF_STUDY', 'SEMESTER', 'ACADEMIC_HOURS'], 'required'],
            [['LEVEL_OF_STUDY', 'SEMESTER', 'ACADEMIC_HOURS'], 'integer'],
            [['COURSE_CODE'], 'string', 'max' => 8],
            [['COURSE_NAME'], 'string', 'max' => 150],
            [['STATUS'], 'string', 'max' => 10],
            [['COURSE_ID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'COURSE_ID' => 'Course ID',
            'COURSE_CODE' => 'Course Code',
            'COURSE_NAME' => 'Course Name',
            'LEVEL_OF_STUDY' => 'Level Of Study',
            'SEMESTER' => 'Semester',
            'ACADEMIC_HOURS' => 'Academic Hours',
            'STATUS' => 'Status',
        ];
    }

    /**
     * Gets query for [[OrgUnitCourses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrgUnitCourses()
    {
        return $this->hasMany(OrgUnitCourse::className(), ['COURSE_ID' => 'COURSE_ID']);
    }

    /**
     * Gets query for [[ProgCurriculumCourses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProgCurriculumCourses()
    {
        return $this->hasMany(ProgCurriculumCourse::className(), ['COURSE_ID' => 'COURSE_ID']);
    }
}
