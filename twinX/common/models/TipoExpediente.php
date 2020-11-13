<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tipo_expediente".
 *
 * @property int $id
 * @property string $descripcion
 * @property string $tipo_estudiante
 *
 * @property Expediente[] $expedientes
 * @property FaseExpediente[] $faseExpedientes
 */
class TipoExpediente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_expediente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion', 'tipo_estudiante'], 'required'],
            [['tipo_estudiante'], 'string'],
            [['descripcion'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descripcion' => 'Descripcion',
            'tipo_estudiante' => 'Tipo Estudiante',
        ];
    }

    /**
     * Gets query for [[Expedientes]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ExpedienteQuery
     */
    public function getExpedientes()
    {
        return $this->hasMany(Expediente::className(), ['id_tipo_exp' => 'id']);
    }

    /**
     * Gets query for [[FaseExpedientes]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\FaseExpedienteQuery
     */
    public function getFaseExpedientes()
    {
        return $this->hasMany(FaseExpediente::className(), ['id_tipo_exp' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\TipoExpedienteQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\TipoExpedienteQuery(get_called_class());
    }

    public function getDescripcionIO()
    {
        $indicador = $this->tipo_estudiante == 'INCOMING' ? ' [I]' : ' [O]';
        return $this->descripcion . $indicador;
    }
}
