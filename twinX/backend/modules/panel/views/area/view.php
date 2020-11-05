<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Area */

$this->title = $model->nombre_area;
$this->params['breadcrumbs'][] = ['label' => 'Áreas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="area-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Guardar', ['update', 'id' => $model->cod_isced], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->cod_isced], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Confirma la eliminación de esta área?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'cod_isced',
            'nombre_isced',
            'nombre_area',
        ],
    ]) ?>

</div>
