<?php

namespace backend\modules\gestion\controllers;

use Yii;
use common\models\Mensaje;
use common\models\search\MensajeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MensajeController implements the CRUD actions for Mensaje model.
 */
class MensajeController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Mensaje models.
     * @return mixed
     */
    public function actionRoute($bandeja)
    {
        $searchModel = new MensajeSearch();
        $query = $searchModel->searchQuery(Yii::$app->request->queryParams);

        if($bandeja == 'INBOX')
            $query->andWhere(['id_receptor' => Yii::$app->user->id]);
        else
            $query->andWhere(['id_emisor' => Yii::$app->user->id]);

        $dataProvider = $searchModel->search($query);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'bandeja' => $bandeja
        ]);
    }

    public function actionBandejaEntrada()
    {
        return $this->actionRoute($bandeja = 'INBOX');
    }

    public function actionEnviados()
    {
        return $this->actionRoute($bandeja = 'SENT');
    }

    /**
     * Displays a single Mensaje model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        if(!$model->leido and $model->id_receptor == Yii::$app->user->id) {
            $model->leido = 1;
            $model->save(true, null, true);
        }
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Mensaje model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Mensaje();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    /**
     * Deletes an existing Mensaje model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
//    public function actionDelete($id)
//    {
//        $this->findModel($id)->delete();
//
//        return $this->redirect(['index']);
//    }

    /**
     * Finds the Mensaje model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Mensaje the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Mensaje::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionLeido($id, $leido)
    {
        $model = $this->findModel($id);
        $model->leido = $leido;
        $model->save(true, null, true);


        return $this->redirect(['bandeja-entrada']);
    }
}
