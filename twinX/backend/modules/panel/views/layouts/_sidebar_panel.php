<?php
    $items = [[
        'label' => 'Usuarios',
        'url' => ['/panel/user'],
        'active' => in_array(\Yii::$app->controller->id, ['user'])
        ],
        [
            'label' => 'Expedientes',
            'items' => [
                [
                    'label' => 'Tipos de expediente',
                    'url' => ['/panel/tipo-expediente'],
                    'active' => in_array(\Yii::$app->controller->id, ['tipo-expediente'])
                ],
                [
                    'label' => 'Fases de expedientes',
                    'url' => ['/panel/fase-expediente'],
                    'active' => in_array(\Yii::$app->controller->id, ['fase-expediente'])
                ],
            ],
        ],

        [
            'label' => 'Mails predefinidos',
            'url' => ['/panel/mail-predef'],
            'active' => in_array(\Yii::$app->controller->id, ['mail-predef'])
        ],

    ];

    echo $this->render('@backend/views/layouts/_sidebar_base.php', ['items' => $items]);

?>