<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $idExpediente int */

$this->title = 'Rel Exp Fases';
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
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_exp',
            'id_fase',
            'id_gestor',
            'procesado',
            //'timestamp',
            //'info',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'header' => 'Acciones'
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
