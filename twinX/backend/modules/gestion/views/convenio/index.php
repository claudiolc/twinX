<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ConvenioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Convenios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="convenio-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p class="d-flex justify-content-end">
        <?= Html::a('Create Convenio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'codConvenio',
//            'cod_area',
//            'cod_uni',
//            'cod_pais',
//            'id_admon_out',
            //'id_tutor',
            //'id_curso_creacion',
            //'creado_por',
            //'num_becas_in',
            //'num_becas_out',
            //'meses_in',
            //'meses_out',
            //'anotaciones:ntext',
            //'anno_inicio',
            //'anno_fin',
            //'req_titulacion',
            //'req_curso',
            //'nominacion_online',
            //'link_nom_online',
            //'info_nom_online:ntext',
            //'link_documentacion',
            //'movilidad_pdi',
            //'movilidad_pas',
            //'tipo_movilidad',
            //'user_online',
            //'password_online',
            //'notas_online',
            //'fecha_online',
            //'info_tor:ntext',
            //'observ_discapacidad:ntext',
            //'observ_req_ling:ntext',
            //'begin_nom_1s',
            //'end_nom_1s',
            //'begin_nom_2s',
            //'end_nom_2s',
            //'begin_app_1s',
            //'end_app_1s',
            //'begin_app_2s',
            //'end_app_2s',
            //'begin_mov_1s',
            //'end_mov_1s',
            //'begin_mov_2s',
            //'end_mov_2s',
            //'memo_grading:ntext',
            //'memo_visado:ntext',
            //'memo_seguro:ntext',
            //'memo_alojamiento:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'header' => 'Acciones'
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
