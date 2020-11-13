<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "centro".
 *
 * @property int $id
 * @property string $nombre
 *
 * @property Titulacion[] $titulacions
 */
class Centro extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'centro';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 255],
            [['nombre'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * Gets query for [[Titulacions]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\TitulacionQuery
     */
    public function getTitulacions()
    {
        return $this->hasMany(Titulacion::className(), ['id_centro' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\CentroQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\CentroQuery(get_called_class());
    }
}
