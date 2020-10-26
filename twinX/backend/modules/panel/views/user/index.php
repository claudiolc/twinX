<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear usuario', ['create'], ['class' => 'btn btn-success align-items-right']) ?>
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
                    'class' => \yii\grid\ActionColumn::className(),
                    'urlCreator' => ['/panel/user' ]
            ]


        ],
    ]); ?>


</div>
