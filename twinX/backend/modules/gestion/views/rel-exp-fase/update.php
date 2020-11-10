<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RelExpFase */
/* @var $fromExpediente boolean */


$this->title = 'Modificar fase: ' . $model->fase->descripcion . ' del expediente #' . $model->exp->id;
$this->params['breadcrumbs'][] = ['label' => 'Rel Exp Fases', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rel-exp-fase-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'idExpediente' => $idExpediente,
    ]) ?>

</div>
