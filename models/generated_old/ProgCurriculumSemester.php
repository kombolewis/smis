<?php

namespace app\models\generated;

use Yii;

/**
 * This is the model class for table "PROG_CURRICULUM_SEMESTER".
 *
 * @property float $PROG_CURRICULUM_SEMESTER_ID
 * @property float $PROG_CURRICULUM_ID
 * @property float $ACAD_SESSION_SEMESTER_ID
 *
 * @property ProgrammeCurriculum $pROGCURRICULUM
 */
class ProgCurriculumSemester extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'PROG_CURRICULUM_SEMESTER';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PROG_CURRICULUM_SEMESTER_ID', 'PROG_CURRICULUM_ID', 'ACAD_SESSION_SEMESTER_ID'], 'number'],
            [['PROG_CURRICULUM_ID', 'ACAD_SESSION_SEMESTER_ID'], 'required'],
            [['PROG_CURRICULUM_SEMESTER_ID'], 'unique'],
            [['PROG_CURRICULUM_ID'], 'exist', 'skipOnError' => true, 'targetClass' => ProgrammeCurriculum::className(), 'targetAttribute' => ['PROG_CURRICULUM_ID' => 'PROG_CURRICULUM_ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'PROG_CURRICULUM_SEMESTER_ID' => 'Prog Curriculum Semester ID',
            'PROG_CURRICULUM_ID' => 'Prog Curriculum ID',
            'ACAD_SESSION_SEMESTER_ID' => 'Acad Session Semester ID',
        ];
    }

    /**
     * Gets query for [[PROGCURRICULUM]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPROGCURRICULUM()
    {
        return $this->hasOne(ProgrammeCurriculum::className(), ['PROG_CURRICULUM_ID' => 'PROG_CURRICULUM_ID']);
    }
}
