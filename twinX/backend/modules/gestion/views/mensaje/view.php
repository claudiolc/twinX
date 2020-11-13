<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Mensaje */

$this->title = $model->asunto;
$this->params['breadcrumbs'][] = ['label' => 'Mensajes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="mensaje-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p class="d-flex justify-content-end">
<!--        <?////= Html::a('Eliminar', ['delete', 'id' => $model->id], [
//            'class' => 'btn btn-danger ml-2',
//            'data' => [
//                'confirm' => '¿Confirma la eliminación de este elemento?',
//                'method' => 'post',
//            ],
//        ]) ?>-->

        <?= Html::a('Marcar como no leído', ['no-leido', 'id' => $model->id], ['class' => 'btn btn-primary ml-2'])?>
    </p>

    <?= \kartik\detail\DetailView::widget([
        'model' => $model,
        'attributes' => [
                [
                    'columns' => [
                        [
                            'attribute' => '',
                            'value' => function($key, $widget){
                                return $widget->model->leido ? '<i class="fas fa-envelope-open"></i>' : '<i class="fas fa-envelope"></i>';
                            },
                            'format' => 'raw',
                            'labelColOptions' => [
                                    'style' => 'display:none;',
                                    'class' => 'm-auto w-25'
                            ],
                            'valueColOptions' => ['class' => 'w-5', 'style' => 'vertical-align:middle'],
                        ],
                        [
                            'attribute' => 'emisor',
                            'value' => $model->emisor->nombreUsername,
                            'labelColOptions' => ['class' => 'w-15', 'style' => 'vertical-align:middle'],
                            'valueColOptions' => ['class' => 'w-40'],
                        ],
                        [
                            'attribute' => 'receptor',
                            'value' => $model->receptor->nombreUsername,
                            'labelColOptions' => ['class' => 'w-15', 'style' => 'vertical-align:middle'],
                            'valueColOptions' => ['class' => 'w-40'],
                        ],
                        [
                                'attribute' => 'timestamp',
                                'value' => function($key, $widget){
                                    return date('d/m/yy H:i:s', Yii::$app->formatter->asTimestamp($widget->model->timestamp) - 3600);
                                },
                                'labelColOptions' => ['class' => 'w-15', 'style' => 'vertical-align:middle'],
                                'valueColOptions' => ['class' => 'w-15'],

                        ],
                        [
                            'attribute' => 'etiqueta',
                            'labelColOptions' => ['class' => 'w-15', 'style' => 'vertical-align:middle'],
                            'valueColOptions' => ['class' => 'w-20'],

                        ],


                    ],
                    'rowOptions'=>[
                        'style' => 'background-color: #883997; color: white;',
                    ]

                ],
            [
                'attribute' => 'cuerpo',
                'labelColOptions' => [
                        'style' => 'display:none;'
                ]

            ],
        ],
    ]) ?>

</div>
