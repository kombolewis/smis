<?php

namespace app\models;

use Yii;
use app\models\OrgUnit;
use app\models\OrgUnitHead;
use app\models\OrgUnitTypes;

/**
 * This is the model class for table "org_unit_history".
 *
 * @property int $org_unit_history_id
 * @property int $org_unit_id
 * @property int $org_type_id
 * @property int|null $parent_id
 * @property int|null $successor_id
 * @property int|null $unit_head_id
 * @property int|null $unit_head_user_id
 * @property string $start_date
 * @property string|null $end_date
 * @property int|null $user_id
 * @property string $date_created
 *
 * @property OrgUnitTypes $orgType
 * @property OrgUnits $orgUnit
 * @property ProgrammeCurriculumUnit[] $programmeCurriculumUnits
 * @property OrgUnitHead $unitHead
 */
class OrgUnitHistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.org_unit_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['org_unit_id', 'org_type_id', 'start_date'], 'required'],
            [['org_unit_id', 'org_type_id', 'parent_id', 'successor_id', 'unit_head_id', 'unit_head_user_id', 'user_id'], 'default', 'value' => null],
            [['org_unit_id', 'org_type_id', 'parent_id', 'successor_id', 'unit_head_id', 'unit_head_user_id', 'user_id'], 'integer'],
            [['start_date', 'end_date', 'date_created'], 'safe'],
            [['unit_head_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrgUnitHead::className(), 'targetAttribute' => ['unit_head_id' => 'unit_head_id']],
            [['org_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrgUnitTypes::className(), 'targetAttribute' => ['org_type_id' => 'unit_type_id']],
            [['org_unit_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrgUnit::className(), 'targetAttribute' => ['org_unit_id' => 'unit_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'org_unit_history_id' => 'Org Unit History ID',
            'org_unit_id' => 'Org Unit ID',
            'org_type_id' => 'Org Type ID',
            'parent_id' => 'Parent ID',
            'successor_id' => 'Successor ID',
            'unit_head_id' => 'Unit Head ID',
            'unit_head_user_id' => 'Unit Head User ID',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'user_id' => 'User ID',
            'date_created' => 'Date Created',
        ];
    }

    /**
     * Gets query for [[OrgType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrgType()
    {
        return $this->hasOne(OrgUnitTypes::className(), ['unit_type_id' => 'org_type_id']);
    }

    /**
     * Gets query for [[OrgUnit]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrgUnit()
    {
        return $this->hasOne(OrgUnit::className(), ['unit_id' => 'org_unit_id']);
    }

    /**
     * Gets query for [[ProgrammeCurriculumUnits]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProgrammeCurriculumUnits()
    {
        return $this->hasMany(ProgrammeCurriculumUnit::className(), ['org_unit_history_id' => 'org_unit_history_id']);
    }

    /**
     * Gets query for [[UnitHead]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUnitHead()
    {
        return $this->hasOne(OrgUnitHead::className(), ['unit_head_id' => 'unit_head_id']);
    }
}
