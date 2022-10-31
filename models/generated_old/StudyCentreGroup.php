<?php

namespace app\models\generated;

use Yii;

/**
 * This is the model class for table "STUDY_CENTRE_GROUP".
 *
 * @property float $STUDY_CENTRE_GROUP_ID
 * @property float $STUDY_CENTRE_ID
 * @property float $STUDY_GROUP_ID
 * @property string $STATUS
 *
 * @property StudyGroup $sTUDYGROUP
 */
class StudyCentreGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'STUDY_CENTRE_GROUP';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['STUDY_CENTRE_GROUP_ID', 'STUDY_CENTRE_ID', 'STUDY_GROUP_ID'], 'number'],
            [['STUDY_CENTRE_ID', 'STUDY_GROUP_ID'], 'required'],
            [['STATUS'], 'string', 'max' => 10],
            [['STUDY_CENTRE_GROUP_ID'], 'unique'],
            [['STUDY_GROUP_ID'], 'exist', 'skipOnError' => true, 'targetClass' => StudyGroup::className(), 'targetAttribute' => ['STUDY_GROUP_ID' => 'STUDY_GROUP_ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'STUDY_CENTRE_GROUP_ID' => 'Study Centre Group ID',
            'STUDY_CENTRE_ID' => 'Study Centre ID',
            'STUDY_GROUP_ID' => 'Study Group ID',
            'STATUS' => 'Status',
        ];
    }

    /**
     * Gets query for [[STUDYGROUP]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSTUDYGROUP()
    {
        return $this->hasOne(StudyGroup::className(), ['STUDY_GROUP_ID' => 'STUDY_GROUP_ID']);
    }
}
