<?php

namespace app\models\generated;

use Yii;

/**
 * This is the model class for table "ORG_UNIT_HEADS".
 *
 * @property float $UNIT_HEAD_ID
 * @property string $UNIT_HEAD_NAME PRINCIPAL,DIRECTOR,CHAIRMAN
 * @property string $STATUS
 */
class OrgUnitHead extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ORG_UNIT_HEADS';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['UNIT_HEAD_ID'], 'number'],
            [['UNIT_HEAD_NAME'], 'string', 'max' => 20],
            [['STATUS'], 'string', 'max' => 10],
            [['UNIT_HEAD_ID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'UNIT_HEAD_ID' => 'Unit Head ID',
            'UNIT_HEAD_NAME' => 'Unit Head Name',
            'STATUS' => 'Status',
        ];
    }
}
