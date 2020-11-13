<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $tiposExp \common\models\TipoExpediente */
/* @var $searchModel common\models\search\FaseExpedienteSearch */

$this->title = 'Fases de expedientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fase-expediente-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p class="d-flex justify-content-end">
        <?= Html::a('Nueva fase de expediente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'descripcion',
            [
                'attribute' => 'tipoExp',
                'label' => 'Tipo de expediente',
                'value' => function($model){
                    return $model->tipoExp->descripcion . ' [' . $model->tipoExp->tipo_estudiante[0] . ']';
                }
            ],
            [
                'attribute' => 'fase_final',
                'value' => function($model){
                    return $model->fase_final == 1 ? '<i class="fas fa-check"></i>' : '<i class="fas fa-times"></i>';
                },
                'format' => 'raw'
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{detalleMails} {view} {update} {delete}',
                'buttons' => [
                        'detalleMails' => function($url, $model, $key){
                            return "<a href='/panel/envio-mail-fase/filtered-extended-index?id=". $key . "' class='btn btn-outline-warning'><i class='fas fa-envelope'></i></a>";

                        }
                ],
                'header' => 'Acciones'
            ],
        ],
    ]); ?>



</div>
