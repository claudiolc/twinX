<?php


namespace backend\modules\gestion\controllers;


use common\models\User;
use yii\data\ActiveDataProvider;

class TutoresController extends \yii\web\Controller
{
    public function actionIndex(){
        $dataProvider = new ActiveDataProvider([
            'query' => User::find()->where(['tipo_usuario' => 'TUTOR'])
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }
}