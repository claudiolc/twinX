<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "universidad".
 *
 * @property string $cod_uni
 * @property string $cod_pais
 * @property string $nombre
 * @property string|null $direccion
 * @property string|null $web
 * @property string|null $email
 *
 * @property Convenio[] $convenios
 * @property Pais $codPais
 */
class Universidad extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'universidad';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cod_uni', 'cod_pais', 'nombre'], 'required'],
            [['cod_uni', 'cod_pais', 'nombre', 'direccion', 'web', 'email'], 'string', 'max' => 255],
            [['cod_uni', 'cod_pais'], 'unique', 'targetAttribute' => ['cod_uni', 'cod_pais']],
            [['cod_pais'], 'exist', 'skipOnError' => true, 'targetClass' => Pais::className(), 'targetAttribute' => ['cod_pais' => 'iso']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cod_uni' => 'ID universidad',
            'cod_pais' => 'País',
            'nombre' => 'Nombre',
            'direccion' => 'Dirección',
            'web' => 'Web',
            'email' => 'Email',
        ];
    }

    /**
     * Gets query for [[Convenios]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ConvenioQuery
     */
    public function getConvenios()
    {
        return $this->hasMany(Convenio::className(), ['cod_pais' => 'cod_pais', 'cod_uni' => 'cod_uni']);
    }

    /**
     * Gets query for [[CodPais]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\PaisQuery
     */
    public function getCodPais()
    {
        return $this->hasOne(Pais::className(), ['iso' => 'cod_pais']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\UniversidadQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\UniversidadQuery(get_called_class());
    }

    public function getNombreCodigo()
    {
        return $this->nombre . ' (' . $this->cod_uni . ')';
    }
}
