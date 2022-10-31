<?php

namespace app\models\generated;

use Yii;

/**
 * This is the model class for table "PROGRAMME_CURRICULUM_UNIT".
 *
 * @property float $PROG_CURRICULUM_UNIT_ID
 * @property float $ORG_UNIT_HISTORY_ID
 * @property float $PROG_CURRICULUM_ID
 * @property string $START_DATE
 * @property string|null $END_DATE
 * @property string $STATUS
 *
 * @property ProgrammeCurriculum $programmeCurriculum
 */
class ProgrammeCurriculumUnit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'PROGRAMME_CURRICULUM_UNIT';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PROG_CURRICULUM_UNIT_ID', 'ORG_UNIT_HISTORY_ID', 'PROG_CURRICULUM_ID'], 'number'],
            [['ORG_UNIT_HISTORY_ID', 'PROG_CURRICULUM_ID', 'START_DATE'], 'required'],
            [['START_DATE', 'END_DATE'], 'safe'],
            [['STATUS'], 'string', 'max' => 10],
            [['PROG_CURRICULUM_UNIT_ID'], 'unique'],
            [['PROG_CURRICULUM_ID'], 'exist', 'skipOnError' => true, 'targetClass' => ProgrammeCurriculum::className(), 'targetAttribute' => ['PROG_CURRICULUM_ID' => 'PROG_CURRICULUM_ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'PROG_CURRICULUM_UNIT_ID' => 'Prog Curriculum Unit ID',
            'ORG_UNIT_HISTORY_ID' => 'Org Unit History ID',
            'PROG_CURRICULUM_ID' => 'Prog Curriculum ID',
            'START_DATE' => 'Start Date',
            'END_DATE' => 'End Date',
            'STATUS' => 'Status',
        ];
    }

    /**
     * Gets query for [[PROGCURRICULUM]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProgCurriculum()
    {
        return $this->hasOne(ProgrammeCurriculum::class, ['PROG_CURRICULUM_ID' => 'PROG_CURRICULUM_ID']);
    }

}
