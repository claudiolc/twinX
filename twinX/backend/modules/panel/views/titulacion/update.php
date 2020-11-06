<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Titulacion */


$this->title = 'Modificar titulación #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Titulaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Guardar';
?>
<div class="titulacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,

    ]) ?>

</div>
