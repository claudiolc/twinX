<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Envío de mails en fase';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="envio-mail-fase-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p class="d-flex justify-content-end">
        <a class="btn btn-success" href="view-link-mail?id=<?php echo $_GET['id']?>">Nuevo envío de mail</a>
        <a class="btn btn-primary ml-1" href="/panel/envio-mail-fase">Más</a>

    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            [
                'attribute' => 'mail',
                'value' => 'mail.titulo',
                'label' => 'Mail predefinido'
            ],

            'cargo',

        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
