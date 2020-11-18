<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

<!--    //= $form->field($model, 'password_reset_token')->textInput(['maxlength' => true])-->
    <?php $model->status = 10 ?><!-- Hacer que funcione -->

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipo_usuario')->dropDownList([ 'ADMINISTRADOR' => 'ADMINISTRADOR', 'GESTOR' => 'GESTOR', 'ESTUDIANTE' => 'ESTUDIANTE', 'TUTOR' => 'TUTOR', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'genero')->dropDownList([ 'F' => 'Femenino', 'M' => 'Masculino', 'O' => 'Otro', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
