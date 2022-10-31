<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "option".
 *
 * @property int $option_id
 * @property string $option_code
 * @property string $option_name
 * @property string $degree_id
 * @property string|null $option_desc
 * @property string $option_status
 * @property string|null $progress_type
 *
 * @property OptionCourse[] $optionCourses
 */
class Option extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.option';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['option_id', 'option_code', 'option_name', 'degree_id', 'option_status'], 'required'],
            [['option_id'], 'default', 'value' => null],
            [['option_id'], 'integer'],
            [['option_code', 'degree_id'], 'string', 'max' => 10],
            [['option_name'], 'string', 'max' => 25],
            [['option_desc'], 'string', 'max' => 150],
            [['option_status', 'progress_type'], 'string', 'max' => 12],
            [['option_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'option_id' => 'Option ID',
            'option_code' => 'Option Code',
            'option_name' => 'Option Name',
            'degree_id' => 'Degree ID',
            'option_desc' => 'Option Desc',
            'option_status' => 'Option Status',
            'progress_type' => 'Progress Type',
        ];
    }

    /**
     * Gets query for [[OptionCourses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOptionCourses()
    {
        return $this->hasMany(OptionCourse::className(), ['option_id' => 'option_id']);
    }
}
