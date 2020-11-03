<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MailPredef */

$this->title = 'Modificación del email predefinido #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mails predefinidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Guardar';
?>
<div class="mail-predef-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
