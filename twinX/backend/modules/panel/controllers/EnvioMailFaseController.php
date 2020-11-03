<?php

namespace backend\modules\panel\controllers;

use common\models\FaseExpediente;
use common\models\MailPredef;
use Yii;
use common\models\EnvioMailFase;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EnvioMailFaseController implements the CRUD actions for EnvioMailFase model.
 */
class EnvioMailFaseController extends Controller
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
     * Lists all EnvioMailFase models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => EnvioMailFase::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionFilteredIndex($id)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => EnvioMailFase::find()->andWhere('id_fase = ' . $id),
        ]);

        return $this->render('@backend/modules/panel/views/envio-mail-fase/_index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionFilteredExtendedIndex($id)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => EnvioMailFase::find()->andWhere('id_fase = ' . $id),
        ]);

        return $this->render('@backend/modules/panel/views/envio-mail-fase/index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EnvioMailFase model.
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
     * Creates a new EnvioMailFase model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EnvioMailFase();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionCreateByFaseId($id)
    {
        $model = new EnvioMailFase();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->actionFilteredIndex($id);
        }

        $model->id_fase = $id;
        return $this->render('@backend/modules/panel/views/envio-mail-fase/create', [
            'model' => $model,
            'mails' => $this->getAllMails(),
            'fases' => $this->getAllFases(),
        ]);
    }

    /**
     * Updates an existing EnvioMailFase model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'fases' =>$this->getAllFases(),
            'mails' => $this->getAllMails(),
        ]);
    }

    /**
     * Deletes an existing EnvioMailFase model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDeleteByFaseId($id, $idFase)
    {
        $this->findModel($id)->delete();

        return $this->actionFilteredIndex($idFase);
    }

    /**
     * Finds the EnvioMailFase model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EnvioMailFase the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EnvioMailFase::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function getAllMails()
    {
        $model = new MailPredef();
        $mails = [];

        $result = $model->find()->select(['id', 'titulo'])->all();

        foreach ($result as $res) {
            $mails[$res->id] = $res->titulo;
        }

        return $mails;
    }

    protected function getAllFases()
    {
        $model = new FaseExpediente();
        $fases = [];

        $result = $model->find()->select(['id', 'descripcion'])->all();

        foreach ($result as $res) {
            $fases[$res->id] = $res->descripcion;
        }

        return $fases;
    }

}
