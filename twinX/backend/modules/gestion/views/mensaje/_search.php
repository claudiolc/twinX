<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\MensajeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mensaje-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'timestamp') ?>

    <?= $form->field($model, 'id_emisor') ?>

    <?= $form->field($model, 'id_receptor') ?>

    <?= $form->field($model, 'leido') ?>

    <?php // echo $form->field($model, 'etiqueta') ?>

    <?php // echo $form->field($model, 'asunto') ?>

    <?php // echo $form->field($model, 'cuerpo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
