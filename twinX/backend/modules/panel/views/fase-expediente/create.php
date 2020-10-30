<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FaseExpediente */
/* @var $tiposExp \common\models\TipoExpediente */

$this->title = 'Nueva fase de expediente';
$this->params['breadcrumbs'][] = ['label' => 'Fases de expedientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fase-expediente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'tiposExp' => $tiposExp,
    ]) ?>

</div>
