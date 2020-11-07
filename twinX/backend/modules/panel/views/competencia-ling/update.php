<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CompetenciaLing */

$this->title = 'Editar competencia lingüística: ' . $model->lengua . ' ' . $model->nivel;
$this->params['breadcrumbs'][] = ['label' => 'Competencia Lings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="competencia-ling-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
