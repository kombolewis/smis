<?php

namespace app\models\generated;

use Yii;

/**
 * This is the model class for table "ACADEMIC_LEVELS".
 *
 * @property float $ACADEMIC_LEVEL_ID
 * @property int $ACADEMIC_LEVEL
 * @property string $ACADEMIC_LEVEL_NAME
 * @property int|null $ACADEMIC_LEVEL_ORDER
 * @property string $STATUS
 */
class AcademicLevel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ACADEMIC_LEVELS';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ACADEMIC_LEVEL_ID'], 'number'],
            [['ACADEMIC_LEVEL'], 'required'],
            [['ACADEMIC_LEVEL', 'ACADEMIC_LEVEL_ORDER'], 'integer'],
            [['ACADEMIC_LEVEL_NAME'], 'string', 'max' => 20],
            [['STATUS'], 'string', 'max' => 10],
            [['ACADEMIC_LEVEL_ID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ACADEMIC_LEVEL_ID' => 'Academic Level ID',
            'ACADEMIC_LEVEL' => 'Academic Level',
            'ACADEMIC_LEVEL_NAME' => 'Academic Level Name',
            'ACADEMIC_LEVEL_ORDER' => 'Academic Level Order',
            'STATUS' => 'Status',
        ];
    }
}
