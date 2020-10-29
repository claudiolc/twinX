<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FaseExpediente */

$this->title = 'Create Fase Expediente';
$this->params['breadcrumbs'][] = ['label' => 'Fase Expedientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fase-expediente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
