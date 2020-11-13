<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "rel_cl_est".
 *
 * @property int $id
 * @property int $id_cl
 * @property int $id_est
 *
 * @property CompetenciaLing $cl
 * @property Estudiante $est
 */
class RelClEst extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rel_cl_est';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cl', 'id_est'], 'required'],
            [['id_cl', 'id_est'], 'integer'],
            [['id_cl'], 'exist', 'skipOnError' => true, 'targetClass' => CompetenciaLing::className(), 'targetAttribute' => ['id_cl' => 'id']],
            [['id_est'], 'exist', 'skipOnError' => true, 'targetClass' => Estudiante::className(), 'targetAttribute' => ['id_est' => 'id_usuario']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_cl' => 'Id Cl',
            'id_est' => 'Id Est',
        ];
    }

    /**
     * Gets query for [[Cl]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\CompetenciaLingQuery
     */
    public function getCl()
    {
        return $this->hasOne(CompetenciaLing::className(), ['id' => 'id_cl']);
    }

    /**
     * Gets query for [[Est]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\EstudianteQuery
     */
    public function getEst()
    {
        return $this->hasOne(Estudiante::className(), ['id_usuario' => 'id_est']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\RelClEstQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\RelClEstQuery(get_called_class());
    }
}
