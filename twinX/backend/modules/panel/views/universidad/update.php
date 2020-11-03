<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Universidad */

$this->title = 'Editar universidad: ' . $model->cod_pais . $model->cod_uni;
$this->params['breadcrumbs'][] = ['label' => 'Universidades', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cod_uni, 'url' => ['view', 'cod_uni' => $model->cod_uni, 'cod_pais' => $model->cod_pais]];
$this->params['breadcrumbs'][] = 'Guardar';
?>
<div class="universidad-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
