<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EnvioMailFase */
/* @var $mails \common\models\MailPredef
 * @var $fases \common\models\FaseExpediente
 */


$this->title = 'Nuevo envío de mail automatizado';
$this->params['breadcrumbs'][] = ['label' => 'Envío de mails automatizado', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="envio-mail-fase-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'mails' => $mails,
        'fases' => $fases
    ]) ?>

</div>
