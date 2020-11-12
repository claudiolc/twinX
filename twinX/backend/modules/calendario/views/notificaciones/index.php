<?php
/* @var $recordatorios \yii\debug\models\timeline\DataProvider */

$this->title = 'Notificaciones';
Yii::$app->view->render('@backend/modules/calendario/views/recordatorio/gridview.php');

?>

<h1><?= $this->title ?></h1>

<div class="mt-5">
    <?= gridViewRecordatorio($recordatorios) ?>
</div>
