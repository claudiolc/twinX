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

    <?= $form->field($model, 'password_reset_token')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipo_usuario')->dropDownList([ 'SUPERUSUARIO' => 'SUPERUSUARIO', 'GESTOR' => 'GESTOR', 'ESTUDIANTE' => 'ESTUDIANTE', 'TUTOR' => 'TUTOR', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sexo')->dropDownList([ 'F' => 'F', 'M' => 'M', 'O' => 'O', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
