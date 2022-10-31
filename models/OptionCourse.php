<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "option_course".
 *
 * @property int $option_course_id
 * @property int $option_id
 * @property int $course_id
 * @property int $prog_cur_id
 * @property string $course_type
 * @property string|null $degree_code
 *
 * @property Option $option
 */
class OptionCourse extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.option_courses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['option_course_id', 'option_id', 'course_id', 'prog_cur_id', 'course_type'], 'required'],
            [['option_course_id', 'option_id', 'course_id', 'prog_cur_id'], 'default', 'value' => null],
            [['option_course_id', 'option_id', 'course_id', 'prog_cur_id'], 'integer'],
            [['course_type'], 'string', 'max' => 15],
            [['degree_code'], 'string', 'max' => 10],
            [['option_course_id'], 'unique'],
            [['option_id'], 'exist', 'skipOnError' => true, 'targetClass' => Option::className(), 'targetAttribute' => ['option_id' => 'option_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'option_course_id' => 'Option Course ID',
            'option_id' => 'Option ID',
            'course_id' => 'Course ID',
            'prog_cur_id' => 'Prog Cur ID',
            'course_type' => 'Course Type',
            'degree_code' => 'Degree Code',
        ];
    }

    /**
     * Gets query for [[Option]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOption()
    {
        return $this->hasOne(Option::className(), ['option_id' => 'option_id']);
    }
}
