<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AcuerdoEstudios */

$this->title = 'Update Acuerdo Estudios: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Acuerdo Estudios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="acuerdo-estudios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
