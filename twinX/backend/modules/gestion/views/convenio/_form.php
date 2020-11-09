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

    <div id="accordion" class="mt-3">

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
                        'data' => ArrayHelper::map(Area::find()->all(), 'cod_isced', 'areaCompleta'),
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


                    <?= $form->field($model, 'id_curso_creacion')->widget(Select2::className(), [
                        'data' => ArrayHelper::map(Curso::find()->all(), 'id', 'curso'),
                        'theme' => Select2::THEME_KRAJEE_BS4,
                        'options' => [
                            'placeholder' => 'Seleccione un curso',
                        ]
                    ]) ?>

                    <?= $form->field($model, 'tipo_movilidad')->dropDownList([ 'ERASMUS' => 'ERASMUS', 'ARQUS' => 'ARQUS', 'ERASMUS DI' => 'ERASMUS DI', 'ERASMUS PARTNER' => 'ERASMUS PARTNER', 'INTERCAMBIO' => 'INTERCAMBIO', 'LIBRE MOVILIDAD' => 'LIBRE MOVILIDAD', ], ['prompt' => 'Seleccione un tipo de movilidad']) ?>

                    <div class="d-flex flex-row justify-content-around mt-4">
                        <?= $form->field($model, 'movilidad_pdi')->checkbox() ?>

                        <?= $form->field($model, 'movilidad_pas')->checkbox() ?>
                    </div>

                    <?php
                        $model->creado_por = Yii::$app->user->id;
                        echo $form->field($model, 'creado_por')->textInput(['style' => 'display:none;'])->label('', ['style' => 'display:none;']);
                    ?>
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
                        <div class="card-body mb-3">
                            <label class="control-label">Fechas de validez</label>
                            <?= DatePicker::widget([
                                    'model' => $model,
                                    'attribute' => 'anno_inicio',
                                    'attribute2' => 'anno_fin',
                                    'options' => ['placeholder' => 'Año de comienzo'],
                                    'options2' => ['placeholder' => 'Año de finalización'],
                                    'type' => DatePicker::TYPE_RANGE,
                                    'form' => $form,
                                    'separator' => 'hasta',
                                    'pluginOptions' => [
                                            'format' => 'yyyy',
                                    ],

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
                                    'separator' => 'hasta',
                                    'pluginOptions' => [
                                        'format' => 'yyyy-mm-dd'
                                    ],
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
                                    'separator' => 'hasta',
                                    'pluginOptions' => [
                                        'format' => 'yyyy-mm-dd'
                                    ]
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
                                    'separator' => 'hasta',
                                    'pluginOptions' => [
                                        'format' => 'yyyy-mm-dd'
                                    ]

                                ]) ?>

                            <label class="control-label mt-2">Segundo semestre</label>
                            <?= DatePicker::widget([
                                    'model' => $model,
                                    'attribute' => 'begin_app_2s',
                                    'attribute2' => 'end_app_2s',
                                    'options' => ['placeholder' => 'Fecha de comienzo'],
                                    'options2' => ['placeholder' => 'Fecha de finalización'],
                                    'type' => DatePicker::TYPE_RANGE,
                                    'form' => $form,
                                    'separator' => 'hasta',
                                    'pluginOptions' => [
                                        'format' => 'yyyy-mm-dd'
                                    ]
                            ]) ?>

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
                                    'attribute' => 'begin_mov_1s',
                                    'attribute2' => 'end_mov_1s',
                                    'options' => ['placeholder' => 'Fecha de comienzo'],
                                    'options2' => ['placeholder' => 'Fecha de finalización'],
                                    'type' => DatePicker::TYPE_RANGE,
                                    'form' => $form,
                                    'separator' => 'hasta',
                                    'pluginOptions' => [
                                        'format' => 'yyyy-mm-dd'
                                    ]
                            ]) ?>

                            <label class="control-label mt-2">Segundo semestre</label>
                            <?= DatePicker::widget([
                                    'model' => $model,
                                    'attribute' => 'begin_mov_2s',
                                    'attribute2' => 'end_mov_2s',
                                    'options' => ['placeholder' => 'Fecha de comienzo'],
                                    'options2' => ['placeholder' => 'Fecha de finalización'],
                                    'type' => DatePicker::TYPE_RANGE,
                                    'form' => $form,
                                    'separator' => 'hasta',
                                    'pluginOptions' => [
                                        'format' => 'yyyy-mm-dd'
                                    ]
                            ]) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingAdmon">
                <h5 class="mb-0">
                    <button type="button" class="btn dropdown-toggle" data-toggle="collapse" data-target="#admon" aria-expanded="true" aria-controls="admon">
                        Personal de administración
                    </button>
                </h5>
            </div>

            <div class="collapse" id="admon" aria-labelledby="headingAdmon" data-parent="#accordion">
                <div class="card-body">

                    <div class="card mb-3">
                        <div class="card-header">
                            Coordinador
                        </div>
                        <div class="card-body mb-3">
                            <?= $form->field($model, 'nombre_coord')->textInput(['maxlength' => true])->label('Nombre') ?>

                            <?= $form->field($model, 'cargo_coord')->textInput(['maxlength' => true])->label('Cargo') ?>

                            <?= $form->field($model, 'email_coord')->textInput(['maxlength' => true])->label('Correo electrónico') ?>

                            <?= $form->field($model, 'tlf_coord')->textInput(['maxlength' => true])->label('Teléfono') ?>

                            <?= $form->field($model, 'address_coord')->textInput(['maxlength' => true])->label('Dirección') ?>

                            <?= $form->field($model, 'web_inf_acad')->textInput(['maxlength' => true])->label('Web de información académica') ?>
                        </div>
                    </div>

                    <div class="card mb-3" id="seccion-datos-personal">
                        <div class="card-header">
                            Incoming
                        </div>
                        <div class="card-body mb-3 d-flex justify-content-lg-around ">

                            <div class="card w-50 mr-3">
                                <div class="card-header">
                                    Responsable en administración incoming
                                </div>
                                <div class="card-body mb-3">
                                    <?= $form->field($model, 'nombre_admon_in')->textInput(['maxlength' => true])->label('Nombre') ?>

                                    <?= $form->field($model, 'cargo_admon_in')->textInput(['maxlength' => true])->label('Cargo') ?>

                                    <?= $form->field($model, 'mail_admon_in')->textInput(['maxlength' => true])->label('Correo electrónico') ?>
                                </div>
                            </div>

                            <div class="card w-50">
                                <div class="card-header">
                                    Responsable académico incoming
                                </div>
                                <div class="card-body mb-3">
                                    <?= $form->field($model, 'nombre_resp_acad_in')->textInput(['maxlength' => true])->label('Nombre') ?>

                                    <?= $form->field($model, 'cargo_resp_acad_in')->textInput(['maxlength' => true])->label('Cargo') ?>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="seccion-datos-personal">
                            Outgoing
                        </div>
                        <div class="card-body d-flex flex-row justify-content-around">
                            <div class="card w-50 mr-3">
                                <div class="card-header">
                                    Responsable en administración outgoing
                                </div>
                                <div class="card-body">
                                    <?= $form->field($model, 'nombre_admon_out')->textInput(['maxlength' => true])->label('Nombre') ?>

                                    <?= $form->field($model, 'cargo_admon_out')->textInput(['maxlength' => true])->label('Cargo') ?>

                                    <?= $form->field($model, 'mail_admon_out')->textInput(['maxlength' => true])->label('Correo electrónico') ?>

                                </div>
                            </div>


                            <div class="card w-50">
                                <div class="card-header">
                                    Responsable académico outgoing
                                </div>
                                <div class="card-body">
                                    <?= $form->field($model, 'nombre_resp_acad_out')->textInput(['maxlength' => true])->label('Nombre') ?>

                                    <?= $form->field($model, 'cargo_resp_acad_out')->textInput(['maxlength' => true])->label('Cargo') ?>

                                    <?= $form->field($model, 'mail_resp_acad_out')->textInput(['maxlength' => true])->label('Correo electrónico') ?>

                                </div>
                            </div>
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
                    <?= $form->field($model, 'fecha_online')->widget(DatePicker::className()) ?>



                   <div class="d-flex flex-row justify-content-between">
                       <?= $form->field($model, 'link_nom_online')->textInput(['maxlength' => true])->label('Enlace') ?>

                       <?= $form->field($model, 'user_online')->textInput(['maxlength' => true])->label('Usuario') ?>

                       <?= $form->field($model, 'password_online')->textInput(['maxlength' => true])->label('Contraseña') ?>
                   </div>

                    <?= $form->field($model, 'info_nom_online')->textarea(['rows' => 6]) ?>

                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingRequisitos">
                <h5 class="mb-0">
                    <button type="button" class="btn dropdown-toggle" data-toggle="collapse" data-target="#requisitos" aria-expanded="false" aria-controls="requisitos">
                        Requisitos
                    </button>
                </h5>
            </div>

            <div class="collapse" id="requisitos" aria-labelledby="headingRequisitos" data-parent="#accordion">
                <div class="card-body">

                <?= $form->field($model, 'requisitos')->widget(Select2::className(), [
                        'name' => 'Requisitos lingüísticos',
                        'data' => ArrayHelper::map(\common\models\CompetenciaLing::find()->all(), 'id', 'lenguaNivel'),
                        'options' => [
                                'placeholder' => 'Selecciona las competencias lingüísticas',
                                'multiple' => 'true'
                        ],

                        'pluginOptions' => [
                                'allowClear' => true,
                        ]
                ]); ?>

                <?= $form->field($model, 'req_titulacion')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'req_curso')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'observ_req_ling')->textarea(['rows' => 6]) ?>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" id="headingNotas">
                <h5 class="mb-0">
                    <button type="button" class="btn dropdown-toggle" data-toggle="collapse" data-target="#notas" aria-expanded="false" aria-controls="notas">
                        Anotaciones
                    </button>
                </h5>
            </div>

            <div class="collapse" id="notas" aria-labelledby="headingNotas" data-parent="#accordion">
                <div class="card-body">
                    <?= $form->field($model, 'link_documentacion')->textInput(['maxlength' => true]) ?>

                    <div class="d-flex flex-wrap justify-content-between">
                        <?= $form->field($model, 'info_tor')->textarea(['rows' => 6]) ?>

                        <?= $form->field($model, 'observ_discapacidad')->textarea(['rows' => 6]) ?>

                        <?= $form->field($model, 'memo_grading')->textarea(['rows' => 6]) ?>

                        <?= $form->field($model, 'memo_visado')->textarea(['rows' => 6]) ?>

                        <?= $form->field($model, 'memo_seguro')->textarea(['rows' => 6]) ?>

                        <?= $form->field($model, 'memo_alojamiento')->textarea(['rows' => 6]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group mt-3">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
