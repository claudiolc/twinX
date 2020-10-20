<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Acceso';
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model,'username')->textInput(['autofocus' => true])->label('Nombre de usuario') ?>

                <?= $form->field($model, 'password')->passwordInput()->label('Contraseña') ?>

                <?= $form->field($model, 'rememberMe')->checkbox()->label('Mantener mi sesión iniciada') ?>

                <div class="form-group">
                    <?= Html::submitButton('Iniciar sesión', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
</div>