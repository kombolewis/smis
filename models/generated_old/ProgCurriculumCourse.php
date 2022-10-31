<?php

namespace app\models\generated;

use Yii;

/**
 * This is the model class for table "PROG_CURRICULUM_COURSES".
 *
 * @property float $PROG_CURRICULUM_COURSE_ID
 * @property float $PROG_CURRICULUM_ID
 * @property float $COURSE_ID
 * @property int $CREDIT_FACTOR
 * @property int $CREDIT_HOURS
 * @property int $LEVEL_OF_STUDY
 * @property int|null $SEMESTER
 * @property float|null $PREREQUISITE
 * @property string $STATUS
 *
 * @property Course $cOURSE
 */
class ProgCurriculumCourse extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'PROG_CURRICULUM_COURSES';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PROG_CURRICULUM_COURSE_ID', 'PROG_CURRICULUM_ID', 'COURSE_ID', 'PREREQUISITE'], 'number'],
            [['PROG_CURRICULUM_ID', 'COURSE_ID', 'CREDIT_HOURS', 'LEVEL_OF_STUDY'], 'required'],
            [['CREDIT_FACTOR', 'CREDIT_HOURS', 'LEVEL_OF_STUDY', 'SEMESTER'], 'integer'],
            [['STATUS'], 'string', 'max' => 10],
            [['PROG_CURRICULUM_COURSE_ID'], 'unique'],
            [['COURSE_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['COURSE_ID' => 'COURSE_ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'PROG_CURRICULUM_COURSE_ID' => 'Prog Curriculum Course ID',
            'PROG_CURRICULUM_ID' => 'Prog Curriculum ID',
            'COURSE_ID' => 'Course ID',
            'CREDIT_FACTOR' => 'Credit Factor',
            'CREDIT_HOURS' => 'Credit Hours',
            'LEVEL_OF_STUDY' => 'Level Of Study',
            'SEMESTER' => 'Semester',
            'PREREQUISITE' => 'Prerequisite',
            'STATUS' => 'Status',
        ];
    }

    /**
     * Gets query for [[COURSE]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCOURSE()
    {
        return $this->hasOne(Course::className(), ['COURSE_ID' => 'COURSE_ID']);
    }
}
