<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "estudiante".
 *
 * @property int $id_usuario
 * @property string $dni
 * @property int $id_convenio
 * @property int $id_titulacion
 * @property int|null $telefono2
 * @property string|null $email_go_ugr
 * @property string $f_nacimiento
 * @property string $tipo_estudiante
 * @property int|null $cesion_datos
 * @property float|null $nota_expediente
 * @property int|null $beca_mec
 *
 * @property AcuerdoEstudios[] $acuerdoEstudios
 * @property Titulacion $titulacion
 * @property User $usuario
 * @property Convenio $convenio
 * @property RelClEst[] $relClEsts
 */
class Estudiante extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estudiante';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_usuario', 'dni', 'id_convenio', 'id_titulacion', 'f_nacimiento', 'tipo_estudiante'], 'required'],
            [['id_usuario', 'id_convenio', 'id_titulacion', 'telefono2', 'cesion_datos', 'beca_mec'], 'integer'],
            [['f_nacimiento'], 'safe'],
            [['tipo_estudiante'], 'string'],
            [['nota_expediente'], 'number'],
            [['dni', 'email_go_ugr'], 'string', 'max' => 255],
            [['dni'], 'unique'],
            [['id_usuario'], 'unique'],
            [['id_titulacion'], 'exist', 'skipOnError' => true, 'targetClass' => Titulacion::className(), 'targetAttribute' => ['id_titulacion' => 'id']],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_usuario' => 'id']],
            [['id_convenio'], 'exist', 'skipOnError' => true, 'targetClass' => Convenio::className(), 'targetAttribute' => ['id_convenio' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_usuario' => 'Id Usuario',
            'dni' => 'Dni',
            'id_convenio' => 'Id Convenio',
            'id_titulacion' => 'Id Titulacion',
            'telefono2' => 'Telefono2',
            'email_go_ugr' => 'Email Go Ugr',
            'f_nacimiento' => 'F Nacimiento',
            'tipo_estudiante' => 'Tipo Estudiante',
            'cesion_datos' => 'Cesion Datos',
            'nota_expediente' => 'Nota Expediente',
            'beca_mec' => 'Beca Mec',
        ];
    }

    /**
     * Gets query for [[AcuerdoEstudios]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\AcuerdoEstudiosQuery
     */
    public function getAcuerdoEstudios()
    {
        return $this->hasMany(AcuerdoEstudios::className(), ['id_estudiante' => 'id_usuario']);
    }

    /**
     * Gets query for [[Titulacion]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\TitulacionQuery
     */
    public function getTitulacion()
    {
        return $this->hasOne(Titulacion::className(), ['id' => 'id_titulacion']);
    }

    /**
     * Gets query for [[Usuario]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(User::className(), ['id' => 'id_usuario']);
    }

    /**
     * Gets query for [[Convenio]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ConvenioQuery
     */
    public function getConvenio()
    {
        return $this->hasOne(Convenio::className(), ['id' => 'id_convenio']);
    }

    /**
     * Gets query for [[RelClEsts]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\RelClEstQuery
     */
    public function getRelClEsts()
    {
        return $this->hasMany(RelClEst::className(), ['id_est' => 'id_usuario']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\EstudianteQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\EstudianteQuery(get_called_class());
    }
}
