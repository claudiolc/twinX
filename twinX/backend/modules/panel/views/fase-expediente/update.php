<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FaseExpediente */

$this->title = 'Update Fase Expediente: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Fase Expedientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fase-expediente-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
