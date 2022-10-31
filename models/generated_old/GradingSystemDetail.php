<?php

namespace app\models\generated;

use Yii;

/**
 * This is the model class for table "GRADING_SYSTEM_DETAILS".
 *
 * @property int $GRADING_SYSTEM_DETAIL_ID
 * @property int $GRADING_SYSTEM_ID
 * @property float $LOWER_BOUND
 * @property float $UPPER_BOUND
 * @property string $GRADE
 * @property float|null $GRADE_POINT
 * @property string $IS_ACTIVE
 *
 * @property GradingSystem $gRADINGSYSTEM
 */
class GradingSystemDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'GRADING_SYSTEM_DETAILS';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['GRADING_SYSTEM_DETAIL_ID', 'GRADING_SYSTEM_ID'], 'integer'],
            [['GRADING_SYSTEM_ID', 'LOWER_BOUND', 'UPPER_BOUND'], 'required'],
            [['LOWER_BOUND', 'UPPER_BOUND', 'GRADE_POINT'], 'number'],
            [['GRADE'], 'string', 'max' => 2],
            [['IS_ACTIVE'], 'string', 'max' => 10],
            [['GRADING_SYSTEM_DETAIL_ID'], 'unique'],
            [['GRADING_SYSTEM_ID'], 'exist', 'skipOnError' => true, 'targetClass' => GradingSystem::className(), 'targetAttribute' => ['GRADING_SYSTEM_ID' => 'GRADING_SYSTEM_ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'GRADING_SYSTEM_DETAIL_ID' => 'Grading System Detail ID',
            'GRADING_SYSTEM_ID' => 'Grading System ID',
            'LOWER_BOUND' => 'Lower Bound',
            'UPPER_BOUND' => 'Upper Bound',
            'GRADE' => 'Grade',
            'GRADE_POINT' => 'Grade Point',
            'IS_ACTIVE' => 'Is Active',
        ];
    }

    /**
     * Gets query for [[GRADINGSYSTEM]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGRADINGSYSTEM()
    {
        return $this->hasOne(GradingSystem::className(), ['GRADING_SYSTEM_ID' => 'GRADING_SYSTEM_ID']);
    }
}
