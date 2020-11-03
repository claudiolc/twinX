<?php

use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\helpers\Html;

NavBar::begin([
    'brandLabel' => Html::img('@web/images/logo.png', ['alt'=>Yii::$app->name, 'class' => 'header-logo']),
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
//      'class' => 'bg-dark'
    ],
]);

if (Yii::$app->user->isGuest) {
    $menuItems[] = [
        'label' => 'Login',
        'url' => ['/site/login'],
        'options' => ['class' => 'ml-auto']
    ];

} else {
    $menuItems[] = ['label' => 'Gestión', 'url' => ['/gestion'], 'active' => in_array(\Yii::$app->controller->module->id, ['gestion'])];
    $menuItems[] = ['label' => 'Calendario', 'url' => ['/calendario'], 'active' => in_array(\Yii::$app->controller->module->id, ['calendario'])];
    $menuItems[] = ['label' => 'Panel de control', 'url' => ['/panel'], 'active' => in_array(\Yii::$app->controller->module->id, ['panel'])];
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