<?php

namespace backend\modules\panel\controllers;

use common\models\Pais;
use Yii;
use common\models\Universidad;
use common\models\search\UniversidadSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UniversidadController implements the CRUD actions for Universidad model.
 */
class UniversidadController extends Controller
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
     * Lists all Universidad models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UniversidadSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Universidad model.
     * @param string $cod_uni
     * @param string $cod_pais
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($cod_uni, $cod_pais)
    {
        return $this->render('view', [
            'model' => $this->findModel($cod_uni, $cod_pais),
        ]);
    }

    /**
     * Creates a new Universidad model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Universidad();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'cod_uni' => $model->cod_uni, 'cod_pais' => $model->cod_pais]);
        }

        return $this->render('create', [
            'model' => $model,
            'paises' => $this->getAllPaises()
        ]);
    }

    /**
     * Updates an existing Universidad model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $cod_uni
     * @param string $cod_pais
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($cod_uni, $cod_pais)
    {
        $model = $this->findModel($cod_uni, $cod_pais);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'cod_uni' => $model->cod_uni, 'cod_pais' => $model->cod_pais]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Universidad model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $cod_uni
     * @param string $cod_pais
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($cod_uni, $cod_pais)
    {
        $this->findModel($cod_uni, $cod_pais)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Universidad model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $cod_uni
     * @param string $cod_pais
     * @return Universidad the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($cod_uni, $cod_pais)
    {
        if (($model = Universidad::findOne(['cod_uni' => $cod_uni, 'cod_pais' => $cod_pais])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function getAllPaises()
    {
        $model = new Pais();
        $paises = [];

        $result = $model->find()->select(['iso', 'nombre'])->all();

        foreach ($result as $res) {
            $paises[$res->iso] = $res->nombre;
        }

        return $paises;
    }
}
