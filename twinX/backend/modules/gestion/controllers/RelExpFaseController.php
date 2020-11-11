<?php

namespace backend\modules\gestion\controllers;

use Yii;
use common\models\RelExpFase;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RelExpFaseController implements the CRUD actions for RelExpFase model.
 */
class RelExpFaseController extends Controller
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
     * Lists all RelExpFase models.
     * @return mixed
     */
    public function actionIndex($idExpediente = false)
    {
        $path = '';
        $query = RelExpFase::find();

        if($idExpediente) {
            $path = '@backend/modules/gestion/views/rel-exp-fase/';
            $query = RelExpFase::find()->where(['id_exp' => $idExpediente]);
        }


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render($path . 'index', [
            'dataProvider' => $dataProvider,
            'idExpediente' => $idExpediente,
        ]);
    }



    /**
     * Displays a single RelExpFase model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new RelExpFase model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($expediente = null)
    {
        $model = new RelExpFase();

        if ($model->load(Yii::$app->request->post()) && $model->save() && !$expediente) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        else if($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->actionIndex($expediente);
        }

        $path = '@backend/modules/gestion/views/rel-exp-fase/create';

        return $this->render($path, [
            'model' => $model,
            'expediente' => $expediente
        ]);
    }

    /**
     * Updates an existing RelExpFase model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $exp = null)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save() && !$exp) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        else if($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->actionIndex(true);
        }

        $path = 'update';

        if($exp) {
            $path = '@backend/modules/gestion/views/rel-exp-fase/update';
        }

        return $this->render($path, [
            'model' => $model,
            'exp' => $exp
        ]);
    }

    /**
     * Deletes an existing RelExpFase model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $idExpediente = false)
    {
        $this->findModel($id)->delete();

        if($idExpediente)
            return $this->redirect(['/gestion/expediente/view?id='.$idExpediente]);

        return $this->redirect(['index']);
    }
    public function actionProcesarFase($id, $idExpediente = false)
    {
       $model = $this->findModel($id);
       $model->procesado = 1;
       $model->save();

        if($idExpediente)
            return $this->redirect(['/gestion/expediente/view?id='.$idExpediente]);

        return $this->redirect(['index']);
    }

    /**
     * Finds the RelExpFase model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RelExpFase the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RelExpFase::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
