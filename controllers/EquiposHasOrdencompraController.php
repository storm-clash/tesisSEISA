<?php

namespace app\controllers;

use Yii;
use app\models\EquiposHasOrdencompra;
use app\models\EquiposHasOrdencompraSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EquiposHasOrdencompraController implements the CRUD actions for EquiposHasOrdencompra model.
 */
class EquiposHasOrdencompraController extends Controller
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
     * Lists all EquiposHasOrdencompra models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EquiposHasOrdencompraSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EquiposHasOrdencompra model.
     * @param integer $equipos_idequipos
     * @param integer $ordenCompra_idordenCompra
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($equipos_idequipos, $ordenCompra_idordenCompra)
    {
        return $this->render('view', [
            'model' => $this->findModel($equipos_idequipos, $ordenCompra_idordenCompra),
        ]);
    }

    /**
     * Creates a new EquiposHasOrdencompra model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EquiposHasOrdencompra();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'equipos_idequipos' => $model->equipos_idequipos, 'ordenCompra_idordenCompra' => $model->ordenCompra_idordenCompra]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing EquiposHasOrdencompra model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $equipos_idequipos
     * @param integer $ordenCompra_idordenCompra
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($equipos_idequipos, $ordenCompra_idordenCompra)
    {
        $model = $this->findModel($equipos_idequipos, $ordenCompra_idordenCompra);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'equipos_idequipos' => $model->equipos_idequipos, 'ordenCompra_idordenCompra' => $model->ordenCompra_idordenCompra]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing EquiposHasOrdencompra model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $equipos_idequipos
     * @param integer $ordenCompra_idordenCompra
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($equipos_idequipos, $ordenCompra_idordenCompra)
    {
        $this->findModel($equipos_idequipos, $ordenCompra_idordenCompra)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EquiposHasOrdencompra model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $equipos_idequipos
     * @param integer $ordenCompra_idordenCompra
     * @return EquiposHasOrdencompra the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($equipos_idequipos, $ordenCompra_idordenCompra)
    {
        if (($model = EquiposHasOrdencompra::findOne(['equipos_idequipos' => $equipos_idequipos, 'ordenCompra_idordenCompra' => $ordenCompra_idordenCompra])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
