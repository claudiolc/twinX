<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Crear usuario';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <script> alert('Recuerde que el usuario que cree deberá solicitar recibir un correo para confirmar su cuenta') </script>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
