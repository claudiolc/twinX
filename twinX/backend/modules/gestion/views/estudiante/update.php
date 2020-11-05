<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Estudiante */

$this->title = 'Update Estudiante: ' . $model->id_usuario;
$this->params['breadcrumbs'][] = ['label' => 'Estudiantes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_usuario, 'url' => ['view', 'id' => $model->id_usuario]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estudiante-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
