<?php

use common\models\User;
use kartik\date\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Recordatorio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recordatorio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_usr_aviso')->widget(Select2::className(), [
        'data' => ArrayHelper::map(User::find()
            ->where(['tipo_usuario' => 'SUPERUSUARIO'])
            ->orWhere(['tipo_usuario' => 'GESTOR'])
            ->all(), 'id', 'nombreUsername'),

        'theme' => Select2::THEME_KRAJEE_BS4,
        'options' => [
            'placeholder' => 'Seleccione un usuario a avisar',
        ]
    ]) ?>

    <label class="control-label">Fecha y hora límite</label>
    <div class="mb-2">
        <?= \kartik\datetime\DateTimePicker::widget([
                'model' => $model,
                'attribute' => 'deadline',
                'removeButton' => false,
                'class' => 'mb-3',
                'convertFormat' => true,
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy-MM-dd H:i',
                    'startDate' => date('yy-m-d H:i'),
                    'todayBtn' => true,
                    'forceParse' => true,
                ],
                'options' => [
                    'required' => true,
                ]

            ]
        ) ?>
    </div>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
