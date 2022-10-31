<?php

namespace app\models\generated;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "STUDENTS".
 *
 * @property float $STUDENT_ID
 * @property string $STUDENT_NUMBER
 * @property string $SURNAME
 * @property string $OTHER_NAMES
 * @property string $GENDER
 * @property string $NATIONALITY
 * @property string $DOB
 * @property string|null $ID_NO
 * @property string|null $PASSPORT_NO
 * @property string|null $SERVICE_NUMBER
 * @property string|null $BLOOD_GROUP
 * @property int|null $SPONSOR
 * @property string|null $REGISTRATION_DATE
 *
 * @property Country $nationality
 * @property StudentProgrammeCurriculum $studProgCurriculum
 * @property Sponsor $sponsor
 */
class Student extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'STUDENTS';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['STUDENT_NUMBER', 'SERVICE_NUMBER', 'DOB', 'SURNAME', 'OTHER_NAMES', 'NATIONALITY', 'GENDER',], 'required'],
            [['STUDENT_ID'], 'number'],
            [['SPONSOR'], 'integer'],
            [['STUDENT_NUMBER', 'PASSPORT_NO', 'SERVICE_NUMBER'], 'string', 'max' => 20],
            [['SURNAME'], 'string', 'max' => 50],
            [['OTHER_NAMES'], 'string', 'max' => 100],
            [['GENDER'], 'string', 'max' => 1],
            [['NATIONALITY'], 'string', 'max' => 3],
            [['DOB', 'REGISTRATION_DATE'], 'string',],
            [['ID_NO'], 'string', 'max' => 10],
            [['BLOOD_GROUP'], 'string', 'max' => 5],
            [['STUDENT_ID'], 'unique'],
            [['NATIONALITY'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['NATIONALITY' => 'CODE']],

            ['SURNAME', 'isSurname',],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'STUDENT_ID' => 'Student ID',
            'STUDENT_NUMBER' => 'Student Number',
            'SURNAME' => 'Surname',
            'OTHER_NAMES' => 'Other Names',
            'GENDER' => 'Gender',
            'NATIONALITY' => 'Nationality',
            'DOB' => 'Date of Birth',
            'ID_NO' => 'ID No',
            'PASSPORT_NO' => 'Passport No',
            'SERVICE_NUMBER' => 'Service Number',
            'BLOOD_GROUP' => 'Blood Group',
            'SPONSOR' => 'Sponsor',
            'REGISTRATION_DATE' => 'Registration Date',
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
        $cap = fn($n)=>strtoupper(trim($n));
        if (parent::beforeSave($insert)) {
            $this->DOB = $f->asDate($this->DOB,'php:d-M-Y');
            $this->SURNAME = $cap($this->SURNAME);
            $this->OTHER_NAMES = $cap($this->SURNAME);
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return void
     * @throws \yii\base\InvalidConfigException
     */
    public function afterFind()
    {
        $f = Yii::$app->formatter;
        parent::afterFind();
        $this->DOB = $f->asDate($this->DOB,'php:d-M-Y');
    }

    /**
     * @return array|array[]|string[][]
     */
    public function scenarios()
    {
        $scenarios = ['isSurname' => ['SURNAME'],];
        return ArrayHelper::merge(parent::scenarios(), $scenarios);
    }

    /**
     * @param $attribute
     * @return false
     */
    public function isSurname($attribute)
    {
        $chkWSpace = explode(' ', trim($this->$attribute));
        if (count($chkWSpace) > 1) { // If Text has whitespaces
            $this->addError($attribute, 'only one name attribute is allowed as a Surname');
        }
        return false;
    }

    /**
     * Gets query for [[NATIONALITY]].
     *
     * @return ActiveQuery
     */
    public function getNationality()
    {
        return $this->hasOne(Country::class, ['CODE' => 'NATIONALITY']);
    }

    /**
     * @return ActiveQuery
     */
    public function getSponsor()
    {
        return $this->hasOne(Sponsor::class, ['SPONSOR_ID' => 'SPONSOR']);
    }

    /**
     * @return ActiveQuery
     */
    public function getStudProgCurriculum()
    {
        return $this->hasMany(StudentProgrammeCurriculum::class, ['STUDENT_ID' => 'STUDENT_ID']);
    }

    /**
     * Returns Photo as a Base64 string
     * @return string
     */
    public function avatar(): string
    {
        $id = str_replace('/', '', $this->STUDENT_NUMBER);
        if (!empty($extra_path)) $extra_path = $extra_path . '/';
        $dir = Yii::getAlias('@photos') . '/students/';
        $img1 = glob($dir . $id . '.*');
        if (empty($img1)) {
            $img = 0;
        } else {
            $img1 = $img1[0];
            $img = (object)pathinfo($img1);
            $type = $img->extension;

            $data = file_get_contents($img1);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

            $img = $base64;
        }

        return $img ?: Yii::$app->getHomeUrl() . 'img/default-avatar.jpg';
    }
}
