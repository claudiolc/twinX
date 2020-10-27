<?php
    $items = [[
        'label' => 'Usuarios',
        'url' => ['/panel/user'],
        'active' => in_array(\Yii::$app->controller->id, ['user'])
        ],
        [
            'label' => 'Tipos de expediente',
            'url' => ['/panel/tipo_expediente'],
            'active' => in_array(\Yii::$app->controller->id, ['tipo_expediente'])
        ],

    ];

    echo $this->render('@backend/views/layouts/_sidebar_base.php', ['items' => $items]);

?>