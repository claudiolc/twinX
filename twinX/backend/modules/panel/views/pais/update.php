<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Pais */

$this->title = 'Editar país: ' . $model->iso . '(' . $model->nombre . ')';
$this->params['breadcrumbs'][] = ['label' => 'Pais', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->iso, 'url' => ['view', 'id' => $model->iso]];
$this->params['breadcrumbs'][] = 'Guardar';
?>
<div class="pais-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
