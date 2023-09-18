<?php

namespace app\controllers;

use Yii;
use app\models\Equipos_Has_Proveedor;
use app\models\Equipos_Has_ProveedorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Equipos_Has_ProveedorController implements the CRUD actions for Equipos_Has_Proveedor model.
 */
class Equipos_Has_ProveedorController extends Controller
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
     * Lists all Equipos_Has_Proveedor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Equipos_Has_ProveedorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Equipos_Has_Proveedor model.
     * @param integer $equipos_idequipos
     * @param integer $proveedor_idproveedor
     * @return mixed
     */
    public function actionView($equipos_idequipos, $proveedor_idproveedor)
    {
        return $this->render('view', [
            'model' => $this->findModel($equipos_idequipos, $proveedor_idproveedor),
        ]);
    }

    /**
     * Creates a new Equipos_Has_Proveedor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Equipos_Has_Proveedor();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'equipos_idequipos' => $model->equipos_idequipos, 'proveedor_idproveedor' => $model->proveedor_idproveedor]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Equipos_Has_Proveedor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $equipos_idequipos
     * @param integer $proveedor_idproveedor
     * @return mixed
     */
    public function actionUpdate($equipos_idequipos, $proveedor_idproveedor)
    {
        $model = $this->findModel($equipos_idequipos, $proveedor_idproveedor);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'equipos_idequipos' => $model->equipos_idequipos, 'proveedor_idproveedor' => $model->proveedor_idproveedor]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Equipos_Has_Proveedor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $equipos_idequipos
     * @param integer $proveedor_idproveedor
     * @return mixed
     */
    public function actionDelete($equipos_idequipos, $proveedor_idproveedor)
    {
        $this->findModel($equipos_idequipos, $proveedor_idproveedor)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Equipos_Has_Proveedor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $equipos_idequipos
     * @param integer $proveedor_idproveedor
     * @return Equipos_Has_Proveedor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($equipos_idequipos, $proveedor_idproveedor)
    {
        if (($model = Equipos_Has_Proveedor::findOne(['equipos_idequipos' => $equipos_idequipos, 'proveedor_idproveedor' => $proveedor_idproveedor])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
