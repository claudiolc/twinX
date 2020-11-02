<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EnvioMailFase */
/* @var $form yii\widgets\ActiveForm */
/* @var $mails \common\models\MailPredef
 * @var $fases \common\models\FaseExpediente
 */
?>

<div class="envio-mail-fase-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_mail')->dropDownList($mails); ?>

    <?= $form->field($model, 'id_fase')->dropDownList($fases); ?>

    <?= $form->field($model, 'cargo')->dropDownList([ 'COORDINADOR' => 'Coordinador', 'ADMON_IN' => 'Administración INCOMING', 'ADMON_OUT' => 'Administración OUTCOMING', 'RESP_ADMON_OUT' => 'Responsable administración OUTCOMING', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
