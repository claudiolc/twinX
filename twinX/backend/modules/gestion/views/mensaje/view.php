<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Mensaje */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mensajes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="mensaje-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p class="d-flex justify-content-end">
        <?= Html::a('Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger ml-2',
            'data' => [
                'confirm' => '¿Confirma la eliminación de este elemento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'timestamp',
            'id_emisor',
            'id_receptor',
            'leido',
            'etiqueta',
            'asunto',
            'cuerpo:ntext',
        ],
    ]) ?>

</div>
