<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EnvioMailFase */

$this->title = 'Editar envío de mail automático #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Envío de mails automatizado', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Guardar';
?>
<div class="envio-mail-fase-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
