<?php

namespace app\controllers;

use app\models\EquiposHasOrdencompra;
use app\models\Estado;
use app\models\Ordencompra;
use app\models\Sistemasintalados;
use Yii;
use app\models\Equipos;
use app\models\EquiposSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EquiposController implements the CRUD actions for Equipos model.
 */
class EquiposController extends Controller
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
     * Lists all Equipos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EquiposSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Equipos model.
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
     * Creates a new Equipos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request=Yii::$app->request;
        $id=$request->get('id');

        $model = new Equipos();

        if ($model->load(Yii::$app->request->post()) ) {
            $model->sistemasIntalados_idsistemasIntalados=$id;
            $model->save();
            $estado=new Estado();
            $estado1=$estado->nombreEstado($model->estado_id);
            if($estado1['nombre']=='Malo' || $estado1['nombre']=='Regular'){
                $orden= new Ordencompra();
                $orden->fecha=date('y-m-d h:m:s');
                $sistema=new Sistemasintalados();
                $sist= $sistema->comboidSist($id);
                $orden->cliente_idcliente=$sist['cliente_idcliente'];
                if($orden->validate()){
                    $orden->save();
                    $equipo_has_orden= new EquiposHasOrdencompra();
                    $equipo_has_orden->equipos_idequipos=$model->idequipos;
                    $equipo_has_orden->ordenCompra_idordenCompra=$orden->idordenCompra;
                    if($equipo_has_orden->validate()){
                        $equipo_has_orden->save();

                    }
                }
            }
            return $this->redirect(['view', 'id' => $model->idequipos]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Equipos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idequipos]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Equipos model.
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

    /**
     * Finds the Equipos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Equipos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Equipos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
