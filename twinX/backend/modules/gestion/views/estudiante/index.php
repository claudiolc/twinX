<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\EstudianteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estudiantes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estudiante-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p class="d-flex justify-content-end">
        <?= Html::a('Nuevo estudiante', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                    'attribute' => 'nombreEstudiante',
                    'format' => 'raw',
                    'label' => 'Nombre',
                    'headerOptions' => [
                            'style' => 'min-width:300px;'
                    ]
            ],
            [
                'attribute' => 'codConvenio',
                'label' => 'Convenio',
                'format' => 'raw',
            ],
            [
                    'attribute' => 'nombreTitulacion',
                    'label' => 'Titulación'
            ],
            'username',
            'email',
            'dni',

            //'email_go_ugr:email',
            //'f_nacimiento',
            //'tipo_estudiante',
            //'cesion_datos',
            //'nota_expediente',
            //'beca_mec',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {convenio} {acuerdo_estudios}' ,
                'buttons' => [
                        'convenio' => function($url, $model, $key){
                            return Html::a('<i class="fas fa-university"></i>', ['convenio/view', 'id' => $model->convenio->id], ['class' => 'btn btn-outline-success', 'title' => 'Convenio']);
                        },
                        'acuerdo_estudios' => function($url, $model, $key){
                            $contenido = '';
                            if(!empty($model->acuerdoEstudios))
                                $contenido = Html::a('<i class="fas fa-scroll"></i>', ['acuerdo-estudios/index', 'id' => $model->id_usuario], ['class' => 'btn btn-outline-info', 'title' => 'Acuerdo de estudios']);
                            return $contenido;
                        },
                ],
                'header' => 'Acciones'
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
