<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Envío de mails automatizado';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="envio-mail-fase-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p class="d-flex justify-content-end">
        <a class="btn btn-success" href="create.php">Nuevo envío de mail</a>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'mail',
                'value' => 'mail.titulo',
                'label' => 'Mail predefinido'
            ],
            [
                'attribute' => 'fase',
                'value' => 'fase.descripcion',
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

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'header' => 'Acciones'
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
