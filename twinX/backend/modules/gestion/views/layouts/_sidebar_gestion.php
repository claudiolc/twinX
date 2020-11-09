<?php
$items = [
    [
        'label' => '<i class="fas fa-chart-line"></i> Dashboard',
        'url' => ['/gestion/dashboard'],
        'active' => in_array(\Yii::$app->controller->id, ['dashboard'])
    ],
    [
        'label' => '<i class="fas fa-university"></i> Convenios',
        'url' => ['/gestion/convenio'],
        'active' => in_array(\Yii::$app->controller->id, ['convenio'])
    ],
    [
        'label' => '<i class="fas fa-user-graduate"></i> Estudiantes',
        'url' => ['/gestion/estudiante'],
        'active' => in_array(\Yii::$app->controller->id, ['estudiante'])
    ],

    [
        'label' => '<i class="fas fa-scroll"></i> Acuerdos de estudios',
        'url' => ['/gestion/acuerdo-estudios'],
        'active' => in_array(\Yii::$app->controller->id, ['acuerdo-estudios'])
    ],

];

echo $this->render('@backend/views/layouts/_sidebar_base.php', ['items' => $items]);

?>