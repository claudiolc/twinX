<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AcuerdoEstudios */

$this->title = 'Nuevo acuerdo de estudios';
$this->params['breadcrumbs'][] = ['label' => 'Acuerdo de estudios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acuerdo-estudios-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
