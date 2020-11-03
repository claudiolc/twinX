<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TipoExpediente */

$this->title = 'Crear nuevo tipo de expediente';
$this->params['breadcrumbs'][] = ['label' => 'Tipos de expediente', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-expediente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
