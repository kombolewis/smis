<?php

namespace app\models\generated;

use Yii;

/**
 * This is the model class for table "COURSE_REG_TYPE_ID".
 *
 * @property float $COURSE_REG_TYPE_ID
 * @property string $COURSE_REG_TYPE_CODE FA,SUPP,RETAKE
 * @property string|null $COURSE_REG_TYPE_NAME FIRST ATTEMPT, SUPPLIMENTARY,RETAKE
 * @property string|null $COURSE_REG_ENTRY_TYPE ORIGINAL,PASSMARK
 */
class CourseRegTypeId extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'COURSE_REG_TYPE_ID';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['COURSE_REG_TYPE_ID'], 'number'],
            [['COURSE_REG_TYPE_CODE'], 'string', 'max' => 10],
            [['COURSE_REG_TYPE_NAME', 'COURSE_REG_ENTRY_TYPE'], 'string', 'max' => 20],
            [['COURSE_REG_TYPE_ID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'COURSE_REG_TYPE_ID' => 'Course Reg Type ID',
            'COURSE_REG_TYPE_CODE' => 'Course Reg Type Code',
            'COURSE_REG_TYPE_NAME' => 'Course Reg Type Name',
            'COURSE_REG_ENTRY_TYPE' => 'Course Reg Entry Type',
        ];
    }
}
