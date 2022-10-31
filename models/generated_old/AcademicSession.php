<?php

namespace app\models\generated;

use Yii;

/**
 * This is the model class for table "ACADEMIC_SESSION".
 *
 * @property int $ACAD_SESSION_ID
 * @property string $ACAD_SESSION_NAME
 * @property string|null $ACAD_SESSION_DESC
 * @property string $START_DATE
 * @property string $END_DATE
 */
class AcademicSession extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ACADEMIC_SESSION';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ACAD_SESSION_ID'], 'integer'],
            [['START_DATE', 'END_DATE'], 'required'],
            [['START_DATE', 'END_DATE'], 'safe'],
            [['ACAD_SESSION_NAME'], 'string', 'max' => 20],
            [['ACAD_SESSION_DESC'], 'string', 'max' => 100],
            [['ACAD_SESSION_ID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ACAD_SESSION_ID' => 'Acad Session ID',
            'ACAD_SESSION_NAME' => 'Acad Session Name',
            'ACAD_SESSION_DESC' => 'Acad Session Desc',
            'START_DATE' => 'Start Date',
            'END_DATE' => 'End Date',
        ];
    }
}
