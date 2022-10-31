<?php

namespace app\models\generated;

use Yii;

/**
 * This is the model class for table "PROGRAMME_CURRICULUM".
 *
 * @property float $PROG_CURRICULUM_ID
 * @property float $PROG_ID
 * @property string $PROG_CURRICULUM_DESC
 * @property int $DURATION ACADEMIC SESSIONS
 * @property int $PASS_MARK
 * @property int $ANNUAL_SEMESTERS
 * @property int|null $MAX_UNITS_PER_SEMESTER
 * @property string|null $AVERAGE_TYPE
 * @property string|null $AWARD_ROUNDING ROUNDOFF, TRUNCATE
 * @property string $START_DATE
 * @property string|null $END_DATE
 * @property string|null $APPROVAL_DATE SENATE APPROVAL DATE
 * @property float $USER_ID
 * @property string $DATE_CREATED
 * @property float $GRADING_SYSTEM_ID
 * @property string $STATUS
 *
 * @property GradingSystem $gradingSystem
 * @property Programme $programme
 * @property ProgCurriculumSemester[] $progCurriculumSemesters
 */
class ProgrammeCurriculum extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'PROGRAMME_CURRICULUM';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PROG_CURRICULUM_ID', 'PROG_ID', 'USER_ID', 'GRADING_SYSTEM_ID'], 'number'],
            [['PROG_ID', 'DURATION', 'PASS_MARK', 'START_DATE', 'USER_ID', 'DATE_CREATED', 'GRADING_SYSTEM_ID'], 'required'],
            [['DURATION', 'PASS_MARK', 'ANNUAL_SEMESTERS', 'MAX_UNITS_PER_SEMESTER'], 'integer'],
            [['START_DATE', 'END_DATE', 'DATE_CREATED'], 'safe'],
            [['PROG_CURRICULUM_DESC'], 'string', 'max' => 100],
            [['AVERAGE_TYPE', 'STATUS'], 'string', 'max' => 10],
            [['AWARD_ROUNDING', 'APPROVAL_DATE'], 'string', 'max' => 20],
            [['PROG_CURRICULUM_ID'], 'unique'],
            [['GRADING_SYSTEM_ID'], 'exist', 'skipOnError' => true, 'targetClass' => GradingSystem::className(), 'targetAttribute' => ['GRADING_SYSTEM_ID' => 'GRADING_SYSTEM_ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'PROG_CURRICULUM_ID' => 'Prog Curriculum ID',
            'PROG_ID' => 'Prog ID',
            'PROG_CURRICULUM_DESC' => 'Prog Curriculum Desc',
            'DURATION' => 'ACADEMIC SESSIONS',
            'PASS_MARK' => 'Pass Mark',
            'ANNUAL_SEMESTERS' => 'Annual Semesters',
            'MAX_UNITS_PER_SEMESTER' => 'Max Units Per Semester',
            'AVERAGE_TYPE' => 'Average Type',
            'AWARD_ROUNDING' => 'ROUNDOFF, TRUNCATE',
            'START_DATE' => 'Start Date',
            'END_DATE' => 'End Date',
            'APPROVAL_DATE' => 'SENATE APPROVAL DATE',
            'USER_ID' => 'User ID',
            'DATE_CREATED' => 'Date Created',
            'GRADING_SYSTEM_ID' => 'Grading System ID',
            'STATUS' => 'Status',
        ];
    }

    /**
     * Gets query for [[GRADINGSYSTEM]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGradingSystem()
    {
        return $this->hasOne(GradingSystem::class, ['GRADING_SYSTEM_ID' => 'GRADING_SYSTEM_ID']);
    }
    public function getProgramme()
    {
        return $this->hasOne(Programme::class, ['PROG_ID' => 'PROG_ID']);
    }

    /**
     * Gets query for [[ProgCurriculumSemesters]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProgCurriculumSemesters()
    {
        return $this->hasMany(ProgCurriculumSemester::class, ['PROG_CURRICULUM_ID' => 'PROG_CURRICULUM_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgCurriculumUnits()
    {
        return $this->hasMany(ProgrammeCurriculumUnit::class, ['PROG_CURRICULUM_ID' => 'PROG_CURRICULUM_ID']);
    }
//    public function getOrgUnit()
//    {
//        return $this->hasOne(OrgUnit::class, ['orgUnit.O' => 'ORG_UNIT_ID']);
//    }
}
