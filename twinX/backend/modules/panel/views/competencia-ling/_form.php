<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CompetenciaLing */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="competencia-ling-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'lengua')->dropDownList([ 'INGLÉS' => 'INGLÉS', 'ALEMÁN' => 'ALEMÁN', 'FRANCÉS' => 'FRANCÉS', 'ITALIANO' => 'ITALIANO', 'RUSO' => 'RUSO', 'CHECO' => 'CHECO' ], ['prompt' => '']) ?>

    <?= $form->field($model, 'nivel')->dropDownList([ 'B1' => 'B1', 'B2' => 'B2', 'C1' => 'C1', 'C2' => 'C2', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
