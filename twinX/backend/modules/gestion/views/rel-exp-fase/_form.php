<?php

use common\models\FaseExpediente;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\RelExpFase */
/* @var $form yii\widgets\ActiveForm */
/* @var $expediente \common\models\Expediente */

?>

<div class="rel-exp-fase-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php

    $arrayIdExp = [];

    if($expediente){
        $arrayIdExp = ['readonly' => true, 'value' => $expediente->id];
    }
    ?>

    <?= $form->field($model, 'id_exp')->textInput($arrayIdExp) ?>

    <?= $form->field($model, 'id_fase')->widget(Select2::className(), [
        'data' => ArrayHelper::map(FaseExpediente::find()->where(['id_tipo_exp' => $expediente->id_tipo_exp])->all(), 'id', 'descripcionIO'),
        'theme' => Select2::THEME_KRAJEE_BS4,
        'options' => [
            'placeholder' => 'Seleccione una fase',
        ]
    ]) ?>

    <?= $form->field($model, 'procesado')->checkbox() ?>

    <?= $form->field($model, 'info')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
