<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Convenio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="convenio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cod_area')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cod_uni')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cod_pais')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_admon_out')->textInput() ?>

    <?= $form->field($model, 'id_tutor')->textInput() ?>

    <?= $form->field($model, 'id_curso_creacion')->textInput() ?>

    <?= $form->field($model, 'creado_por')->textInput() ?>

    <?= $form->field($model, 'num_becas_in')->textInput() ?>

    <?= $form->field($model, 'num_becas_out')->textInput() ?>

    <?= $form->field($model, 'meses_in')->textInput() ?>

    <?= $form->field($model, 'meses_out')->textInput() ?>

    <?= $form->field($model, 'anotaciones')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'anno_inicio')->textInput() ?>

    <?= $form->field($model, 'anno_fin')->textInput() ?>

    <?= $form->field($model, 'req_titulacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'req_curso')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nominacion_online')->textInput() ?>

    <?= $form->field($model, 'link_nom_online')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'info_nom_online')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'link_documentacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'movilidad_pdi')->textInput() ?>

    <?= $form->field($model, 'movilidad_pas')->textInput() ?>

    <?= $form->field($model, 'tipo_movilidad')->dropDownList([ 'ERASMUS' => 'ERASMUS', 'ARQUS' => 'ARQUS', 'ERASMUS_DI' => 'ERASMUS DI', 'ERASMUS_PARTNER' => 'ERASMUS PARTNER', 'INTERCAMBIO' => 'INTERCAMBIO', 'LIBRE_MOVILIDAD' => 'LIBRE MOVILIDAD', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'user_online')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_online')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'notas_online')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_online')->textInput() ?>

    <?= $form->field($model, 'info_tor')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'observ_discapacidad')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'observ_req_ling')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'begin_nom_1s')->textInput() ?>

    <?= $form->field($model, 'end_nom_1s')->textInput() ?>

    <?= $form->field($model, 'begin_nom_2s')->textInput() ?>

    <?= $form->field($model, 'end_nom_2s')->textInput() ?>

    <?= $form->field($model, 'begin_app_1s')->textInput() ?>

    <?= $form->field($model, 'end_app_1s')->textInput() ?>

    <?= $form->field($model, 'begin_app_2s')->textInput() ?>

    <?= $form->field($model, 'end_app_2s')->textInput() ?>

    <?= $form->field($model, 'begin_mov_1s')->textInput() ?>

    <?= $form->field($model, 'end_mov_1s')->textInput() ?>

    <?= $form->field($model, 'begin_mov_2s')->textInput() ?>

    <?= $form->field($model, 'end_mov_2s')->textInput() ?>

    <?= $form->field($model, 'memo_grading')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'memo_visado')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'memo_seguro')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'memo_alojamiento')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
