<?php

use common\models\Convenio;
use common\models\Titulacion;
use common\models\User;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Estudiante */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estudiante-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_usuario')->widget(Select2::className(), [
            'data' => ArrayHelper::map(User::find()->where(['tipo_usuario' => 'ESTUDIANTE'])->all(), 'id', 'nombreUsername'),
            'theme' => Select2::THEME_KRAJEE_BS4,
            'options' => [
                'placeholder' => 'Seleccione un usuario',
            ]
    ]) ?>

    <?= $form->field($model, 'dni')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_convenio')->widget(Select2::className(), [
        'data' => ArrayHelper::map(Convenio::find()->all(), 'id', 'codConvenioNoIcon'),
        'theme' => Select2::THEME_KRAJEE_BS4,
        'options' => [
            'placeholder' => 'Seleccione un convenio',
        ],

    ]) ?>

    <?= $form->field($model, 'id_titulacion')->widget(Select2::className(), [
        'data' => ArrayHelper::map(Titulacion::find()->all(), 'id', 'nombre'),
        'theme' => Select2::THEME_KRAJEE_BS4,
        'options' => [
            'placeholder' => 'Seleccione una titulación',
        ],

    ]) ?>

    <?= $form->field($model, 'requisitos')->widget(Select2::className(), [
        'data' => ArrayHelper::map(\common\models\CompetenciaLing::find()->all(), 'id', 'lenguaNivel'),
        'options' => [
            'placeholder' => 'Selecciona las competencias lingüísticas',
            'multiple' => 'true',

        ],

        'pluginOptions' => [
            'allowClear' => true,
            'label' => 'Competencias lingüísticas',

        ]
    ]); ?>

    <?= $form->field($model, 'telefono2')->textInput() ?>

    <?= $form->field($model, 'email_go_ugr')->textInput(['maxlength' => true]) ?>

    <label class="control-label">Fecha de nacimiento</label>
    <div class="mb-2">
        <?= DatePicker::widget([
                'model' => $model,
                'attribute' => 'f_nacimiento',
                'removeButton' => false,
                'class' => 'mb-3',
                'convertFormat' => true,
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy-MM-dd',

                ],
                'options' => [
                    'required' => true,
                ]

            ]
        ) ?>
    </div>

    <?= $form->field($model, 'tipo_estudiante')->dropDownList([ 'INCOMING' => 'Incoming', 'OUTGOING' => 'Outgoing', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'nota_expediente')->textInput() ?>

    <?= $form->field($model, 'cesion_datos')->checkbox() ?>

    <?= $form->field($model, 'beca_mec')->checkbox() ?>


    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
