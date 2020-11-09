<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Convenio */

$this->title = 'Modificar convenio: ' . $model->codConvenioNoIcon;
$this->params['breadcrumbs'][] = ['label' => 'Convenios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Guardar';
?>
<div class="convenio-update">

    <h1><?= 'Modificar convenio: ' . $model->codConvenio ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
