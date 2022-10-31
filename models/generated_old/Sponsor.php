<?php

namespace app\models\generated;

use Yii;

/**
 * This is the model class for table "SPONSORS".
 *
 * @property int $SPONSOR_ID
 * @property string $SPONSOR_CODE
 * @property string $SPONSOR_NAME
 * @property string $STATUS
 */
class Sponsor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'SPONSORS';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['SPONSOR_ID'], 'integer'],
            [['SPONSOR_CODE', 'STATUS'], 'string', 'max' => 10],
            [['SPONSOR_NAME'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'SPONSOR_ID' => 'Sponsor ID',
            'SPONSOR_CODE' => 'Sponsor Code',
            'SPONSOR_NAME' => 'Sponsor Name',
            'STATUS' => 'Status',
        ];
    }
}
