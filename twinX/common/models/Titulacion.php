<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "titulacion".
 *
 * @property int $id
 * @property string $nombre
 * @property int $id_centro
 *
 * @property Asignatura[] $asignaturas
 * @property Estudiante[] $estudiantes
 * @property Centro $centro
 */
class Titulacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'titulacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nombre', 'id_centro'], 'required'],
            [['id', 'id_centro'], 'integer'],
            [['nombre'], 'string', 'max' => 255],
            [['nombre'], 'unique'],
            [['id'], 'unique'],
            [['id_centro'], 'exist', 'skipOnError' => true, 'targetClass' => Centro::className(), 'targetAttribute' => ['id_centro' => 'id']],
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
            'id_centro' => 'Id Centro',
        ];
    }

    /**
     * Gets query for [[Asignaturas]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\AsignaturaQuery
     */
    public function getAsignaturas()
    {
        return $this->hasMany(Asignatura::className(), ['id_tit' => 'id']);
    }

    /**
     * Gets query for [[Estudiantes]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\EstudianteQuery
     */
    public function getEstudiantes()
    {
        return $this->hasMany(Estudiante::className(), ['id_titulacion' => 'id']);
    }

    /**
     * Gets query for [[Centro]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\CentroQuery
     */
    public function getCentro()
    {
        return $this->hasOne(Centro::className(), ['id' => 'id_centro']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\TitulacionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\TitulacionQuery(get_called_class());
    }
}
