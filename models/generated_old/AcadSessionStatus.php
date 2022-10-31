<?php

namespace app\models\generated;

use Yii;

/**
 * This is the model class for table "ACAD_SESSION_STATUS".
 *
 * @property float $ACAD_SESSION_STATUS_ID
 * @property string $ACAD_SESSION_STATUS_NAME
 * @property string $SESSION_STATUS
 */
class AcadSessionStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ACAD_SESSION_STATUS';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ACAD_SESSION_STATUS_ID'], 'number'],
            [['ACAD_SESSION_STATUS_NAME', 'SESSION_STATUS'], 'string', 'max' => 10],
            [['ACAD_SESSION_STATUS_ID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ACAD_SESSION_STATUS_ID' => 'Acad Session Status ID',
            'ACAD_SESSION_STATUS_NAME' => 'Acad Session Status Name',
            'SESSION_STATUS' => 'Session Status',
        ];
    }
}
