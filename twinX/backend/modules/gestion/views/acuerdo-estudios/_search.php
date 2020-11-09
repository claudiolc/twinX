<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\AcuerdoEstudiosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="acuerdo-estudios-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_estudiante') ?>

    <?= $form->field($model, 'id_tutor') ?>

    <?= $form->field($model, 'timestamp_creacion') ?>

    <?= $form->field($model, 'periodo') ?>

    <?php // echo $form->field($model, 'fase') ?>

    <?php // echo $form->field($model, 'id_curso') ?>

    <?php // echo $form->field($model, 'necesidades') ?>

    <?php // echo $form->field($model, 'begin_movilidad') ?>

    <?php // echo $form->field($model, 'end_movilidad') ?>

    <?php // echo $form->field($model, 'timestamp_nominacion') ?>

    <?php // echo $form->field($model, 'timestamp_registro') ?>

    <?php // echo $form->field($model, 'link_documentacion') ?>

    <?php // echo $form->field($model, 'n_solicitud_RRII') ?>

    <?php // echo $form->field($model, 'convocatoria') ?>

    <?php // echo $form->field($model, 'estado_validacion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
