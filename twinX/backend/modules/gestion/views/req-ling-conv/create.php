<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ReqLingConv */

$this->title = 'Create Req Ling Conv';
$this->params['breadcrumbs'][] = ['label' => 'Req Ling Convs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="req-ling-conv-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
