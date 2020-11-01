<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EnvioMailFase */

$this->title = 'Update Envio Mail Fase: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Envio Mail Fases', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="envio-mail-fase-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
