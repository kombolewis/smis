<?php

namespace app\models\generated;

use Yii;

/**
 * This is the model class for table "ORG_UNIT_COURSES".
 *
 * @property float $ORG_UNIT_COURSE_ID
 * @property float $COURSE_ID
 * @property float $ORG_UNIT_ID
 * @property float $ORG_TEACHING_ID
 * @property string $START_DATE
 * @property string|null $END_DATE
 * @property float $USER_ID
 *
 * @property Course $cOURSE
 */
class OrgUnitCourse extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ORG_UNIT_COURSES';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ORG_UNIT_COURSE_ID', 'COURSE_ID', 'ORG_UNIT_ID', 'ORG_TEACHING_ID', 'USER_ID'], 'number'],
            [['COURSE_ID', 'ORG_UNIT_ID', 'ORG_TEACHING_ID', 'START_DATE', 'USER_ID'], 'required'],
            [['START_DATE', 'END_DATE'], 'safe'],
            [['ORG_UNIT_COURSE_ID'], 'unique'],
            [['COURSE_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['COURSE_ID' => 'COURSE_ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ORG_UNIT_COURSE_ID' => 'Org Unit Course ID',
            'COURSE_ID' => 'Course ID',
            'ORG_UNIT_ID' => 'Org Unit ID',
            'ORG_TEACHING_ID' => 'Org Teaching ID',
            'START_DATE' => 'Start Date',
            'END_DATE' => 'End Date',
            'USER_ID' => 'User ID',
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
