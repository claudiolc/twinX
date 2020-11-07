<?php

use common\models\Area;
use common\models\Curso;
use common\models\Pais;
use common\models\Universidad;
use common\models\User;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Convenio */
/* @var $form yii\widgets\ActiveForm */

\backend\assets\GestionAsset::register($this);
?>

<div class="convenio-form">

    <?php $form = ActiveForm::begin(); ?>

    <div id="accordion">

        <div class="card">
            <div class="card-header" id="headingIdentificacion">
                <h5 class="mb-0">
                    <button type="button" class="btn dropdown-toggle" data-toggle="collapse" data-target="#identificacion" aria-expanded="true" aria-controls="identificacion">
                        Identificación
                    </button>
                </h5>
            </div>

            <div class="collapse show" id="identificacion" aria-labelledby="headingIdentificacion" data-parent="#accordion">
                <div class="card-body">
                    <?= $form->field($model, 'cod_area')->widget(Select2::className(), [
                        'data' => ArrayHelper::map(Area::find()->all(), 'cod_isced', 'nombre_area'),
                        'theme' => Select2::THEME_KRAJEE_BS4,
                        'options' => [
                            'placeholder' => 'Seleccione una área',
                        ]
                    ]) ?>

                    <?= $form->field($model, 'cod_uni')->widget(Select2::className(), [
                        'data' => ArrayHelper::map(Universidad::find()->all(), 'cod_uni', 'nombreCodigo'),
                        'theme' => Select2::THEME_KRAJEE_BS4,
                        'options' => [
                            'placeholder' => 'Seleccione una universidad',
                        ]
                    ]) ?>

                    <?= $form->field($model, 'cod_pais')->widget(Select2::className(), [
                        'data' => ArrayHelper::map(Pais::find()->all(), 'iso', 'nombreISO'),
                        'theme' => Select2::THEME_KRAJEE_BS4,
                        'options' => [
                            'placeholder' => 'Seleccione un país',
                        ]
                    ]) ?>

                    <!-- Aquí tenemos trabajo -->
                    <?//= $form->field($model, 'id_admon_out')->textInput() ?>

                    <?= $form->field($model, 'id_tutor')->widget(Select2::className(), [
                        'data' => ArrayHelper::map(User::find()->where(['tipo_usuario' => 'TUTOR'])->all(), 'id', 'nombreUsername'),
                        'theme' => Select2::THEME_KRAJEE_BS4,
                        'options' => [
                            'placeholder' => 'Seleccione un tutor',
                        ]
                    ]) ?>

                    <?= $form->field($model, 'id_curso_creacion')->widget(Select2::className(), [
                        'data' => ArrayHelper::map(Curso::find()->all(), 'id', 'curso'),
                        'theme' => Select2::THEME_KRAJEE_BS4,
                        'options' => [
                            'placeholder' => 'Seleccione un curso',
                        ]
                    ]) ?>

                    <?= $form->field($model, 'tipo_movilidad')->dropDownList([ 'ERASMUS' => 'ERASMUS', 'ARQUS' => 'ARQUS', 'ERASMUS_DI' => 'ERASMUS DI', 'ERASMUS_PARTNER' => 'ERASMUS PARTNER', 'INTERCAMBIO' => 'INTERCAMBIO', 'LIBRE_MOVILIDAD' => 'LIBRE MOVILIDAD', ], ['prompt' => 'Seleccione un tipo de movilidad']) ?>

                    <div class="d-flex flex-row justify-content-around mt-4">
                        <?= $form->field($model, 'movilidad_pdi')->checkbox() ?>

                        <?= $form->field($model, 'movilidad_pas')->checkbox() ?>
                    </div>

                    <?php $model->creado_por = Yii::$app->user->id ?>
                </div>
            </div>
        </div>



        <div class="card">
            <div class="card-header" id="headingBecas">
                <h5 class="mb-0">
                    <button type="button" class="btn dropdown-toggle" data-toggle="collapse" data-target="#becas" aria-expanded="false" aria-controls="becas">
                        Becas
                    </button>
                </h5>
            </div>

            <div class="collapse" id="becas" aria-labelledby="headingBecas" data-parent="#accordion">
                <div class="card-body">
                    <div class="d-flex flex-row justify-content-around">
                        <?= $form->field($model, 'num_becas_in')->widget(\kartik\touchspin\TouchSpin::className(), [
                            'pluginOptions' => [
                                'verticalbuttons' => true,
                                'verticalup' => '<i class="fas fa-plus"></i>',
                                'verticaldown' => '<i class="fas fa-minus"></i>'
                            ]
                        ]) ?>

                        <?= $form->field($model, 'num_becas_out')->widget(\kartik\touchspin\TouchSpin::className(), [
                            'pluginOptions' => [
                                'verticalbuttons' => true,
                                'verticalup' => '<i class="fas fa-plus"></i>',
                                'verticaldown' => '<i class="fas fa-minus"></i>'
                            ]
                        ]) ?>
                    </div>

                    <div class="d-flex flex-row justify-content-around">
                        <?= $form->field($model, 'meses_in')->widget(\kartik\touchspin\TouchSpin::className(), [
                            'pluginOptions' => [
                                'verticalbuttons' => true,
                                'verticalup' => '<i class="fas fa-plus"></i>',
                                'verticaldown' => '<i class="fas fa-minus"></i>'
                            ]
                        ]) ?>

                        <?= $form->field($model, 'meses_out')->widget(\kartik\touchspin\TouchSpin::className(), [
                            'pluginOptions' => [
                                'verticalbuttons' => true,
                                'verticalup' => '<i class="fas fa-plus"></i>',
                                'verticaldown' => '<i class="fas fa-minus"></i>'
                            ]
                        ]) ?>
                    </div>

                </div>
            </div>
        </div>


        <div class="card">
            <div class="card-header" id="headingPlazos">
                <h5 class="mb-0">
                    <button type="button" class="btn dropdown-toggle" data-toggle="collapse" data-target="#plazos" aria-expanded="false" aria-controls="plazos">
                        Plazos
                    </button>
                </h5>
            </div>

            <div class="collapse" id="plazos" aria-labelledby="headingPlazos" data-parent="#accordion">
                <div class="card-body">

                    <div class="card">
                        <div class="card-header">
                            Vigencia del convenio
                        </div>
                        <div class="card-body">
                            <label class="control-label">Fechas de validez</label>
                            <?= DatePicker::widget([
                                    'model' => $model,
                                    'attribute' => 'anno_inicio',
                                    'attribute2' => 'anno_fin',
                                    'options' => ['placeholder' => 'Fecha de comienzo'],
                                    'options2' => ['placeholder' => 'Fecha de finalización'],
                                    'type' => DatePicker::TYPE_RANGE,
                                    'form' => $form,
                                    'separator' => 'hasta'
                                ]
                            ) ?>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header">
                            Nominaciones
                        </div>
                        <div class="card-body">
                            <label class="control-label">Primer semestre</label>
                            <?= DatePicker::widget([
                                    'model' => $model,
                                    'attribute' => 'begin_nom_1s',
                                    'attribute2' => 'end_nom_1s',
                                    'options' => ['placeholder' => 'Fecha de comienzo'],
                                    'options2' => ['placeholder' => 'Fecha de finalización'],
                                    'type' => DatePicker::TYPE_RANGE,
                                    'form' => $form,
                                    'separator' => 'hasta'
                                ]
                            ) ?>

                            <label class="control-label mt-2">Segundo semestre</label>
                            <?= DatePicker::widget([
                                    'model' => $model,
                                    'attribute' => 'begin_nom_2s',
                                    'attribute2' => 'end_nom_2s',
                                    'options' => ['placeholder' => 'Fecha de comienzo'],
                                    'options2' => ['placeholder' => 'Fecha de finalización'],
                                    'type' => DatePicker::TYPE_RANGE,
                                    'form' => $form,
                                    'separator' => 'hasta'
                                ]
                            ) ?>
                        </div>
                    </div>

                    <div class="card mt-3 mb-3">
                        <div class="card-header">
                            Aplicaciones
                        </div>
                        <div class="card-body">

                            <label class="control-label">Primer semestre</label>
                            <?= DatePicker::widget([
                                    'model' => $model,
                                    'attribute' => 'begin_app_1s',
                                    'attribute2' => 'end_app_1s',
                                    'options' => ['placeholder' => 'Fecha de comienzo'],
                                    'options2' => ['placeholder' => 'Fecha de finalización'],
                                    'type' => DatePicker::TYPE_RANGE,
                                    'form' => $form,
                                    'separator' => 'hasta'
                                ]
                            ) ?>

                            <label class="control-label mt-2">Segundo semestre</label>
                            <?= DatePicker::widget([
                                    'model' => $model,
                                    'attribute' => 'begin_app_2s',
                                    'attribute2' => 'end_app_2s',
                                    'options' => ['placeholder' => 'Fecha de comienzo'],
                                    'options2' => ['placeholder' => 'Fecha de finalización'],
                                    'type' => DatePicker::TYPE_RANGE,
                                    'form' => $form,
                                    'separator' => 'hasta'
                                ]
                            ) ?>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            Movilidad
                        </div>
                        <div class="card-body">

                            <label class="control-label">Primer semestre</label>
                            <?= DatePicker::widget([
                                    'model' => $model,
                                    'attribute' => 'begin_mov_2s',
                                    'attribute2' => 'end_mov_2s',
                                    'options' => ['placeholder' => 'Fecha de comienzo'],
                                    'options2' => ['placeholder' => 'Fecha de finalización'],
                                    'type' => DatePicker::TYPE_RANGE,
                                    'form' => $form,
                                    'separator' => 'hasta'
                                ]
                            ) ?>

                            <label class="control-label mt-2">Segundo semestre</label>
                            <?= DatePicker::widget([
                                    'model' => $model,
                                    'attribute' => 'begin_mov_2s',
                                    'attribute2' => 'end_mov_2s',
                                    'options' => ['placeholder' => 'Fecha de comienzo'],
                                    'options2' => ['placeholder' => 'Fecha de finalización'],
                                    'type' => DatePicker::TYPE_RANGE,
                                    'form' => $form,
                                    'separator' => 'hasta'
                                ]
                            ) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header d-flex flex-row justify-content-between align-middle" id="headingNomOnline">
                <h5 class="mb-0">
                    <button id="nominaciones-button" disabled type="button" class="btn dropdown-toggle" data-toggle="collapse" data-target="#nomOnline" aria-expanded="false" aria-controls="nomOnline">
                        Nominaciones online
                    </button>
                </h5>
                <?= $form->field($model, 'nominacion_online')->checkbox()?>
            </div>

            <div class="collapse" id="nomOnline" aria-labelledby="headingNomOnline" data-parent="#accordion">
                <div class="card-body">
                    <?= $form->field($model, 'nominacion_online')->checkbox() ?>

                    <?= $form->field($model, 'link_nom_online')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'info_nom_online')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'user_online')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'password_online')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'notas_online')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'fecha_online')->textInput() ?>
                </div>
            </div>
        </div>







    </div>
</div>



    <?= $form->field($model, 'anotaciones')->textarea(['rows' => 6]) ?>



    <?= $form->field($model, 'req_titulacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'req_curso')->textInput(['maxlength' => true]) ?>



    <?= $form->field($model, 'link_documentacion')->textInput(['maxlength' => true]) ?>





    <?= $form->field($model, 'info_tor')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'observ_discapacidad')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'observ_req_ling')->textarea(['rows' => 6]) ?>



    <?= $form->field($model, 'memo_grading')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'memo_visado')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'memo_seguro')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'memo_alojamiento')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
