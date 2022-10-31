<?php

namespace app\models\generated;

use Yii;

/**
 * This is the model class for table "PROGRAMMES".
 *
 * @property float $PROG_ID
 * @property string $PROG_CODE
 * @property string $PROG_SHORT_NAME
 * @property string $PROG_FULL_NAME
 * @property float $PROG_TYPE_ID
 * @property float $PROG_CAT_ID
 * @property string $PROG_PREFIX
 * @property string $STATUS
 *
 * @property ProgrammeType $progType
 * @property ProgrammeCategory $progCategory
 */
class Programme extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'PROGRAMMES';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PROG_ID', 'PROG_TYPE_ID', 'PROG_CAT_ID'], 'number'],
            [['PROG_TYPE_ID', 'PROG_CAT_ID'], 'required'],
            [['PROG_CODE'], 'string', 'max' => 6],
            [['PROG_SHORT_NAME'], 'string', 'max' => 100],
            [['PROG_FULL_NAME'], 'string', 'max' => 200],
            [['PROG_PREFIX', 'STATUS'], 'string', 'max' => 10],
            [['PROG_ID'], 'unique'],
            [['PROG_TYPE_ID'], 'exist', 'skipOnError' => true, 'targetClass' => ProgrammeType::className(), 'targetAttribute' => ['PROG_TYPE_ID' => 'PROG_TYPE_ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'PROG_ID' => 'Prog ID',
            'PROG_CODE' => 'Prog Code',
            'PROG_SHORT_NAME' => 'Prog Short Name',
            'PROG_FULL_NAME' => 'Prog Full Name',
            'PROG_TYPE_ID' => 'Prog Type ID',
            'PROG_CAT_ID' => 'Prog Cat ID',
            'PROG_PREFIX' => 'Prog Prefix',
            'STATUS' => 'Status',
        ];
    }

    /**
     * Gets query for [[PROGTYPE]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProgType()
    {
        return $this->hasOne(ProgrammeType::class, ['PROG_TYPE_ID' => 'PROG_TYPE_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgCategory()
    {
        return $this->hasOne(ProgrammeCategory::class, ['PROG_CAT_ID' => 'PROG_CAT_ID']);
    }
}
