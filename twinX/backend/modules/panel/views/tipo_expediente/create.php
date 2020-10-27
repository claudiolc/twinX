<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TipoExpediente */

$this->title = 'Create Tipo Expediente';
$this->params['breadcrumbs'][] = ['label' => 'Tipo Expedientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-expediente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
