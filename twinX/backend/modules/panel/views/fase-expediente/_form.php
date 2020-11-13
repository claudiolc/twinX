<?php

use common\models\TipoExpediente;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\FaseExpediente */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="fase-expediente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php

    ?>

    <?= $form->field($model, 'id_tipo_exp')->dropDownList(\yii\helpers\ArrayHelper::map(TipoExpediente::find()->all(), 'id', 'descripcion')); ?>
    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fase_final')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
