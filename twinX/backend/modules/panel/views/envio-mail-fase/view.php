<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\EnvioMailFase */

$this->title = 'Envío de mail #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Envío de mails automatizado', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="envio-mail-fase-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p class="d-flex justify-content-end">
        <?= Html::a('Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger ml-2',
            'data' => [
                'confirm' => '¿Confirma la eliminación de este envío de mail automático?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'mail',
                'value' => $model->mail->titulo,
                'label' => 'Mail predefinido'
            ],
            [
                'attribute' => 'fase',
                'value' => $model->fase->descripcion,
                'label' => 'Fase'
            ],
            [
                'attribute' => 'cargo',
                'value' => function($model){
                    switch($model->cargo){
                        case('ADMON_OUT'):
                            return 'Administración OUTCOMING';
                        case('ADMON_IN'):
                            return 'Administración INCOMING';
                        case('COORDINADOR'):
                            return 'Coordinador';
                        case('RESP_ADMON_OUT'):
                            return 'Responsable administración OUTCOMING';
                        default:
                            return $model->cargo;

                    }
                }
            ],
        ],
    ]) ?>

</div>
