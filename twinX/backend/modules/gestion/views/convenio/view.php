<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Convenio */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Convenios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="convenio-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'cod_area',
            'cod_uni',
            'cod_pais',
            'id_tutor',
            'id_curso_creacion',
            'creado_por',
            'num_becas_in',
            'num_becas_out',
            'meses_in',
            'meses_out',
            'anotaciones:ntext',
            'anno_inicio',
            'anno_fin',
            'req_titulacion',
            'req_curso',
            'nominacion_online',
            'link_nom_online',
            'info_nom_online:ntext',
            'link_documentacion',
            'movilidad_pdi',
            'movilidad_pas',
            'tipo_movilidad',
            'user_online',
            'password_online',
            'fecha_online',
            'info_tor:ntext',
            'observ_discapacidad:ntext',
            'observ_req_ling:ntext',
            'begin_nom_1s',
            'end_nom_1s',
            'begin_nom_2s',
            'end_nom_2s',
            'begin_app_1s',
            'end_app_1s',
            'begin_app_2s',
            'end_app_2s',
            'begin_mov_1s',
            'end_mov_1s',
            'begin_mov_2s',
            'end_mov_2s',
            'memo_grading:ntext',
            'memo_visado:ntext',
            'memo_seguro:ntext',
            'memo_alojamiento:ntext',
            'nombre_coord',
            'cargo_coord',
            'email_coord:email',
            'tlf_coord',
            'address_coord',
            'web_inf_acad',
            'nombre_admon_in',
            'cargo_admon_in',
            'mail_admon_in',
            'nombre_resp_acad_in',
            'cargo_resp_acad_in',
            'nombre_admon_out',
            'cargo_admon_out',
            'mail_admon_out',
            'nombre_resp_acad_out',
            'cargo_resp_acad_out',
            'mail_resp_acad_out',
        ],
    ]) ?>

</div>
