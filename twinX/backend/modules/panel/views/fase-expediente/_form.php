<?php

use common\models\TipoExpediente;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\FaseExpediente */
/* @var $form yii\widgets\ActiveForm */
/* @var $tiposExp TipoExpediente */
?>

<div class="fase-expediente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        $result = $tiposExp::find()->select(['id', 'descripcion'])->all();
        $arr = [];
        foreach ($result as $res) {
            $arr[$res->id] = $res->descripcion;
        }
//        var_dump($arr);
    ?>
    <?//= $form->field($model, 'id_tipo_exp')->dropDownList([], $arr) ?>
    <?= $form->field($model, 'id_tipo_exp')->dropDownList($arr); ?>
    <?php //echo Html::activeDropDownList($model, 'id_tipo_exp', array_column($arr, 0), array_keys($arr) ) ?>


    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fase_final')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
