<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property string $country_code
 * @property string $country_name
 * @property string|null $continent
 * @property string|null $region
 * @property string $code2
 * @property string|null $nationality
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
        return 'smis.country';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['country_code', 'country_name', 'code2'], 'required'],
            [['country_code', 'code2'], 'string', 'max' => 5],
            [['country_name', 'continent', 'region', 'nationality'], 'string', 'max' => 100],
            [['country_code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'country_code' => 'Country Code',
            'country_name' => 'Country Name',
            'continent' => 'Continent',
            'region' => 'Region',
            'code2' => 'Code 2',
            'nationality' => 'Nationality',
        ];
    }

    /**
     * Gets query for [[Students]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['country_code' => 'country_code']);
    }
}
