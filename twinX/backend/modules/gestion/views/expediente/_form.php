<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Expediente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="expediente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_ae')->textInput() ?>

    <?= $form->field($model, 'id_tipo_exp')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
