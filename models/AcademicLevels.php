<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "academic_levels".
 *
 * @property int $academic_level_id
 * @property int $academic_level
 * @property string $academic_level_name
 * @property int|null $academic_level_order
 * @property string $status
 *
 * @property StudentSemSessionProgress[] $studentSemSessionProgresses
 */
class AcademicLevels extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.org_academic_levels';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['academic_level', 'academic_level_name'], 'required'],
            [['academic_level', 'academic_level_order'], 'default', 'value' => null],
            [['academic_level', 'academic_level_order'], 'integer'],
            [['academic_level_name'], 'string', 'max' => 20],
            [['status'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'academic_level_id' => 'Academic Level ID',
            'academic_level' => 'Academic Level',
            'academic_level_name' => 'Academic Level Name',
            'academic_level_order' => 'Academic Level Order',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[StudentSemSessionProgresses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudentSemSessionProgresses()
    {
        return $this->hasMany(StudentSemSessionProgress::className(), ['academic_level_id' => 'academic_level_id']);
    }
}
