<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "area".
 *
 * @property string $cod_isced
 * @property string $nombre_isced
 * @property string|null $nombre_area
 *
 * @property Convenio[] $convenios
 */
class Area extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'area';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cod_isced', 'nombre_isced'], 'required'],
            [['cod_isced', 'nombre_isced', 'nombre_area'], 'string', 'max' => 255],
            [['cod_isced'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cod_isced' => 'Código ISCED',
            'nombre_isced' => 'Nombre ISCED',
            'nombre_area' => 'Nombre del área',
        ];
    }

    /**
     * Gets query for [[Convenios]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ConvenioQuery
     */
    public function getConvenios()
    {
        return $this->hasMany(Convenio::className(), ['cod_area' => 'cod_isced']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\AreaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\AreaQuery(get_called_class());
    }

    public function getAreaCompleta()
    {
        return $this->cod_isced . ' ' . $this->nombre_isced . ' (' . $this->nombre_area . ')';
    }
}
