<?php

use common\models\TipoExpediente;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FaseExpediente */


$this->title = 'Modificación de fase: '. $model->descripcion . ' (' . $model->tipoExp->descripcion . ')';
$this->params['breadcrumbs'][] = ['label' => 'Fases de expedientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Guardar';
?>
<div class="fase-expediente-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,

    ]) ?>

</div>
