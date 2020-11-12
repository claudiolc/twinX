<?php
$items = [
    [
        'label' => '<i class="fas fa-sticky-note"></i> Recordatorios',
        'url' => ['/calendario/recordatorio'],
        'active' => in_array(\Yii::$app->controller->id, ['recordatorio'])
    ],
    [
        'label' => '<i class="fas fa-bell"></i> Notificaciones',
        'url' => ['/calendario/notificaciones'],
        'active' => in_array(\Yii::$app->controller->id, ['notificaciones'])
    ],



];

echo $this->render('@backend/views/layouts/_sidebar_base.php', ['items' => $items]);

?>