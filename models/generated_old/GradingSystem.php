<?php

namespace app\models\generated;

use Yii;

/**
 * This is the model class for table "GRADING_SYSTEM".
 *
 * @property int $GRADING_SYSTEM_ID
 * @property string $GRADING_SYSTEM_NAME
 * @property string $GRADING_SYSTEM_DESC
 * @property string $STATUS
 *
 * @property GradingSystemDetail[] $gradingSystemDetails
 * @property ProgrammeCurriculum[] $programmeCurriculums
 */
class GradingSystem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'GRADING_SYSTEM';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['GRADING_SYSTEM_ID'], 'integer'],
            [['GRADING_SYSTEM_NAME'], 'string', 'max' => 20],
            [['GRADING_SYSTEM_DESC'], 'string', 'max' => 60],
            [['STATUS'], 'string', 'max' => 10],
            [['GRADING_SYSTEM_ID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'GRADING_SYSTEM_ID' => 'Grading System ID',
            'GRADING_SYSTEM_NAME' => 'Grading System Name',
            'GRADING_SYSTEM_DESC' => 'Grading System Desc',
            'STATUS' => 'Status',
        ];
    }

    /**
     * Gets query for [[GradingSystemDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGradingSystemDetails()
    {
        return $this->hasMany(GradingSystemDetail::className(), ['GRADING_SYSTEM_ID' => 'GRADING_SYSTEM_ID']);
    }

    /**
     * Gets query for [[ProgrammeCurriculums]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProgrammeCurriculums()
    {
        return $this->hasMany(ProgrammeCurriculum::className(), ['GRADING_SYSTEM_ID' => 'GRADING_SYSTEM_ID']);
    }
}
