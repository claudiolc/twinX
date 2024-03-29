<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ExpedienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Expedientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expediente-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p class="d-flex justify-content-end">
        <?= Html::a('Nuevo expediente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                    'attribute' => 'id',
                    'headerOptions' => [
                            'style' => 'width:100px;'
                    ]
            ],
            [
                    'attribute' => 'nombreEstudiante',
                    'label' => 'Estudiante',
                    'format' => 'raw'

            ],
            [
                'attribute' => 'convenio',
                'label' => 'Convenio',
                'format' => 'raw'

            ],
            [
                    'attribute' => 'descripcionTipoExp',
                    'label' => 'Tipo de expediente'
            ],
            [
                'attribute' => 'fase',
                'label' => 'Fase actual'
            ],
            [
                'attribute' => 'horaFase',
                'label' => 'Hora de actualización',
                'format' => 'datetime'
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
