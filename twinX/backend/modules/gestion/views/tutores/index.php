<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tutores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p class="d-flex justify-content-end w-100">

        <?= Html::a('Gestionar usuarios', ['/panel'], ['class' => 'btn btn-primary']) ?>

    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'nombre',
            'email:email',
            'username',
            'telefono',
            'genero',

        ],
    ]); ?>


</div>
