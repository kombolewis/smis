<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "programme_category".
 *
 * @property int $prog_cat_id
 * @property string $prog_cat_code
 * @property string $prog_cat_name
 * @property int $prog_cat_order
 * @property string $status
 *
 * @property Programmes[] $programmes
 */
class ProgrammeCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.programme_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prog_cat_code', 'prog_cat_name'], 'required'],
            [['prog_cat_order'], 'default', 'value' => null],
            [['prog_cat_order'], 'integer'],
            [['prog_cat_code', 'status'], 'string', 'max' => 20],
            [['prog_cat_name'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'prog_cat_id' => 'Prog Cat ID',
            'prog_cat_code' => 'Prog Cat Code',
            'prog_cat_name' => 'Prog Cat Name',
            'prog_cat_order' => 'Prog Cat Order',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Programmes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProgrammes()
    {
        return $this->hasMany(Programmes::className(), ['prog_cat_id' => 'prog_cat_id']);
    }
}
