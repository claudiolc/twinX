<?php


namespace backend\modules\calendario\controllers;


use common\models\Recordatorio;
use Yii;
use yii\data\ActiveDataProvider;

class NotificacionesController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Recordatorio::find()->notificaciones()
        ]);

        return $this->render('index', [
            'recordatorios' => $dataProvider
        ]);
    }
}