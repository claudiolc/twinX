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
            [['f_nacimiento', 'requisitos'], 'safe'],
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
            'id_usuario' => 'Usuario',
            'dni' => 'DNI',
            'id_convenio' => 'Convenio',
            'id_titulacion' => 'Titulación',
            'telefono2' => 'Teléfono 2',
            'email_go_ugr' => 'Email goUGR',
            'f_nacimiento' => 'Fecha de nacimiento',
            'tipo_estudiante' => 'Tipo de estudiante',
            'cesion_datos' => 'Cesión de datos',
            'nota_expediente' => 'Nota del expediente',
            'beca_mec' => 'Becario MEC',
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

    public function getNombreEstudiante()
    {
        $claseIndicador = $this->tipo_estudiante == 'OUTGOING' ? '#FF3131' : '#2AC8F3';
        return '<i class="fas fa-circle" style="color:' . $claseIndicador . '"></i> ' . $this->usuario->nombre;
    }

    public function getCodConvenio()
    {
        return $this->convenio->getCodConvenio();
    }

    public function getUsername()
    {
        return $this->usuario->username;
    }

    public function getEmail()
    {
        return $this->usuario->email;
    }

    public function getNombreTitulacion()
    {
        return $this->titulacion->nombre . ' (' .$this->titulacion->id . ')';
    }

    public function getNotaCompetenciaLing()
    {
        $compConvenioRaw = $this->convenio->reqLingConvs;
        $compEstudianteRaw = $this->relClEsts;
        $compConvenio = [];
        $compEstudiante = [];
        $extra = 0;
        $valores = [
            'B1' => 0.5,
            'B2' => 1,
            'C1' => 1.5,
            'C2' => 2
        ];

        foreach ($compConvenioRaw as $cC) {
            $compConvenio []= $cC->comp;
        }

        foreach ($compEstudianteRaw as $cE) {
            $compEstudiante []= $cE->cl;
        }

        foreach ($compEstudiante as $cE){
            if(in_array($cE, $compConvenio))
                unset($compConvenio[$cE->id]); // No tenemos en cuenta las competencias que requiere el convenio
        }

        foreach ($compEstudiante as $cE){
            foreach ($compConvenio as $cC){
                if($cE->lengua == $cC->lengua){
                    if($valores[$cE->nivel] > $valores[$cC->nivel])
                        $extra += $valores[$cE->nivel];
                }
            }
        }

        return $extra;
    }

    public function getNotaParticipacion()
    {
        return $this->nota_expediente + $this->getNotaCompetenciaLing();
    }
}
