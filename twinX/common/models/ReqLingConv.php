<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "req_ling_conv".
 *
 * @property int $id
 * @property int $id_comp
 * @property int $id_conv
 *
 * @property CompetenciaLing $comp
 * @property Convenio $conv
 */
class ReqLingConv extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'req_ling_conv';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_comp', 'id_conv'], 'required'],
            [['id_comp', 'id_conv'], 'integer'],
            [['id_comp'], 'exist', 'skipOnError' => true, 'targetClass' => CompetenciaLing::className(), 'targetAttribute' => ['id_comp' => 'id']],
            [['id_conv'], 'exist', 'skipOnError' => true, 'targetClass' => Convenio::className(), 'targetAttribute' => ['id_conv' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_comp' => 'Id Comp',
            'id_conv' => 'Id Conv',
        ];
    }

    /**
     * Gets query for [[Comp]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\CompetenciaLingQuery
     */
    public function getComp()
    {
        return $this->hasOne(CompetenciaLing::className(), ['id' => 'id_comp']);
    }

    /**
     * Gets query for [[Conv]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ConvenioQuery
     */
    public function getConv()
    {
        return $this->hasOne(Convenio::className(), ['id' => 'id_conv']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\ReqLingConvQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ReqLingConvQuery(get_called_class());
    }
}
