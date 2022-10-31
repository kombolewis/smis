<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kuccps_prog_map".
 *
 * @property int $prog_map_id
 * @property string $kuccps_prog_code
 * @property string $uon_prog_code
 */
class KuccpsProgMap extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smis.kuccps_prog_map';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prog_map_id', 'kuccps_prog_code', 'uon_prog_code'], 'required'],
            [['prog_map_id'], 'default', 'value' => null],
            [['prog_map_id'], 'integer'],
            [['kuccps_prog_code', 'uon_prog_code'], 'string', 'max' => 20],
            [['prog_map_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'prog_map_id' => 'Prog Map ID',
            'kuccps_prog_code' => 'Kuccps Prog Code',
            'uon_prog_code' => 'Uon Prog Code',
        ];
    }
}
