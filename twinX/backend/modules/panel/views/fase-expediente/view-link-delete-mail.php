<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model common\models\FaseExpediente */
/* @var $id int */

$envioMailFase = new \backend\modules\panel\controllers\EnvioMailFaseController('envio-mail-fase', Yii::$app->getModule('envio-mail-fase'));
//$dataProvider =

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Fases de expedientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<?php include('_view.php') ?>

<?php echo $envioMailFase->actionDeleteByFaseId($id ,$model->id) ?>

<?php $this->title = 'Fase #'.$model->id; ?>
