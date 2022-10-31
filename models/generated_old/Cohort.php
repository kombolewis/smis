<?php

namespace app\models\generated;

use Yii;

/**
 * This is the model class for table "COHORT".
 *
 * @property float $COHORT_ID
 * @property string $COHORT_DESC
 */
class Cohort extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'COHORT';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['COHORT_ID'], 'number'],
            [['COHORT_DESC'], 'string', 'max' => 20],
            [['COHORT_ID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'COHORT_ID' => 'Cohort ID',
            'COHORT_DESC' => 'Cohort Desc',
        ];
    }
}
