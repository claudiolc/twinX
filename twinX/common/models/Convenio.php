<?php

namespace common\models;

use Yii;
use yii\db\Exception;
use yii\helpers\Html;

/**
 * This is the model class for table "convenio".
 *
 * @property int $id
 * @property string $cod_area
 * @property string $cod_uni
 * @property string $cod_pais
 * @property int $id_curso_creacion
 * @property int $creado_por
 * @property int $num_becas_in
 * @property int $num_becas_out
 * @property int $meses_in
 * @property int $meses_out
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
 * @property string|null $nombre_coord
 * @property string|null $cargo_coord
 * @property string|null $email_coord
 * @property string|null $tlf_coord
 * @property string|null $address_coord
 * @property string|null $web_inf_acad
 * @property string|null $nombre_admon_in
 * @property string|null $cargo_admon_in
 * @property string|null $mail_admon_in
 * @property string|null $nombre_resp_acad_in
 * @property string|null $cargo_resp_acad_in
 * @property string|null $nombre_admon_out
 * @property string|null $cargo_admon_out
 * @property string|null $mail_admon_out
 * @property string|null $nombre_resp_acad_out
 * @property string|null $cargo_resp_acad_out
 * @property string|null $mail_resp_acad_out
 *
 * @property AsignaturaExt[] $asignaturaExts
 * @property Curso $cursoCreacion
 * @property Pais $codPais
 * @property User $creadoPor
 * @property Area $codArea
 * @property Universidad $codUni
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
            [['cod_area', 'cod_uni', 'cod_pais', 'id_curso_creacion', 'num_becas_in', 'num_becas_out', 'meses_in', 'meses_out', 'anno_inicio', 'anno_fin', 'tipo_movilidad'], 'required'],
            [['id_curso_creacion', 'creado_por', 'num_becas_in', 'num_becas_out', 'meses_in', 'meses_out', 'anno_inicio', 'anno_fin', 'nominacion_online', 'movilidad_pdi', 'movilidad_pas'], 'integer'],
            [['info_nom_online', 'tipo_movilidad', 'info_tor', 'observ_discapacidad', 'observ_req_ling', 'memo_grading', 'memo_visado', 'memo_seguro', 'memo_alojamiento'], 'string'],
            [['fecha_online', 'begin_nom_1s', 'end_nom_1s', 'begin_nom_2s', 'end_nom_2s', 'begin_app_1s', 'end_app_1s', 'begin_app_2s', 'end_app_2s', 'begin_mov_1s', 'end_mov_1s', 'begin_mov_2s', 'end_mov_2s', 'requisitos'], 'safe'],
            [['cod_area', 'cod_uni', 'cod_pais', 'req_titulacion', 'req_curso', 'link_nom_online', 'link_documentacion', 'user_online', 'password_online'], 'string', 'max' => 255],
            [['nombre_coord', 'address_coord', 'web_inf_acad', 'nombre_admon_in', 'cargo_admon_in', 'mail_admon_in', 'nombre_resp_acad_in', 'cargo_resp_acad_in', 'nombre_admon_out', 'cargo_admon_out', 'mail_admon_out', 'nombre_resp_acad_out', 'cargo_resp_acad_out', 'mail_resp_acad_out'], 'string', 'max' => 50],
            [['cargo_coord', 'email_coord'], 'string', 'max' => 100],
            [['tlf_coord'], 'string', 'max' => 20],
            [['id_curso_creacion'], 'exist', 'skipOnError' => true, 'targetClass' => Curso::className(), 'targetAttribute' => ['id_curso_creacion' => 'id']],
            [['cod_pais'], 'exist', 'skipOnError' => true, 'targetClass' => Pais::className(), 'targetAttribute' => ['cod_pais' => 'iso']],
            //[['creado_por'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['creado_por' => 'id']],
            [['cod_area'], 'exist', 'skipOnError' => true, 'targetClass' => Area::className(), 'targetAttribute' => ['cod_area' => 'cod_isced']],
            [['cod_pais', 'cod_uni'], 'exist', 'skipOnError' => true, 'targetClass' => Universidad::className(), 'targetAttribute' => ['cod_pais' => 'cod_pais', 'cod_uni' => 'cod_uni']],];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cod_area' => 'Área',
            'cod_uni' => 'Universidad',
            'cod_pais' => 'País',
            'id_curso_creacion' => 'Curso de creación',
            'creado_por' => 'Creado por',
            'num_becas_in' => 'Número de becas IN',
            'num_becas_out' => 'Número de becas OUT',
            'meses_in' => 'Meses IN',
            'meses_out' => 'Meses OUT',
            'anno_inicio' => 'Año de inicio del convenio',
            'anno_fin' => 'Año de finalización',
            'req_titulacion' => 'Requisitos de la titulación',
            'req_curso' => 'Requisitos del curso',
            'nominacion_online' => 'Nominación online',
            'link_nom_online' => 'Enlace a nominaciones online',
            'info_nom_online' => 'Información sobre la nominación online',
            'link_documentacion' => 'Enlace a documentación',
            'movilidad_pdi' => 'Movilidad PDI',
            'movilidad_pas' => 'Movilidad PAS',
            'tipo_movilidad' => 'Tipo de movilidad',
            'user_online' => 'Usuario para las nominaciones online',
            'password_online' => 'Contraseña para las nominaciones online',
            'fecha_online' => 'Fecha de las nominaciones online',
            'info_tor' => 'Información sobre el TOR',
            'observ_discapacidad' => 'Observaciones de discapacidad',
            'observ_req_ling' => 'Observaciones de requisitos lingüísticos',
            'begin_nom_1s' => 'Comienzo de las nominaciones - 1er semestre',
            'end_nom_1s' => 'Fin de las nominaciones - 2º semestre',
            'begin_nom_2s' => 'Comienzo de las nominaciones - 2º semestre',
            'end_nom_2s' => 'Fin de las nominaciones - 2º semestre',
            'begin_app_1s' => 'Comienzo de las aplicaciones - 1er semestre',
            'end_app_1s' => 'Fin de las aplicaciones - 1er semestre',
            'begin_app_2s' => 'Comienzo de las aplicaciones - 2º semestre',
            'end_app_2s' => 'Fin de las aplicaciones - 2º semestre',
            'begin_mov_1s' => 'Comienzo de la movilidad - 1er semestre',
            'end_mov_1s' => 'Comienzo de la movilidad - 2º semestre',
            'begin_mov_2s' => 'Comienzo de la movilidad - 2º semestre',
            'end_mov_2s' => 'Fin de la movilidad - 2º semestre',
            'memo_grading' => 'Anotaciones sobre el grading',
            'memo_visado' => 'Anotaciones sobre el visado',
            'memo_seguro' => 'Anotaciones sobre el seguro escolar',
            'memo_alojamiento' => 'Anotaciones sobre el alojamiento',
            'nombre_coord' => 'Nombre Coord',
            'cargo_coord' => 'Cargo Coord',
            'email_coord' => 'Email Coord',
            'tlf_coord' => 'Tlf Coord',
            'address_coord' => 'Address Coord',
            'web_inf_acad' => 'Web Inf Acad',
            'nombre_admon_in' => 'Nombre Admon In',
            'cargo_admon_in' => 'Cargo Admon In',
            'mail_admon_in' => 'Mail Admon In',
            'nombre_resp_acad_in' => 'Nombre Resp Acad In',
            'cargo_resp_acad_in' => 'Cargo Resp Acad In',
            'nombre_admon_out' => 'Nombre Admon Out',
            'cargo_admon_out' => 'Cargo Admon Out',
            'mail_admon_out' => 'Mail Admon Out',
            'nombre_resp_acad_out' => 'Nombre Resp Acad Out',
            'cargo_resp_acad_out' => 'Cargo Resp Acad Out',
            'mail_resp_acad_out' => 'Mail Resp Acad Out',
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
     * Gets query for [[CodUni]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UniversidadQuery
     */
    public function getCodUni()
    {
        return $this->hasOne(Universidad::className(), ['cod_pais' => 'cod_pais', 'cod_uni' => 'cod_uni']);
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

    public function getCodConvenio()
    {
        $path = '@web/images/icons/' . $this->codPais->iso. '.png';
        return  Html::img($path, ['class' => 'convenio-icon']) . $this->cod_pais . ' ' . $this->cod_uni . '/' . $this->cod_area;
    }

    public function getCodConvenioNoIcon()
    {
        return  $this->cod_pais . ' ' . $this->cod_uni . '/' . $this->cod_area;
    }

    public function getTipoMovilidad()
    {
        switch($this->tipo_movilidad){
            case('ERASMUS PARTNER'):
                return 'Erasmus partner';
                break;
            case('ERASMUS'):
                return 'Erasmus';
                break;
            case('ERASMUS DI'):
                return 'Erasmus: dimensión internacional';
                break;
            case('ARQUS'):
                return 'Arqus';
                break;
            case('INTERCAMBIO'):
                return 'Intercambio';
                break;
            case('LIBRE MOVILIDAD'):
                return 'Libre movilidad';
                break;
            default:
                return $this->tipo_movilidad;
                break;
        }
    }

    public function getNombreCodUni()
    {
        return $this->codUni->getNombreCodigo();
    }

    public function getAreaCompleta()
    {
        return $this->codArea->getAreaCompleta();
    }

    public function getAcuerdos()
    {
        $ae = [];
        foreach($this->estudiantes as $estudiante){
            if(!empty($estudiante->acuerdoEstudios)){
                $ae []= $estudiante->acuerdoEstudios[array_key_last($estudiante->acuerdoEstudios)];
            }
        }

        return $ae;
    }

    public function getNumAcuerdos()
    {
        return count($this->getAcuerdos());
    }

    public function getNominadosAcuerdos()
    {
        $ae = $this->getAcuerdos();
        $aeIn = [];
        $aeOut = [];
        $nomIn = 0;
        $nomOut = 0;

        foreach($ae as $item) {
            if ($item->estudiante->tipo_estudiante == 'INCOMING') {
                $aeIn[] = $item;
                if ($item->timestamp_nominacion) {
                    $nomIn++;
                }
            } else{
                $aeOut[] = $item;
                if ($item->timestamp_nominacion) {
                    $nomOut++;
                }
            }
        }


        return $nomOut . '/' . count($aeOut) . ' <i class="fas fa-circle" style="color:#FF3131;"></i>' . '<br>' .
               $nomIn . '/' . count($aeIn) . ' <i class="fas fa-circle" style="color:#2AC8F3;"></i>';
    }

    public function save($runValidation = true, $attributeNames = null)
    {
        $this->creado_por = Yii::$app->user->id;

       return parent::save($runValidation, $attributeNames);
    }




}
