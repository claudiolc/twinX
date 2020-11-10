<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "acuerdo_estudios".
 *
 * @property int $id
 * @property int $id_estudiante
 * @property int $id_tutor
 * @property string $timestamp_creacion
 * @property string $periodo
 * @property int $fase
 * @property int $id_curso
 * @property string|null $necesidades
 * @property string|null $begin_movilidad
 * @property string|null $end_movilidad
 * @property string|null $timestamp_nominacion
 * @property string|null $link_documentacion otra alternativa: tabla contenedora de link_documentacion para AE (necesaria otra para convenios también, apliando el mismo método)
 * @property int|null $n_solicitud_RRII
 * @property string $convocatoria
 * @property string|null $estado_validacion idea: podría tener una serie de códigos que pudieran definir el estado o, de ser otro número de los predefinidos, sería el id de renuncia, dándose el acuerdo como inválido (por renuncia)
 *
 * @property Curso $curso
 * @property Estudiante $estudiante
 * @property User $tutor
 * @property Expediente[] $expedientes
 * @property Renuncia[] $renuncias
 */
class AcuerdoEstudios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'acuerdo_estudios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_estudiante', 'id_tutor', 'periodo', 'fase', 'id_curso', 'convocatoria'], 'required'],
            [['id_estudiante', 'id_tutor', 'fase', 'id_curso', 'n_solicitud_RRII'], 'integer'],
            [['timestamp_creacion', 'begin_movilidad', 'end_movilidad', 'timestamp_nominacion'], 'safe'],
            [['periodo', 'necesidades', 'convocatoria', 'estado_validacion'], 'string'],
            [['link_documentacion'], 'string', 'max' => 255],
            [['id_curso'], 'exist', 'skipOnError' => true, 'targetClass' => Curso::className(), 'targetAttribute' => ['id_curso' => 'id']],
            [['id_estudiante'], 'exist', 'skipOnError' => true, 'targetClass' => Estudiante::className(), 'targetAttribute' => ['id_estudiante' => 'id_usuario']],
            [['id_tutor'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_tutor' => 'id']],
            [['id_curso', 'id_estudiante'], 'unique', 'targetAttribute' => ['id_curso', 'id_estudiante']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_estudiante' => 'Estudiante',
            'id_tutor' => 'Tutor',
            'timestamp_creacion' => 'Fecha de creación',
            'periodo' => 'Periodo',
            'fase' => 'Fase',
            'id_curso' => 'Curso',
            'necesidades' => 'Necesidades',
            'begin_movilidad' => 'Comienzo de la movilidad',
            'end_movilidad' => 'Fin de la movilidad',
            'timestamp_nominacion' => 'Fecha de nominacion',
            'link_documentacion' => 'Enlace a documentación',
            'n_solicitud_RRII' => 'Nº de solicitud RRII',
            'convocatoria' => 'Convocatoria',
            'estado_validacion' => 'Estado de validación',
        ];
    }

    /**
     * Gets query for [[Curso]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\CursoQuery
     */
    public function getCurso()
    {
        return $this->hasOne(Curso::className(), ['id' => 'id_curso']);
    }

    /**
     * Gets query for [[Estudiante]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\EstudianteQuery
     */
    public function getEstudiante()
    {
        return $this->hasOne(Estudiante::className(), ['id_usuario' => 'id_estudiante']);
    }

    /**
     * Gets query for [[Tutor]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getTutor()
    {
        return $this->hasOne(User::className(), ['id' => 'id_tutor']);
    }

    /**
     * Gets query for [[Expedientes]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ExpedienteQuery
     */
    public function getExpedientes()
    {
        return $this->hasMany(Expediente::className(), ['id_ae' => 'id']);
    }

    /**
     * Gets query for [[Renuncias]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\RenunciaQuery
     */
    public function getRenuncias()
    {
        return $this->hasMany(Renuncia::className(), ['id_ae' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\AcuerdoEstudiosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\AcuerdoEstudiosQuery(get_called_class());
    }

    public function getNominacion()
    {
        return $this->timestamp_nominacion == null ? '<i class="fas fa-times"></i>' : Yii::$app->formatter->asDate($this->timestamp_nominacion);
    }

    public function getConvenio()
    {
        return $this->estudiante->convenio->getCodConvenio();
    }

    public function getTipoMovilidad()
    {
        return $this->estudiante->convenio->tipo_movilidad;
    }

    public function getNombreEstudiante()
    {
        return $this->estudiante->getNombreEstudiante();
    }

    public function getEstudianteConvenio()
    {
        return $this->estudiante->usuario->nombre . ' - ' . $this->estudiante->convenio->getCodConvenioNoIcon();
    }
}
