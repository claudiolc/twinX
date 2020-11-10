<?php

use common\models\Curso;
use common\models\Estudiante;
use common\models\User;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AcuerdoEstudios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="acuerdo-estudios-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_estudiante')->widget(Select2::className(), [
        'data' => ArrayHelper::map(Estudiante::find()->all(), 'id_usuario', 'nombreConvenio'),
        'theme' => Select2::THEME_KRAJEE_BS4,
        'options' => [
            'placeholder' => 'Seleccione un estudiante',

        ]
    ]) ?>

    <?= $form->field($model, 'id_tutor')->widget(Select2::className(), [
        'data' => ArrayHelper::map(User::find()->where(['tipo_usuario' => 'TUTOR'])->all(), 'id', 'nombreUsername'),
        'theme' => Select2::THEME_KRAJEE_BS4,
        'options' => [
            'placeholder' => 'Seleccione un tutor',

        ]
    ]) ?>



    <?= $form->field($model, 'periodo')->dropDownList([ 'Primer cuatrimestre' => 'Primer cuatrimestre', 'Segundo cuatrimestre' => 'Segundo cuatrimestre', 'Curso completo' => 'Curso completo', ], ['prompt' => 'Seleccione un periodo']) ?>

    <?= $form->field($model, 'fase')->textInput() ?>

    <?= $form->field($model, 'convocatoria')->dropDownList([ 'PRIMERA' => 'Primera', 'SEGUNDA' => 'Segunda', 'EXTRAORDINARIA' => 'Extraordinaria', ], ['prompt' => '']) ?>


    <?= $form->field($model, 'id_curso')->widget(Select2::className(), [
        'data' => ArrayHelper::map(Curso::find()->all(), 'id', 'curso'),
        'theme' => Select2::THEME_KRAJEE_BS4,
        'options' => [
            'placeholder' => 'Seleccione un curso',

        ]
    ]) ?>

    <?= $form->field($model, 'necesidades')->textarea(['rows' => 6]) ?>

    <label class="control-label mt-2">Periodo de movilidad del estudiante</label>
    <div class="mb-3">
        <?= DatePicker::widget([
                'model' => $model,
                'attribute' => 'begin_movilidad',
                'attribute2' => 'end_movilidad',
                'options' => ['placeholder' => 'Fecha de comienzo'],
                'options2' => ['placeholder' => 'Fecha de finalización'],
                'type' => DatePicker::TYPE_RANGE,
                'form' => $form,
                'separator' => 'hasta',
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd',

                ],
            ]
        ) ?>
    </div>

    <?= $form->field($model, 'timestamp_nominacion')->textInput() ?>

    <?= $form->field($model, 'link_documentacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'n_solicitud_RRII')->textInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
