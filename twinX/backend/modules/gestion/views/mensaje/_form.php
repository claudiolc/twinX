<?php

use common\models\User;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Mensaje */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mensaje-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_receptor')->widget(Select2::className(), [
        'data' => ArrayHelper::map(User::find()->where(['<>', 'id', Yii::$app->user->id])->all(), 'id', 'nombreUsername'),
        'theme' => Select2::THEME_KRAJEE_BS4,
        'options' => [
            'placeholder' => 'Seleccione un destinatario',
        ]
    ]) ?>

    <?= $form->field($model, 'asunto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cuerpo')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'etiqueta')->dropDownList([ 'Importante' => 'Importante', 'Poco prioritario' => 'Poco prioritario'], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Enviar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
