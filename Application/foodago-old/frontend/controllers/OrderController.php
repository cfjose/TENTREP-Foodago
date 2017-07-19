<?php

namespace app\controllers;

use Yii;
use app\models\Order;
use app\models\OrderSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrderController implements the CRUD actions for Order model.
 */
class OrderController extends Controller
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
     * Lists all Order models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Order model.
     * @param integer $id
     * @param integer $delivery_status_id
     * @param integer $user_id
     * @param integer $user_user_type_id
     * @return mixed
     */
    public function actionView($id, $delivery_status_id, $user_id, $user_user_type_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $delivery_status_id, $user_id, $user_user_type_id),
        ]);
    }

    /**
     * Creates a new Order model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Order();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'delivery_status_id' => $model->delivery_status_id, 'user_id' => $model->user_id, 'user_user_type_id' => $model->user_user_type_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Order model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $delivery_status_id
     * @param integer $user_id
     * @param integer $user_user_type_id
     * @return mixed
     */
    public function actionUpdate($id, $delivery_status_id, $user_id, $user_user_type_id)
    {
        $model = $this->findModel($id, $delivery_status_id, $user_id, $user_user_type_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'delivery_status_id' => $model->delivery_status_id, 'user_id' => $model->user_id, 'user_user_type_id' => $model->user_user_type_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Order model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $delivery_status_id
     * @param integer $user_id
     * @param integer $user_user_type_id
     * @return mixed
     */
    public function actionDelete($id, $delivery_status_id, $user_id, $user_user_type_id)
    {
        $this->findModel($id, $delivery_status_id, $user_id, $user_user_type_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Order model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $delivery_status_id
     * @param integer $user_id
     * @param integer $user_user_type_id
     * @return Order the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $delivery_status_id, $user_id, $user_user_type_id)
    {
        if (($model = Order::findOne(['id' => $id, 'delivery_status_id' => $delivery_status_id, 'user_id' => $user_id, 'user_user_type_id' => $user_user_type_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
