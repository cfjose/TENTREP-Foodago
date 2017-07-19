<?php

namespace app\controllers;

use Yii;
use app\models\Penalty;
use app\models\PenaltySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PenaltyController implements the CRUD actions for Penalty model.
 */
class PenaltyController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Penalty models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PenaltySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Penalty model.
     * @param integer $id
     * @param integer $user_id
     * @param integer $user_user_type_id
     * @param integer $order_id
     * @param integer $order_delivery_status_id
     * @return mixed
     */
    public function actionView($id, $user_id, $user_user_type_id, $order_id, $order_delivery_status_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $user_id, $user_user_type_id, $order_id, $order_delivery_status_id),
        ]);
    }

    /**
     * Creates a new Penalty model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Penalty();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'user_id' => $model->user_id, 'user_user_type_id' => $model->user_user_type_id, 'order_id' => $model->order_id, 'order_delivery_status_id' => $model->order_delivery_status_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Penalty model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $user_id
     * @param integer $user_user_type_id
     * @param integer $order_id
     * @param integer $order_delivery_status_id
     * @return mixed
     */
    public function actionUpdate($id, $user_id, $user_user_type_id, $order_id, $order_delivery_status_id)
    {
        $model = $this->findModel($id, $user_id, $user_user_type_id, $order_id, $order_delivery_status_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'user_id' => $model->user_id, 'user_user_type_id' => $model->user_user_type_id, 'order_id' => $model->order_id, 'order_delivery_status_id' => $model->order_delivery_status_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Penalty model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $user_id
     * @param integer $user_user_type_id
     * @param integer $order_id
     * @param integer $order_delivery_status_id
     * @return mixed
     */
    public function actionDelete($id, $user_id, $user_user_type_id, $order_id, $order_delivery_status_id)
    {
        $this->findModel($id, $user_id, $user_user_type_id, $order_id, $order_delivery_status_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Penalty model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $user_id
     * @param integer $user_user_type_id
     * @param integer $order_id
     * @param integer $order_delivery_status_id
     * @return Penalty the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $user_id, $user_user_type_id, $order_id, $order_delivery_status_id)
    {
        if (($model = Penalty::findOne(['id' => $id, 'user_id' => $user_id, 'user_user_type_id' => $user_user_type_id, 'order_id' => $order_id, 'order_delivery_status_id' => $order_delivery_status_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
