<?php

use common\models\TipoExpediente;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FaseExpediente */
/* @var $tiposExp TipoExpediente */

$this->title = 'Editar fase #'. $model->id . 'del tipo de expediente #' . $model->id_tipo_exp;
$this->params['breadcrumbs'][] = ['label' => 'Fases de expedientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Guardar';
?>
<div class="fase-expediente-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'tiposExp' => $tiposExp,
    ]) ?>

</div>
