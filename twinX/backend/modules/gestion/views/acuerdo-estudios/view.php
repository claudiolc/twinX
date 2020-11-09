<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\AcuerdoEstudios */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Acuerdo Estudios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="acuerdo-estudios-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p class="d-flex justify-content-right">
        <?= Html::a('Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger ml-2',
            'data' => [
                'confirm' => '¿Confirma la eliminación de este elemento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_estudiante',
            'id_tutor',
            'timestamp_creacion',
            'periodo',
            'fase',
            'id_curso',
            'necesidades:ntext',
            'begin_movilidad',
            'end_movilidad',
            'timestamp_nominacion',
            'timestamp_registro',
            'link_documentacion',
            'n_solicitud_RRII',
            'convocatoria',
            'estado_validacion',
        ],
    ]) ?>

</div>
