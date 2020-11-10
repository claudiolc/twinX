<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Expediente */
///* @var $fases \common\models\RelExpFase */

$relExpFase = new \backend\modules\gestion\controllers\RelExpFaseController('rel-exp-fase', Yii::$app->getModule('rel-exp-fase'));


$this->params['breadcrumbs'][] = ['label' => 'Expedientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
\backend\assets\GestionAsset::register($this);
?>
<div class="expediente-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p class="d-flex justify-content-end">
        <?= Html::a('Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger ml-2',
            'data' => [
                'confirm' => '¿Confirma la eliminación de este expediente?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                    'attribute' => 'nombreEstudiante',
                    'label' => 'Nombre',
                    'format' => 'raw'
            ],
            [
                'attribute' => 'convenio',
                'label' => 'Convenio',
                'format' => 'raw'
            ],
            [
                'attribute' => 'descripcionTipoExp',
                'label' => 'Tipo de expediente',
            ],
        ],
    ]) ?>



</div>
