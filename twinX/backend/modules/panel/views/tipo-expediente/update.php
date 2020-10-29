<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TipoExpediente */

$this->title = 'Modificación del tipo de expediente ' . strtoupper($model->descripcion);
$this->params['breadcrumbs'][] = ['label' => 'Tipos de expediente', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Guardar';
?>
<div class="tipo-expediente-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
