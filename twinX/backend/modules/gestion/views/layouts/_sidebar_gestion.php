<?php
$items = [
    [
        'label' => 'Dashboard',
        'url' => ['/gestion/dashboard'],
        'active' => in_array(\Yii::$app->controller->id, ['dashboard'])
    ],
    [
        'label' => 'Estudiantes',
        'url' => ['/gestion/estudiante'],
        'active' => in_array(\Yii::$app->controller->id, ['estudiante'])
    ],

];

echo $this->render('@backend/views/layouts/_sidebar_base.php', ['items' => $items]);

?>