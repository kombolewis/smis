<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "smis.org_unit_head".
 *
 * @property int $unit_head_id
 * @property string $unit_head_name PRINCIPAL,DIRECTOR,CHAIRMAN
 * @property string $status
 */
class OrgUnitHead extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.org_unit_head';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['unit_head_name'], 'required'],
            [['unit_head_name'], 'string', 'max' => 50],
            [['status'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'unit_head_id' => 'Unit Head ID',
            'unit_head_name' => 'Unit Head Name',
            'status' => 'Status',
        ];
    }
}
