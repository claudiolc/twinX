<?php

use yii\grid\GridView;
use yii\helpers\Html;


function gridViewRecordatorio($dataProvider, $searchModel = null)
{
    $buttons = $searchModel != null ? '{update} {delete}' : '';
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'titulo',
            [
                'attribute' => 'nombreUsuarioAvisado',
                'label' => 'Usuario a avisar'
            ],
            'deadline:datetime',
            [
                'attribute' => 'completado',
                'value' => function ($model) {
                    return $model->completado ? '<i class="fas fa-check"></i>' : '<i class="fas fa-times"></i>';
                },
                'format' => 'raw'
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {completado} ' . $buttons ,
                'header' => 'Acciones',
                'buttons' => [
                    'completado' => function ($url, $model) {
                        if ($model->completado)
                            $contenido = Html::a('<i class="fas fa-times"></i>', ['recordatorio/completado', 'id' => $model->id, 'completado' => '0'], ['class' => 'btn btn-outline-info', 'title' => 'Marcar como no completado']);
                        else
                            $contenido = Html::a('<i class="fas fa-check"></i>', ['recordatorio/completado', 'id' => $model->id, 'completado' => '1'], ['class' => 'btn btn-outline-info', 'title' => 'Marcar como completado']);

                        return $contenido;
                    },
                    'view' => function($url, $model) {
                        return Html::a('<i class="fas fa-eye"></i>', ['recordatorio/view', 'id' => $model->id], ['class' => 'btn btn-outline-primary', 'title' => 'Ver']);
                    }
                ]
            ],
        ],
    ]);
}
?>