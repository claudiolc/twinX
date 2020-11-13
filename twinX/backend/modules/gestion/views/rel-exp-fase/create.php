<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\RelExpFase */
/* @var $expediente \common\models\Expediente */

$this->title = 'Nueva fase';
$this->params['breadcrumbs'][] = ['label' => 'Rel Exp Fases', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rel-exp-fase-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'expediente' => $expediente
    ]) ?>

</div>
