<?php

namespace app\models\generated;

use Yii;

/**
 * This is the model class for table "STUDY_GROUP".
 *
 * @property float $STUDY_GROUP_ID
 * @property string $STUDY_GROUP_NAME
 * @property string $STATUS
 *
 * @property StudyCentreGroup[] $studyCentreGroups
 */
class StudyGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'STUDY_GROUP';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['STUDY_GROUP_ID'], 'number'],
            [['STUDY_GROUP_NAME'], 'string', 'max' => 50],
            [['STATUS'], 'string', 'max' => 10],
            [['STUDY_GROUP_ID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'STUDY_GROUP_ID' => 'Study Group ID',
            'STUDY_GROUP_NAME' => 'Study Group Name',
            'STATUS' => 'Status',
        ];
    }

    /**
     * Gets query for [[StudyCentreGroups]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudyCentreGroups()
    {
        return $this->hasMany(StudyCentreGroup::className(), ['STUDY_GROUP_ID' => 'STUDY_GROUP_ID']);
    }
}
