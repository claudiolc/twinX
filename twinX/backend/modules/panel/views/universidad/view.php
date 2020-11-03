<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Universidad */

$this->title = $model->cod_uni;
$this->params['breadcrumbs'][] = ['label' => 'Universidads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="universidad-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Editar', ['update', 'cod_uni' => $model->cod_uni, 'cod_pais' => $model->cod_pais], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'cod_uni' => $model->cod_uni, 'cod_pais' => $model->cod_pais], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Confirma la eliminación de esta universidad?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'cod_pais',
            'cod_uni',
            'nombre',
            'direccion',
            'web',
            'email:email',
        ],
    ]) ?>

</div>
