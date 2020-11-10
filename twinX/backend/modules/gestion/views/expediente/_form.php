<?php

use common\models\AcuerdoEstudios;
use common\models\TipoExpediente;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Expediente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="expediente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_ae')->widget(Select2::className(), [
        'data' => ArrayHelper::map(AcuerdoEstudios::find()->all(), 'id', 'estudianteConvenio'),
        'theme' => Select2::THEME_KRAJEE_BS4,
        'options' => [
            'placeholder' => 'Seleccione un acuerdo de estudios',


        ]
    ]) ?>

    <?= $form->field($model, 'id_tipo_exp')->widget(Select2::className(), [
        'data' => ArrayHelper::map(TipoExpediente::find()->all(), 'id', 'descripcionIO'),
        'theme' => Select2::THEME_KRAJEE_BS4,
        'options' => [
            'placeholder' => 'Seleccione un tipo de expediente',


        ]
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
