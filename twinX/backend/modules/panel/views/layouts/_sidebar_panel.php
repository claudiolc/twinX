<?php
    $items = [
        [
            'label' => 'Usuarios',
            'url' => ['/panel/user'],
            'active' => in_array(\Yii::$app->controller->id, ['user']),
            'options' => [
                'data-pjax' => 1,
            ]
        ],
        [
            'label' => 'Expedientes <i class="fas fa-caret-down"></i>',
            'options' => [
                'onClick' => 'toggleCollapse();',
                'class' => 'dropdown-parent'
            ],
            'active' => in_array(\Yii::$app->controller->id, ['tipo-expediente', 'fase-expediente']),

        ],
        [
            'label' => '<p class="pl-4 m-0">Tipos de expediente</p>',
            'url' => ['/panel/tipo-expediente'],
            'active' => in_array(\Yii::$app->controller->id, ['tipo-expediente']),
            'options' => [
                'class' => 'dropdown-node collapse',
                'data-pjax' => 0,
            ]
        ],
        [
            'label' => '<p class="pl-4 m-0">Fases de expedientes</p>',
            'url' => ['/panel/fase-expediente'],
            'active' => in_array(\Yii::$app->controller->id, ['fase-expediente']),
            'options' => [
                'class' => 'dropdown-node collapse'
            ]
        ],

        [
            'label' => 'Mails predefinidos',
            'url' => ['/panel/mail-predef'],
            'active' => in_array(\Yii::$app->controller->id, ['mail-predef'])
        ],

        [
            'label' => 'Universidades',
            'url' => ['/panel/universidad'],
            'active' => in_array(\Yii::$app->controller->id, ['universidad'])
        ],

        [
            'label' => 'Países',
            'url' => ['/panel/pais'],
            'active' => in_array(\Yii::$app->controller->id, ['pais'])
        ],

        [
            'label' => 'Titulaciones',
            'url' => ['/panel/titulacion'],
            'active' => in_array(\Yii::$app->controller->id, ['titulacion'])
        ],

        [
            'label' => 'Centros',
            'url' => ['/panel/centro'],
            'active' => in_array(\Yii::$app->controller->id, ['centro'])
        ],

    ];

    echo $this->render('@backend/views/layouts/_sidebar_base.php', ['items' => $items]);

?>