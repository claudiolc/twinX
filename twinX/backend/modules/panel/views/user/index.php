<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p class="d-flex justify-content-end w-100">

        <?= Html::a('Crear usuario', ['create'], ['class' => 'btn btn-success']) ?>

    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'username',
//            'auth_key',
//            'password_hash',
//            'password_reset_token',
            'email:email',
            'status',
            'created_at:datetime',
            //'updated_at',
            //'verification_token',
            'nombre',
            'tipo_usuario',
            'telefono',
            'sexo',

            [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view} {update} {delete}',
                    'header' => 'Acciones'
            ]

        ],
    ]); ?>


</div>
