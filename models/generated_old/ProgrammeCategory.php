<?php

namespace app\models\generated;

use Yii;

/**
 * This is the model class for table "PROGRAMME_CATEGORY".
 *
 * @property int $PROG_CAT_ID
 * @property string $PROG_CAT_CODE
 * @property string $PROG_CAT_NAME
 * @property int $PROG_CAT_ORDER
 * @property string $STATUS
 */
class ProgrammeCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'PROGRAMME_CATEGORY';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PROG_CAT_ID', 'PROG_CAT_ORDER'], 'integer'],
            [['PROG_CAT_CODE'], 'string', 'max' => 20],
            [['PROG_CAT_NAME'], 'string', 'max' => 60],
            [['STATUS'], 'string', 'max' => 10],
            [['PROG_CAT_ID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'PROG_CAT_ID' => 'Prog Cat ID',
            'PROG_CAT_CODE' => 'Prog Cat Code',
            'PROG_CAT_NAME' => 'Prog Cat Name',
            'PROG_CAT_ORDER' => 'Prog Cat Order',
            'STATUS' => 'Status',
        ];
    }
}
