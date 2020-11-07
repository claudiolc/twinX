<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "competencia_ling".
 *
 * @property int $id
 * @property string $lengua
 * @property string $nivel
 *
 * @property RelClEst[] $relClEsts
 * @property ReqLingConv[] $reqLingConvs
 */
class CompetenciaLing extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'competencia_ling';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lengua', 'nivel'], 'required'],
            [['nivel'], 'string'],
            [['lengua'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lengua' => 'Lengua',
            'nivel' => 'Nivel',
        ];
    }

    /**
     * Gets query for [[RelClEsts]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\RelClEstQuery
     */
    public function getRelClEsts()
    {
        return $this->hasMany(RelClEst::className(), ['id_cl' => 'id']);
    }

    /**
     * Gets query for [[ReqLingConvs]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ReqLingConvQuery
     */
    public function getReqLingConvs()
    {
        return $this->hasMany(ReqLingConv::className(), ['id_comp' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\CompetenciaLingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\CompetenciaLingQuery(get_called_class());
    }

    public function getLenguaNivel() {
        return $this->lengua . ' (' . $this->nivel . ')';
    }
}
