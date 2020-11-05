<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Titulacion */
/* @var $centros \common\models\Centro */

$this->title = 'Create Titulacion';
$this->params['breadcrumbs'][] = ['label' => 'Titulacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="titulacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'centros' => $centros,
    ]) ?>

</div>
