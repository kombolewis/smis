<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "programme_type".
 *
 * @property int $prog_type_id
 * @property string $prog_type_code
 * @property string $prog_type_name
 * @property int $prog_type_order
 * @property string $status
 *
 * @property Programmes[] $programmes
 */
class ProgrammeType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.programme_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prog_type_code', 'prog_type_name', 'prog_type_order'], 'required'],
            [['prog_type_order'], 'default', 'value' => null],
            [['prog_type_order'], 'integer'],
            [['prog_type_code'], 'string', 'max' => 15],
            [['prog_type_name'], 'string', 'max' => 150],
            [['status'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'prog_type_id' => 'Prog Type ID',
            'prog_type_code' => 'Prog Type Code',
            'prog_type_name' => 'Prog Type Name',
            'prog_type_order' => 'Prog Type Order',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Programmes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProgrammes()
    {
        return $this->hasMany(Programmes::className(), ['prog_type_id' => 'prog_type_id']);
    }
}
