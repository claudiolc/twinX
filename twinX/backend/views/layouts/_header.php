<?php

use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
]);
$menuItems = [
    ['label' => 'Home', 'url' => ['/site/index']],
];
if (Yii::$app->user->isGuest) {
    $menuItems[] = [
        'label' => 'Login',
        'url' => ['/site/login'],
        'options' => ['class' => 'ml-auto']
    ];

} else {
    $menuItems[] = ['label' => 'Gestión', 'url' => ['/gestion']];
    $menuItems[] = ['label' => 'Calendario', 'url' => ['/calendario']];
    $menuItems[] = ['label' => 'Panel de control', 'url' => ['/controlPanel']];
    $menuItems[] = ['label' => 'Salir ('.Yii::$app->user->identity->username.')',
        'url' => ['/site/logout'],
        'linkOptions' => [
            'data-method' => 'post',
        ],
        'options' => ['class' => 'ml-auto']
    ];
}
echo Nav::widget([
    'options' => ['class' => 'navbar-nav w-100'],
    'items' => $menuItems,
]);
NavBar::end();
?>