<?php

use common\models\Mensaje;
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

        'label' => 'Registro',
        'url' => ['/site/signup'],
        'options' => ['class' => 'ml-auto']
    ];
    $menuItems[] = [

        'label' => 'Login',
        'url' => ['/site/login'],

    ];


} else {
    $numUnread = Mensaje::find()->where(['id_receptor' => \Yii::$app->user->id, 'leido' => null])->count();
    $unread = '';
    if($numUnread > 0){
        $unread = '<p class="bg-danger text-white rounded-circle pl-2 pr-2 ml-1 mb-0">'. $numUnread . '</p>';
    }

    $mailElement = '<div class="d-flex flex-row align-items-center">
                        <i class="fas fa-lg fa-envelope" style="margin-top:1%;"></i>' . $unread .
                    '</div>';

    $menuItems[] = ['label' => 'Gestión', 'url' => ['/gestion'], 'active' => in_array(\Yii::$app->controller->module->id, ['gestion'])];
    $menuItems[] = ['label' => 'Calendario', 'url' => ['/calendario'], 'active' => in_array(\Yii::$app->controller->module->id, ['calendario'])];
    $menuItems[] = ['label' => 'Panel de control', 'url' => ['/panel'], 'active' => in_array(\Yii::$app->controller->module->id, ['panel'])];
    $menuItems[] = ['label' => $mailElement, 'url' => ['/gestion/mensaje/bandeja-entrada'], 'active' => in_array(\Yii::$app->controller->id, ['mensaje']),
        'options' => ['class' => 'ml-auto mr-5'], 'labelOptions' => ['class' => 'd-flex flex-row']];
    $menuItems[] = ['label' => 'Salir ('.Yii::$app->user->identity->username.')',
        'url' => ['/site/logout'],
        'linkOptions' => [
            'data-method' => 'post',
        ],
        'options' => ['class' => '']
    ];
}
echo Nav::widget([
    'options' => ['class' => 'navbar-nav w-100'],
    'items' => $menuItems,
    'encodeLabels' => false
]);
NavBar::end();
?>