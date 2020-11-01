<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "fase_expediente".
 *
 * @property int $id
 * @property int $id_tipo_exp
 * @property string $descripcion
 * @property int|null $fase_final
 *
 * @property EnvioMailFase[] $envioMailFases
 * @property TipoExpediente $tipoExp
 * @property HistEnvioMailFase[] $histEnvioMailFases
 * @property HistEnvioMailFaseMod[] $histEnvioMailFaseMods
 * @property RelExpFase[] $relExpFases
 */
class FaseExpediente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fase_expediente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_tipo_exp', 'descripcion'], 'required'],
            [['id_tipo_exp', 'fase_final'], 'integer'],
            [['descripcion'], 'string', 'max' => 255],
            [['id_tipo_exp'], 'exist', 'skipOnError' => true, 'targetClass' => TipoExpediente::className(), 'targetAttribute' => ['id_tipo_exp' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_tipo_exp' => 'Id Tipo Exp',
            'descripcion' => 'Descripción',
            'fase_final' => 'Fase final',
        ];
    }

    /**
     * Gets query for [[EnvioMailFases]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\EnvioMailFaseQuery
     */
    public function getEnvioMailFases()
    {
        return $this->hasMany(EnvioMailFase::className(), ['id_fase' => 'id']);
    }

    /**
     * Gets query for [[TipoExp]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\TipoExpedienteQuery
     */
    public function getTipoExp()
    {
        return $this->hasOne(TipoExpediente::className(), ['id' => 'id_tipo_exp']);
    }

    /**
     * Gets query for [[HistEnvioMailFases]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\HistEnvioMailFaseQuery
     */
    public function getHistEnvioMailFases()
    {
        return $this->hasMany(HistEnvioMailFase::className(), ['id_fase' => 'id']);
    }

    /**
     * Gets query for [[HistEnvioMailFaseMods]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\HistEnvioMailFaseModQuery
     */
    public function getHistEnvioMailFaseMods()
    {
        return $this->hasMany(HistEnvioMailFaseMod::className(), ['id_fase' => 'id']);
    }

    /**
     * Gets query for [[RelExpFases]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\RelExpFaseQuery
     */
    public function getRelExpFases()
    {
        return $this->hasMany(RelExpFase::className(), ['id_fase' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\FaseExpedienteQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\FaseExpedienteQuery(get_called_class());
    }
}
