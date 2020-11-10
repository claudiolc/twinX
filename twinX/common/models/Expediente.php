<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "expediente".
 *
 * @property int $id
 * @property int $id_ae
 * @property int $id_tipo_exp
 *
 * @property AcuerdoEstudios $ae
 * @property TipoExpediente $tipoExp
 * @property HistEnvioMailFase[] $histEnvioMailFases
 * @property HistEnvioMailFaseMod[] $histEnvioMailFaseMods
 * @property RelExpFase[] $relExpFases
 * @property RelExpFavGestor[] $relExpFavGestors
 */
class Expediente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'expediente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_ae', 'id_tipo_exp'], 'required'],
            [['id_ae', 'id_tipo_exp'], 'integer'],
            [['id_ae'], 'exist', 'skipOnError' => true, 'targetClass' => AcuerdoEstudios::className(), 'targetAttribute' => ['id_ae' => 'id']],
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
            'id_ae' => 'Id Ae',
            'id_tipo_exp' => 'Id Tipo Exp',
        ];
    }

    /**
     * Gets query for [[Ae]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\AcuerdoEstudiosQuery
     */
    public function getAe()
    {
        return $this->hasOne(AcuerdoEstudios::className(), ['id' => 'id_ae']);
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
        return $this->hasMany(HistEnvioMailFase::className(), ['id_exp' => 'id']);
    }

    /**
     * Gets query for [[HistEnvioMailFaseMods]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\HistEnvioMailFaseModQuery
     */
    public function getHistEnvioMailFaseMods()
    {
        return $this->hasMany(HistEnvioMailFaseMod::className(), ['id_exp' => 'id']);
    }

    /**
     * Gets query for [[RelExpFases]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\RelExpFaseQuery
     */
    public function getRelExpFases()
    {
        return $this->hasMany(RelExpFase::className(), ['id_exp' => 'id']);
    }

    /**
     * Gets query for [[RelExpFavGestors]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\RelExpFavGestorQuery
     */
    public function getRelExpFavGestors()
    {
        return $this->hasMany(RelExpFavGestor::className(), ['id_exp' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\ExpedienteQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ExpedienteQuery(get_called_class());
    }
}
