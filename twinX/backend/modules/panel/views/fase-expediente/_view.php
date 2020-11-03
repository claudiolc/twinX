<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\FaseExpediente */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Fases de expedientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="fase-expediente-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Confirma el borrado de esta fase de expediente?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                   'label' => 'Tipo de expediente',
                    'value' => $model->tipoExp->descripcion,
            ],
            'descripcion',
            [
                    'attribute' => 'fase_final',
                    'value' => function($model){
                        return $model->fase_final == 1 ? 'Sí' : 'No';
                    }
            ]
        ],
    ]) ?>

    <?php //\yii\widgets\Pjax::begin();  ?>
    <div class="ajaxContent" data-url="<?= Url::to(['/panel/envio-mail-fase']); ?>"></div>

</div>
