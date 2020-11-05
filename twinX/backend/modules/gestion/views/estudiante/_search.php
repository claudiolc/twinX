<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\EstudianteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estudiante-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_usuario') ?>

    <?= $form->field($model, 'dni') ?>

    <?= $form->field($model, 'id_convenio') ?>

    <?= $form->field($model, 'id_titulacion') ?>

    <?= $form->field($model, 'telefono2') ?>

    <?php // echo $form->field($model, 'email_go_ugr') ?>

    <?php // echo $form->field($model, 'f_nacimiento') ?>

    <?php // echo $form->field($model, 'tipo_estudiante') ?>

    <?php // echo $form->field($model, 'cesion_datos') ?>

    <?php // echo $form->field($model, 'nota_expediente') ?>

    <?php // echo $form->field($model, 'beca_mec') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
