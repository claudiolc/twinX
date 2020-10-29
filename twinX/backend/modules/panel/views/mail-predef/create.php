<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MailPredef */

$this->title = 'Nuevo mail predefinido';
$this->params['breadcrumbs'][] = ['label' => 'Mails predefinidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mail-predef-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
