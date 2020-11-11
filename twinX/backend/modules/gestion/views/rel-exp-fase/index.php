<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $idExpediente int */


$this->title = 'Fases';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rel-exp-fase-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p class="d-flex justify-content-end">
        <?php
        if(!$idExpediente)
            $href = ['create'];
        else
            $href = ['view-new-fase', 'id' => $idExpediente];

        echo Html::a('Nueva fase', $href, ['class' => 'btn btn-success']);
        ?>
    </p>


    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                    'attribute' => 'id_fase',
                    'value' => 'fase.descripcion'
            ],
            [
                    'attribute' => 'id_gestor',
                    'value' => 'gestor.nombreUsername'
            ],
            [
                    'attribute' => 'procesado',
                    'value' => function($model){
                        return $model->procesado == 1 ? '<i class="fas fa-check"></i>' : '<i class="fas fa-times"></i>';
                    },
                    'format' => 'raw'
            ],
            [
                    'attribute' => 'timestamp',
                    'value' => function($model) {
                                return date('d/m/yy H:i:s', Yii::$app->formatter->asTimestamp($model->timestamp) - 3600) . ' (' . Yii::$app->formatter->asRelativeTime($model->timestamp, date('H:i:s')) . ')';
                                },
            ],
            'info',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => ($idExpediente ? '{_update} {_delete}' : '{view} {update} {delete}') . '{procesamiento}',
                'header' => 'Acciones',
                'buttons' => [
                        '_update' => function($url, $model, $key){

                            return Html::a('<i class="fas fa-pencil-alt"></i>', ['view-update-fase', 'id' => $model->id_exp, 'rel' => $model->id], ['class' => 'btn btn-outline-success', 'title' => 'Editar']);;
                        },
                        '_delete' => function($url, $model, $key){

                            return Html::a('<i class="fas fa-trash"></i>', ['/gestion/rel-exp-fase/delete', 'id' => $model->id, 'idExpediente' => $model->id_exp], ['class' => 'btn btn-outline-danger', 'title' => 'Eliminar', 'data' => ['method' => 'post']]);;
                        },
                        'procesamiento' => function($url, $model, $key){

                            return Html::a('<i class="fas fa-arrow-right"></i>', ['/gestion/rel-exp-fase/procesar-fase', 'id' => $model->id, 'idExpediente' => $model->id_exp], ['class' => 'btn btn-outline-warning ml-1', 'title' => 'Procesar esta fase',
                                    'data' => [
                                            'method' => 'post',
                                            'confirm' => '¿Desea procesar esta fase? Se enviarán los mails asociados a los responsables'
                                    ]]);
                        },
                ],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
