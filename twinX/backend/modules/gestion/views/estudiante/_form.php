<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Estudiante */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estudiante-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_usuario')->textInput() ?>

    <?= $form->field($model, 'dni')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_convenio')->textInput() ?>

    <?= $form->field($model, 'id_titulacion')->textInput() ?>

    <?= $form->field($model, 'telefono2')->textInput() ?>

    <?= $form->field($model, 'email_go_ugr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'f_nacimiento')->textInput() ?>

    <?= $form->field($model, 'tipo_estudiante')->dropDownList([ 'INCOMING' => 'INCOMING', 'OUTCOMING' => 'OUTCOMING', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'cesion_datos')->textInput() ?>

    <?= $form->field($model, 'nota_expediente')->textInput() ?>

    <?= $form->field($model, 'beca_mec')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
