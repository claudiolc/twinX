<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Recordatorio */

$this->title = 'Editar recordatorio #' . $model->id . ': ' . $model->titulo;
$this->params['breadcrumbs'][] = ['label' => 'Recordatorios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="recordatorio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
