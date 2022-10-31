<?php

namespace app\models\generated;

use Yii;

/**
 * This is the model class for table "STUDY_CENTRE".
 *
 * @property float $STUDY_CENTRE_ID
 * @property string $STUDY_CENTRE_NAME
 * @property string $STATUS
 */
class StudyCentre extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'STUDY_CENTRE';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['STUDY_CENTRE_ID'], 'number'],
            [['STUDY_CENTRE_NAME'], 'string', 'max' => 50],
            [['STATUS'], 'string', 'max' => 10],
            [['STUDY_CENTRE_ID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'STUDY_CENTRE_ID' => 'Study Centre ID',
            'STUDY_CENTRE_NAME' => 'Study Centre Name',
            'STATUS' => 'Status',
        ];
    }
}
