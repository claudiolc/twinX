<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "curso".
 *
 * @property int $id
 * @property string $curso
 *
 * @property AcuerdoEstudios[] $acuerdoEstudios
 * @property AsignaturaExt[] $asignaturaExts
 * @property Convenio[] $convenios
 */
class Curso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'curso';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['curso'], 'required'],
            [['curso'], 'string', 'max' => 9],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'curso' => 'Curso',
        ];
    }

    /**
     * Gets query for [[AcuerdoEstudios]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\AcuerdoEstudiosQuery
     */
    public function getAcuerdoEstudios()
    {
        return $this->hasMany(AcuerdoEstudios::className(), ['id_curso' => 'id']);
    }

    /**
     * Gets query for [[AsignaturaExts]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\AsignaturaExtQuery
     */
    public function getAsignaturaExts()
    {
        return $this->hasMany(AsignaturaExt::className(), ['id_curso' => 'id']);
    }

    /**
     * Gets query for [[Convenios]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ConvenioQuery
     */
    public function getConvenios()
    {
        return $this->hasMany(Convenio::className(), ['id_curso_creacion' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\CursoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\CursoQuery(get_called_class());
    }
}
