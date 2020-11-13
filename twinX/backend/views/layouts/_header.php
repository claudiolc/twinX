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
    'innerContainerOptions' => [
        'class' => 'container-fluid ml-5 mr-5'
    ]
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
    $numMsgUnread = Mensaje::find()->noLeidos()->count();
    $numNotfUnseen = \common\models\Recordatorio::find()->notificaciones()->count();

    $unread = '';
    $unseen = '';

    if($numMsgUnread > 0){
        $unread = Yii::$app->view->render('indicadorNoleidos', ['num' => $numMsgUnread]);
    }

    if($numNotfUnseen > 0){
        $unseen = Yii::$app->view->render('indicadorNoleidos', ['num' => $numNotfUnseen]);
    }

    $mailElement = '<div class="d-flex flex-row align-items-center">
                        <i class="fas fa-lg fa-envelope mt-1"></i>' . $unread .
                    '</div>';

    $bellElement = '<div class="d-flex flex-row align-items-center">
                        <i class="fas fa-lg fa-bell mt-1"></i>' . $unseen .
                    '</div>';

    $menuItems[] = ['label' => 'Gestión', 'url' => ['/gestion'], 'active' => in_array(\Yii::$app->controller->module->id, ['gestion'])];
    $menuItems[] = ['label' => 'Calendario', 'url' => ['/calendario'], 'active' => in_array(\Yii::$app->controller->module->id, ['calendario'])];
    $menuItems[] = ['label' => 'Panel de control', 'url' => ['/panel'], 'active' => in_array(\Yii::$app->controller->module->id, ['panel'])];
    $menuItems[] = ['label' => $mailElement, 'url' => ['/gestion/mensaje/bandeja-entrada'], 'active' => in_array(\Yii::$app->controller->id, ['mensaje']),
        'options' => ['class' => 'ml-auto mr-2'], 'labelOptions' => ['class' => 'd-flex flex-row']];
    $menuItems[] = ['label' => $bellElement, 'url' => ['/calendario/notificaciones'], 'active' => in_array(\Yii::$app->controller->id, ['notificaciones']),
        'options' => ['class' => 'mr-5'], 'labelOptions' => ['class' => 'd-flex flex-row']];
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
    'encodeLabels' => false,

]);
NavBar::end();
?>