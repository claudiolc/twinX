<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\RecordatorioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Recordatorios';
$this->params['breadcrumbs'][] = $this->title;

Yii::$app->view->render('@backend/modules/calendario/views/recordatorio/gridview.php');
?>
<div class="recordatorio-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p class="d-flex justify-content-end">
        <?= Html::a('Create Recordatorio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php gridViewRecordatorio($dataProvider, $searchModel); ?>

    <?php Pjax::end(); ?>

</div>
