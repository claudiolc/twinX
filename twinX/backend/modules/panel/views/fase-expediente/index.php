<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fases de expedientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fase-expediente-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p class="d-flex justify-content-end">
        <?= Html::a('Nueva fase de expediente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_tipo_exp',
            'descripcion',
            'fase_final',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'header' => 'Acciones'
            ],
        ],
    ]); ?>


</div>
