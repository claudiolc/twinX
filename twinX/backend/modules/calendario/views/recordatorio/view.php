<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Recordatorio */

$this->title = $model->titulo;
$this->params['breadcrumbs'][] = ['label' => 'Recordatorios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="recordatorio-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p class="d-flex justify-content-end">
        <?= Html::a('Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger ml-2',
            'data' => [
                'confirm' => '¿Confirma la eliminación de este recordatorio?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= \kartik\detail\DetailView::widget([
        'model' => $model,
        'attributes' => [
                [
                        'columns' => [
                            [
                                'attribute' => 'creador',
                                'value' => $model->creador->getNombreUsername(),
                                'labelColOptions' => ['class' => 'w-15', 'style' => 'vertical-align:middle'],
                                'valueColOptions' => ['class' => 'w-40'],
                            ],
                            [
                                'attribute' => 'nombreUsuarioAvisado',
                                'labelColOptions' => ['class' => 'w-15', 'style' => 'vertical-align:middle'],
                                'valueColOptions' => ['class' => 'w-40'],
                                'label' => 'Usuario a avisar'
                            ],
                            [
                                'attribute' => 'timestamp',
                                'labelColOptions' => ['class' => 'w-15', 'style' => 'vertical-align:middle'],
                                'valueColOptions' => ['class' => 'w-40'],
                            ],
                            [
                                'attribute' => 'deadline',
                                'labelColOptions' => ['class' => 'w-15', 'style' => 'vertical-align:middle'],
                                'valueColOptions' => ['class' => 'w-40'],
                            ],
                            [
                                'attribute' => 'completado',
                                'labelColOptions' => ['class' => 'w-15', 'style' => 'vertical-align:middle'],
                                'valueColOptions' => ['class' => 'w-40', 'style' => 'vertical-align:middle'],
                                'value' => function($key, $widget){
                                    if($widget->model->completado)
                                        return '<i class="fas fa-check"></i>';
                                    else
                                        return '<i class="fas fa-times"></i>';
                                },
                                'format' => 'raw'
                            ],

                        ],

                        'rowOptions'=>[
                            'style' => 'background-color: #883997; color: white;',
                        ]


                ],

                [
                    'attribute' => 'descripcion',
                    'labelColOptions' => ['style' => 'display:none;']
                ],
        ],
    ]) ?>

</div>
