<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ReqLingConv */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="req-ling-conv-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_comp')->textInput() ?>

    <?= $form->field($model, 'id_conv')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
