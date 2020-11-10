<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\AcuerdoEstudios */

$this->title = 'Acuerdo de estudios #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Acuerdo Estudios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="acuerdo-estudios-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p class="d-flex justify-content-end">
        <?= Html::a('Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger ml-2',
            'data' => [
                'confirm' => '¿ESTÁ SEGURO/A DE QUERER BORRAR ESTE ACUERDO DE ESTUDIOS?',
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
                'label' => 'Estudiante',
                'format' => 'raw',
                'value' => Html::a($model->nombreEstudiante, ['estudiante/view', 'id' => $model->estudiante->id_usuario], ['class' => 'btn btn-outline-primary'])
            ],
            [
                'attribute' => 'convenio',
                'format' => 'raw',
                'value' => Html::a($model->convenio, ['convenio/view', 'id' => $model->estudiante->convenio->id], ['class' => 'btn btn-outline-primary'])
            ],
            [
                'attribute' => 'tutor.nombreUsername',
                'format' => 'raw',
                'label' => 'Tutor'
            ],
            'timestamp_creacion',
            'periodo',
            'fase',
            'curso.curso',
            'necesidades:ntext',
            'begin_movilidad',
            'end_movilidad',
            'timestamp_nominacion',
            'link_documentacion',
            'n_solicitud_RRII',
            'convocatoria',
        ],
    ]) ?>

</div>
