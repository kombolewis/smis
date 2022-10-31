<?php

namespace app\models\generated;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "ORG_UNIT_HISTORY".
 *
 * @property float $UNITCODE
 * @property float $UNITNAME
 *
 * @property float $ORG_UNIT_HISTORY_ID
 * @property float $ORG_UNIT_ID
 * @property float $ORG_TYPE_ID
 * @property float|null $PARENT_ID
 * @property float|null $SUCCESSOR_ID
 * @property float|null $UNIT_HEAD_ID
 * @property float|null $UNIT_HEAD_USER_ID
 * @property string $START_DATE
 * @property string|null $END_DATE
 * @property float $USER_ID
 * @property string $DATE_CREATED
 *
 * @property OrgUnit $orgUnit
 * @property-read mixed $progCurricula
 * @property ProgrammeCurriculum[] $programmeCurricula
 */
class OrgUnitHistory extends ActiveRecord
{
    public $UNITCODE, $UNITNAME;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ORG_UNIT_HISTORY';
    }

//    public function attributes()
//    {
//        $attributes = parent::attributes();
//        return ArrayHelper::merge(['UNITCODE','UNITNAME'],$attributes);
//    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ORG_UNIT_HISTORY_ID', 'ORG_UNIT_ID', 'ORG_TYPE_ID', 'PARENT_ID', 'SUCCESSOR_ID', 'UNIT_HEAD_ID', 'UNIT_HEAD_USER_ID', 'USER_ID'], 'number'],
            [['ORG_UNIT_ID', 'ORG_TYPE_ID', 'USER_ID', 'DATE_CREATED'], 'required'],
            [['START_DATE', 'DATE_CREATED'], 'safe'],
            [['UNITCODE','UNITNAME','START_DATE',],'required'],
//            [['END_DATE'], 'string', 'max' => 7],
            [['ORG_UNIT_ID'], 'exist', 'skipOnError' => true, 'targetClass' => OrgUnit::class, 'targetAttribute' => ['ORG_UNIT_ID' => 'UNIT_ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ORG_UNIT_HISTORY_ID' => 'Org Unit History ID',
            'ORG_UNIT_ID' => 'Org Unit',
            'ORG_TYPE_ID' => 'Org Type',
            'PARENT_ID' => 'Parent Org Unit',
            'SUCCESSOR_ID' => 'Successor Org Unit',
            'UNIT_HEAD_ID' => 'Unit Head',
            'UNIT_HEAD_USER_ID' => 'Unit Head User',
            'START_DATE' => 'Start Date',
            'END_DATE' => 'End Date',
            'USER_ID' => 'User ID',
            'DATE_CREATED' => 'Date Created',

            'UNITCODE' => 'Org Unit Code',
            'UNITNAME' => 'Org Unit Name',
        ];
    }

    /**
     * @param $insert
     * @return bool
     * @throws \yii\base\InvalidConfigException
     */
    public function beforeSave($insert)
    {
        $f = Yii::$app->formatter;
        $null = new Expression('NULL');
        if (parent::beforeSave($insert)) {
            $this->START_DATE = $f->asDate($this->START_DATE,'php:d-M-Y');
            $this->END_DATE = strlen(trim($this->END_DATE))>0? $f->asDate($this->END_DATE,'php:d-M-Y'):$null;
            $this->USER_ID = Yii::$app->user->id;
            if($insert){
                $this->DATE_CREATED = new Expression('SYSDATE()');
            }
            return true;
        } else {
            return false;
        }
    }

    public function afterFind()
    {
        $f = Yii::$app->formatter;
        parent::afterFind();
        $this->START_DATE = $f->asDate($this->START_DATE,'php:d-M-Y');
    }

    /**
     * Gets query for [[ORGUNIT]].
     *
     * @return ActiveQuery
     */
    public function getOrgUnit()
    {
        return $this->hasOne(OrgUnit::class, ['UNIT_ID' => 'ORG_UNIT_ID']);
    }

    /**
     * @return ActiveQuery
     */
    public function getProgCurricula()
    {
        return $this->hasMany(ProgrammeCurriculum::class, ['ORG_UNIT_HISTORY_ID' => 'ORG_UNIT_HISTORY_ID']);
    }
}
