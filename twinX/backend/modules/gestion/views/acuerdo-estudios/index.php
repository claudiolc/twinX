<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\AcuerdoEstudiosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Acuerdos de estudios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acuerdo-estudios-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p class="d-flex justify-content-end">
        <?= Html::a('Nuevo acuerdo de estudios', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel != null ? $searchModel : null,
        'columns' => [
            'id',
            [
                    'attribute' => 'convenio',
                    'format' => 'raw',
                    'headerOptions' => [
                        'style' => 'min-width: 200px;'
                    ]
            ],
            [
                    'attribute' => 'nombreEstudiante',
                    'format' => 'raw',
                    'label' => 'Estudiante',
                    'headerOptions' => [
                            'style' => 'min-width: 200px;'
                    ]
            ],
            [
                'attribute' =>'tipoMovilidad',
                'label' => 'Tipo de movilidad'
            ],
            [
                'attribute' =>'tutor',
                'value' => 'tutor.nombre'
            ],
            'periodo',
            [
                'attribute' =>'curso',
                'value' => 'curso.curso'
            ],

            [
                'attribute' => 'nominacion',
                'label' => 'Nominación',
                'format' => 'raw'
            ],


            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'header' => 'Acciones'
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
