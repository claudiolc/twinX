<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\ConvenioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="convenio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cod_area') ?>

    <?= $form->field($model, 'cod_uni') ?>

    <?= $form->field($model, 'cod_pais') ?>

    <?= $form->field($model, 'id_admon_out') ?>

    <?php // echo $form->field($model, 'id_tutor') ?>

    <?php // echo $form->field($model, 'id_curso_creacion') ?>

    <?php // echo $form->field($model, 'creado_por') ?>

    <?php // echo $form->field($model, 'num_becas_in') ?>

    <?php // echo $form->field($model, 'num_becas_out') ?>

    <?php // echo $form->field($model, 'meses_in') ?>

    <?php // echo $form->field($model, 'meses_out') ?>

    <?php // echo $form->field($model, 'anotaciones') ?>

    <?php // echo $form->field($model, 'anno_inicio') ?>

    <?php // echo $form->field($model, 'anno_fin') ?>

    <?php // echo $form->field($model, 'req_titulacion') ?>

    <?php // echo $form->field($model, 'req_curso') ?>

    <?php // echo $form->field($model, 'nominacion_online') ?>

    <?php // echo $form->field($model, 'link_nom_online') ?>

    <?php // echo $form->field($model, 'info_nom_online') ?>

    <?php // echo $form->field($model, 'link_documentacion') ?>

    <?php // echo $form->field($model, 'movilidad_pdi') ?>

    <?php // echo $form->field($model, 'movilidad_pas') ?>

    <?php // echo $form->field($model, 'tipo_movilidad') ?>

    <?php // echo $form->field($model, 'user_online') ?>

    <?php // echo $form->field($model, 'password_online') ?>

    <?php // echo $form->field($model, 'notas_online') ?>

    <?php // echo $form->field($model, 'fecha_online') ?>

    <?php // echo $form->field($model, 'info_tor') ?>

    <?php // echo $form->field($model, 'observ_discapacidad') ?>

    <?php // echo $form->field($model, 'observ_req_ling') ?>

    <?php // echo $form->field($model, 'begin_nom_1s') ?>

    <?php // echo $form->field($model, 'end_nom_1s') ?>

    <?php // echo $form->field($model, 'begin_nom_2s') ?>

    <?php // echo $form->field($model, 'end_nom_2s') ?>

    <?php // echo $form->field($model, 'begin_app_1s') ?>

    <?php // echo $form->field($model, 'end_app_1s') ?>

    <?php // echo $form->field($model, 'begin_app_2s') ?>

    <?php // echo $form->field($model, 'end_app_2s') ?>

    <?php // echo $form->field($model, 'begin_mov_1s') ?>

    <?php // echo $form->field($model, 'end_mov_1s') ?>

    <?php // echo $form->field($model, 'begin_mov_2s') ?>

    <?php // echo $form->field($model, 'end_mov_2s') ?>

    <?php // echo $form->field($model, 'memo_grading') ?>

    <?php // echo $form->field($model, 'memo_visado') ?>

    <?php // echo $form->field($model, 'memo_seguro') ?>

    <?php // echo $form->field($model, 'memo_alojamiento') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
