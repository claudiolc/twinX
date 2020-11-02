<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Universidad */
/* @var $form yii\widgets\ActiveForm */
/* @var $paises \common\models\Pais */
?>

<div class="universidad-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cod_pais')->dropDownList($paises) ?>

    <?= $form->field($model, 'cod_uni')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'web')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
