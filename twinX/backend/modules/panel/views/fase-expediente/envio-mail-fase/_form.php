<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EnvioMailFase */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="envio-mail-fase-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_mail')->textInput() ?>

    <?= $form->field($model, 'id_fase')->textInput() ?>

    <?= $form->field($model, 'cargo')->dropDownList([ 'COORDINADOR' => 'COORDINADOR', 'ADMON_IN' => 'ADMON IN', 'ADMON_OUT' => 'ADMON OUT', 'RESP_ADMON_OUT' => 'RESP ADMON OUT', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
