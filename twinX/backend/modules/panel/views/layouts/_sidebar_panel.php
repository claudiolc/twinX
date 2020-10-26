<?php
    $items = [[
        'label' => 'Usuarios',
        'url' => ['/panel/user'],
        'active' => in_array(\Yii::$app->controller->id, ['user'])
        ],

    ];

    echo $this->render('@backend/views/layouts/_sidebar_base.php', ['items' => $items]);

?>