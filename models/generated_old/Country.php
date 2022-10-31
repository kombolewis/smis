<?php

namespace app\models\generated;

use Yii;

/**
 * This is the model class for table "COUNTRIES".
 *
 * @property string $CODE
 * @property string $NAME
 * @property string|null $CONTINENT
 * @property string|null $REGION
 * @property string $CODE2
 * @property string|null $NATIONALITY
 *
 * @property Student[] $students
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'COUNTRIES';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CODE'], 'string', 'max' => 3],
            [['NAME'], 'string', 'max' => 60],
            [['CONTINENT'], 'string', 'max' => 50],
            [['REGION', 'NATIONALITY'], 'string', 'max' => 100],
            [['CODE2'], 'string', 'max' => 2],
            [['CODE'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'CODE' => 'Code',
            'NAME' => 'Name',
            'CONTINENT' => 'Continent',
            'REGION' => 'Region',
            'CODE2' => 'Code 2',
            'NATIONALITY' => 'Nationality',
        ];
    }

    /**
     * Gets query for [[Students]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['NATIONALITY' => 'CODE']);
    }
}
