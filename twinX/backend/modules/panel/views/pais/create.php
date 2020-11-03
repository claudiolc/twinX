<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Pais */

$this->title = 'Nuevo país';
$this->params['breadcrumbs'][] = ['label' => 'Pais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pais-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
