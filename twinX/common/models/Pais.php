<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pais".
 *
 * @property string $iso
 * @property string $nombre
 *
 * @property Convenio[] $convenios
 * @property Universidad[] $universidades
 */
class Pais extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pais';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iso', 'nombre'], 'required'],
            [['iso', 'nombre'], 'string', 'max' => 255],
            [['iso'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iso' => 'Código ISO',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * Gets query for [[Convenios]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ConvenioQuery
     */
    public function getConvenios()
    {
        return $this->hasMany(Convenio::className(), ['cod_pais' => 'iso']);
    }

    /**
     * Gets query for [[Universidads]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UniversidadQuery
     */
    public function getUniversidades()
    {
        return $this->hasMany(Universidad::className(), ['cod_pais' => 'iso']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\PaisQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\PaisQuery(get_called_class());
    }


    public function getNombreLogo()
    {
        return ''.$this->nombre;
    }

    public function getNombreISO()
    {
        return $this->nombre . ' (' . $this->iso . ')';
    }
}
