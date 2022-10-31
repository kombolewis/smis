<?php

namespace app\models\generated;

use Yii;

/**
 * This is the model class for table "ORG_UNITS".
 *
 * @property int $UNIT_ID
 * @property string $UNIT_CODE
 * @property string $UNIT_NAME
 *
 * @property OrgUnitHistory[] $orgUnitHistories
 */
class OrgUnit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ORG_UNITS';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['UNIT_ID'], 'integer'],
            [['UNIT_CODE'], 'string', 'max' => 6],
            [['UNIT_NAME'], 'string', 'max' => 100],
            [['UNIT_CODE','UNIT_NAME'], 'required'],
            [['UNIT_ID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'UNIT_ID' => 'Unit ID',
            'UNIT_CODE' => 'Unit Code',
            'UNIT_NAME' => 'Unit Name',
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
        if (parent::beforeSave($insert)) {
            $this->UNIT_NAME = strtoupper(trim($this->UNIT_NAME));
            $this->UNIT_CODE = strtoupper(trim($this->UNIT_CODE));
            return true;
        } else {
            return false;
        }
    }

    /**
     * Gets query for [[OrgUnitHistories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrgUnitHistories()
    {
        return $this->hasMany(OrgUnitHistory::className(), ['ORG_UNIT_ID' => 'UNIT_ID']);
    }
}
