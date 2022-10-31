<?php

namespace app\models\generated;

use Yii;

/**
 * This is the model class for table "ORG_UNIT_TYPES".
 *
 * @property float $UNIT_TYPE_ID
 * @property string $UNIT_TYPE_NAME
 * @property string $STATUS
 */
class OrgUnitType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ORG_UNIT_TYPES';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['UNIT_TYPE_ID'], 'number'],
            [['UNIT_TYPE_NAME'], 'string', 'max' => 20],
            [['STATUS'], 'string', 'max' => 10],
            [['UNIT_TYPE_ID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'UNIT_TYPE_ID' => 'Unit Type ID',
            'UNIT_TYPE_NAME' => 'Unit Type Name',
            'STATUS' => 'Status',
        ];
    }
}
