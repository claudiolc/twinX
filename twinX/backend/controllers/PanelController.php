<?php


namespace backend\controllers;


use yii\web\Controller;

/**
 * Class PanelController
 * @package backend\controllers
 */

class PanelController extends Controller
{
    public function actionIndex()
    {
        $this->layout = 'panel';
        return $this->render('index');

    }

}