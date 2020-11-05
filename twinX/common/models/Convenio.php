<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "convenio".
 *
 * @property int $id
 * @property string $cod_area
 * @property string $cod_uni
 * @property string $cod_pais
 * @property int|null $id_admon_out
 * @property int $id_tutor ref a usuario pero tiene que ser un tutor, futura restricción
 * @property int $id_curso_creacion
 * @property int $creado_por
 * @property int $num_becas_in
 * @property int $num_becas_out
 * @property int $meses_in
 * @property int $meses_out
 * @property string|null $anotaciones
 * @property int $anno_inicio
 * @property int $anno_fin
 * @property string|null $req_titulacion
 * @property string|null $req_curso
 * @property int|null $nominacion_online
 * @property string|null $link_nom_online
 * @property string|null $info_nom_online
 * @property string|null $link_documentacion
 * @property int|null $movilidad_pdi
 * @property int|null $movilidad_pas
 * @property string $tipo_movilidad
 * @property string|null $user_online
 * @property string|null $password_online
 * @property string|null $notas_online
 * @property string|null $fecha_online
 * @property string|null $info_tor
 * @property string|null $observ_discapacidad
 * @property string|null $observ_req_ling
 * @property string|null $begin_nom_1s
 * @property string|null $end_nom_1s
 * @property string|null $begin_nom_2s
 * @property string|null $end_nom_2s
 * @property string|null $begin_app_1s
 * @property string|null $end_app_1s
 * @property string|null $begin_app_2s
 * @property string|null $end_app_2s
 * @property string|null $begin_mov_1s
 * @property string|null $end_mov_1s
 * @property string|null $begin_mov_2s
 * @property string|null $end_mov_2s
 * @property string|null $memo_grading
 * @property string|null $memo_visado
 * @property string|null $memo_seguro
 * @property string|null $memo_alojamiento
 *
 * @property AsignaturaExt[] $asignaturaExts
 * @property Curso $cursoCreacion
 * @property Pais $codPais
 * @property User $creadoPor
 * @property Area $codArea
 * @property Universidad $codPais0
 * @property AdmonOut $admonOut
 * @property User $tutor
 * @property Estudiante[] $estudiantes
 * @property ReqLingConv[] $reqLingConvs
 */
class Convenio extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'convenio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cod_area', 'cod_uni', 'cod_pais', 'id_tutor', 'id_curso_creacion', 'creado_por', 'num_becas_in', 'num_becas_out', 'meses_in', 'meses_out', 'anno_inicio', 'anno_fin', 'tipo_movilidad'], 'required'],
            [['id_admon_out', 'id_tutor', 'id_curso_creacion', 'creado_por', 'num_becas_in', 'num_becas_out', 'meses_in', 'meses_out', 'anno_inicio', 'anno_fin', 'nominacion_online', 'movilidad_pdi', 'movilidad_pas'], 'integer'],
            [['anotaciones', 'info_nom_online', 'tipo_movilidad', 'info_tor', 'observ_discapacidad', 'observ_req_ling', 'memo_grading', 'memo_visado', 'memo_seguro', 'memo_alojamiento'], 'string'],
            [['fecha_online', 'begin_nom_1s', 'end_nom_1s', 'begin_nom_2s', 'end_nom_2s', 'begin_app_1s', 'end_app_1s', 'begin_app_2s', 'end_app_2s', 'begin_mov_1s', 'end_mov_1s', 'begin_mov_2s', 'end_mov_2s'], 'safe'],
            [['cod_area', 'cod_uni', 'cod_pais', 'req_titulacion', 'req_curso', 'link_nom_online', 'link_documentacion', 'user_online', 'password_online', 'notas_online'], 'string', 'max' => 255],
            [['id_curso_creacion'], 'exist', 'skipOnError' => true, 'targetClass' => Curso::className(), 'targetAttribute' => ['id_curso_creacion' => 'id']],
            [['cod_pais'], 'exist', 'skipOnError' => true, 'targetClass' => Pais::className(), 'targetAttribute' => ['cod_pais' => 'iso']],
            [['creado_por'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['creado_por' => 'id']],
            [['cod_area'], 'exist', 'skipOnError' => true, 'targetClass' => Area::className(), 'targetAttribute' => ['cod_area' => 'cod_isced']],
            [['cod_pais', 'cod_uni'], 'exist', 'skipOnError' => true, 'targetClass' => Universidad::className(), 'targetAttribute' => ['cod_pais' => 'cod_pais', 'cod_uni' => 'cod_uni']],
            [['id_admon_out'], 'exist', 'skipOnError' => true, 'targetClass' => AdmonOut::className(), 'targetAttribute' => ['id_admon_out' => 'id']],
            [['id_tutor'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_tutor' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cod_area' => 'Cod Area',
            'cod_uni' => 'Cod Uni',
            'cod_pais' => 'Cod Pais',
            'id_admon_out' => 'Id Admon Out',
            'id_tutor' => 'Id Tutor',
            'id_curso_creacion' => 'Id Curso Creacion',
            'creado_por' => 'Creado Por',
            'num_becas_in' => 'Num Becas In',
            'num_becas_out' => 'Num Becas Out',
            'meses_in' => 'Meses In',
            'meses_out' => 'Meses Out',
            'anotaciones' => 'Anotaciones',
            'anno_inicio' => 'Anno Inicio',
            'anno_fin' => 'Anno Fin',
            'req_titulacion' => 'Req Titulacion',
            'req_curso' => 'Req Curso',
            'nominacion_online' => 'Nominacion Online',
            'link_nom_online' => 'Link Nom Online',
            'info_nom_online' => 'Info Nom Online',
            'link_documentacion' => 'Link Documentacion',
            'movilidad_pdi' => 'Movilidad Pdi',
            'movilidad_pas' => 'Movilidad Pas',
            'tipo_movilidad' => 'Tipo Movilidad',
            'user_online' => 'User Online',
            'password_online' => 'Password Online',
            'notas_online' => 'Notas Online',
            'fecha_online' => 'Fecha Online',
            'info_tor' => 'Info Tor',
            'observ_discapacidad' => 'Observ Discapacidad',
            'observ_req_ling' => 'Observ Req Ling',
            'begin_nom_1s' => 'Begin Nom 1s',
            'end_nom_1s' => 'End Nom 1s',
            'begin_nom_2s' => 'Begin Nom 2s',
            'end_nom_2s' => 'End Nom 2s',
            'begin_app_1s' => 'Begin App 1s',
            'end_app_1s' => 'End App 1s',
            'begin_app_2s' => 'Begin App 2s',
            'end_app_2s' => 'End App 2s',
            'begin_mov_1s' => 'Begin Mov 1s',
            'end_mov_1s' => 'End Mov 1s',
            'begin_mov_2s' => 'Begin Mov 2s',
            'end_mov_2s' => 'End Mov 2s',
            'memo_grading' => 'Memo Grading',
            'memo_visado' => 'Memo Visado',
            'memo_seguro' => 'Memo Seguro',
            'memo_alojamiento' => 'Memo Alojamiento',
        ];
    }

    /**
     * Gets query for [[AsignaturaExts]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\AsignaturaExtQuery
     */
    public function getAsignaturaExts()
    {
        return $this->hasMany(AsignaturaExt::className(), ['id_conv' => 'id']);
    }

    /**
     * Gets query for [[CursoCreacion]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\CursoQuery
     */
    public function getCursoCreacion()
    {
        return $this->hasOne(Curso::className(), ['id' => 'id_curso_creacion']);
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
     * Gets query for [[CreadoPor]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getCreadoPor()
    {
        return $this->hasOne(User::className(), ['id' => 'creado_por']);
    }

    /**
     * Gets query for [[CodArea]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\AreaQuery
     */
    public function getCodArea()
    {
        return $this->hasOne(Area::className(), ['cod_isced' => 'cod_area']);
    }

    /**
     * Gets query for [[CodPais0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UniversidadQuery
     */
    public function getCodPais0()
    {
        return $this->hasOne(Universidad::className(), ['cod_pais' => 'cod_pais', 'cod_uni' => 'cod_uni']);
    }

    /**
     * Gets query for [[AdmonOut]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\AdmonOutQuery
     */
    public function getAdmonOut()
    {
        return $this->hasOne(AdmonOut::className(), ['id' => 'id_admon_out']);
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
     * Gets query for [[Estudiantes]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\EstudianteQuery
     */
    public function getEstudiantes()
    {
        return $this->hasMany(Estudiante::className(), ['id_convenio' => 'id']);
    }

    /**
     * Gets query for [[ReqLingConvs]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ReqLingConvQuery
     */
    public function getReqLingConvs()
    {
        return $this->hasMany(ReqLingConv::className(), ['id_conv' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\ConvenioQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ConvenioQuery(get_called_class());
    }
}
