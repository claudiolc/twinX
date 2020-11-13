<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\MensajeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $bandeja string */

$this->title = $bandeja == 'INBOX' ? 'Bandeja de entrada' : 'Mensajes enviados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mensaje-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p class="d-flex justify-content-between mt-5">
        <?php
            if($bandeja == 'INBOX') {
                $mensaje = 'Elementos enviados';
                $link = 'enviados';
            }
            else {
                $mensaje = 'Bandeja de entrada';
                $link = 'bandeja-entrada';
            }
            echo Html::a($mensaje, [$link], ['class' => 'btn btn-info'])
        ?>
        <?= Html::a('Nuevo mensaje', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => '',
                'value' => function($model){
                    return $model->leido ? '<i class="fas fa-envelope-open"></i>' : '<i class="fas fa-envelope"></i>';
                },
                'format' => 'raw',
            ],
            'asunto',
            [
                'attribute' => $bandeja == 'INBOX' ? 'nombreEmisor' : 'nombreReceptor',
                'label' => $bandeja == 'INBOX' ? 'Emisor' : 'Receptor'
            ],
            [
                    'attribute' => 'timestamp',
                    'value' => function($model){
                        return date('d/m/yy H:i:s', Yii::$app->formatter->asTimestamp($model->timestamp) - 3600);
//                        return Yii::$app->formatter->as$model->timestamp
                    }
            ],
            //'etiqueta',

            //'cuerpo:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {delete}',
                'header' => 'Acciones'
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
