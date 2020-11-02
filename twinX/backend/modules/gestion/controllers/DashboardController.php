<?php


namespace backend\modules\gestion\controllers;


use yii\web\Controller;

class DashboardController extends Controller
{
    /**
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}