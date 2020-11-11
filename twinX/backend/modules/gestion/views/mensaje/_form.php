<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Mensaje */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mensaje-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'timestamp')->textInput() ?>

    <?= $form->field($model, 'id_emisor')->textInput() ?>

    <?= $form->field($model, 'id_receptor')->textInput() ?>

    <?= $form->field($model, 'leido')->textInput() ?>

    <?= $form->field($model, 'etiqueta')->dropDownList([ 'IMPORTANTE' => 'IMPORTANTE', 'ELIMINADO' => 'ELIMINADO', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'asunto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cuerpo')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
