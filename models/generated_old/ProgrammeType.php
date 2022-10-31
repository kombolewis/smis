<?php

namespace app\models\generated;

use Yii;

/**
 * This is the model class for table "PROGRAMME_TYPE".
 *
 * @property float $PROG_TYPE_ID
 * @property string $PROG_TYPE_CODE
 * @property string $PROG_TYPE_NAME
 * @property int|null $PROG_TYPE_ORDER
 * @property string $STATUS
 *
 * @property Programme[] $programmes
 */
class ProgrammeType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'PROGRAMME_TYPE';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PROG_TYPE_ID'], 'number'],
            [['PROG_TYPE_ORDER'], 'integer'],
            [['PROG_TYPE_CODE'], 'string', 'max' => 15],
            [['PROG_TYPE_NAME'], 'string', 'max' => 60],
            [['STATUS'], 'string', 'max' => 10],
            [['PROG_TYPE_ID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'PROG_TYPE_ID' => 'Prog Type ID',
            'PROG_TYPE_CODE' => 'Prog Type Code',
            'PROG_TYPE_NAME' => 'Prog Type Name',
            'PROG_TYPE_ORDER' => 'Prog Type Order',
            'STATUS' => 'Status',
        ];
    }

    /**
     * Gets query for [[Programmes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProgrammes()
    {
        return $this->hasMany(Programme::className(), ['PROG_TYPE_ID' => 'PROG_TYPE_ID']);
    }
}
