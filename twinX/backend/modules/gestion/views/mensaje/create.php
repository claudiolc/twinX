<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Mensaje */

$this->title = 'Nuevo Mensaje';
$this->params['breadcrumbs'][] = ['label' => 'Mensajes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mensaje-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
