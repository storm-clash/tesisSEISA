<?php

namespace app\controllers;

use app\models\Brigada;
use app\models\Clasificarentidad;
use app\models\Ordenservicio;
use app\models\Planificacion;
use app\models\Sistemasintalados;
use lisi4ok\auditlog\behaviors\LoggableBehavior;
use Yii;
use app\models\Registromantenimientos;
use app\models\RegistromantenimientosSearch;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RegistromantenimientosController implements the CRUD actions for Registromantenimientos model.
 */
class RegistromantenimientosController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access'=>[
                'class'=>AccessControl::className(),
                'only'=>['create','update','index'],
                'rules'=>[
                    [
                        'allow'=>true,
                        'roles'=>['@']
                    ],
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            [ 'class'=>LoggableBehavior::className(),
                'ignoredAttributes'=>[],
                'ignorePrimaryKey'=>true,
                'ignorePrimaryKeyForActions'=>['insert', 'update'],
                'dateTimeFormat'=>'Y-M-D',
            ],
        ];
    }

    /**
     * Lists all Registromantenimientos models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('JefeBrigada'))
        {
        $searchModel = new RegistromantenimientosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        }else {
            return $this->redirect(Url::to(['site/negado']));
        }
    }

    /**
     * Displays a single Registromantenimientos model.
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
     * Creates a new Registromantenimientos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('JefeBrigada'))
        {
        $model = new Registromantenimientos();
        $request=Yii::$app->request;
        $id=$request->get('id');
        $orden=Ordenservicio::find()->where(['id'=>$id])->one();


        if ($model->load(Yii::$app->request->post()) ) {

            $model->fecha=date('y-m-d');
            $model->cliente_idcliente= $orden['cliente_idcliente'];
            $model->brigada_idbrigada=$orden['brigada_idbrigada'];
            $model->ordenServicio_id=$id;
            $model->save();
            Yii::$app->session->setFlash('success', 'Este Registro ha sido guardado exitósamente');

            $orden=Ordenservicio::findOne($id);
            $plan=Planificacion::find()->where(['idplanificacion'=>$orden['planificacion_idplanificacion']])->one();
            $sistema=Sistemasintalados::findOne($plan['sistemasIntalados_idsistemasIntalados']);
            $clasificar=Clasificarentidad::findOne($sistema['clasificarentidad_id']);

            $brig=Brigada::findOne($orden['brigada_idbrigada']);
            $brig->horasTrabajadas=$clasificar['cantHoras'];
            $brig->horasPlanificadas=$brig->horasPlanificadas-$clasificar['cantHoras'];
            if($brig->validate())
            {
                $brig->save();
            }

            $estado = Ordenservicio::findOne($id);
            $estado->estado=0;
            if($estado->validate())
            {
                $estado->save();
            }
            return $this->redirect(['view', 'id' => $model->idregistroMantenimientos]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
        }else {
            return $this->redirect(Url::to(['site/negado']));
        }
    }

    /**
     * Updates an existing Registromantenimientos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->can('JefeBrigada'))
        {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idregistroMantenimientos]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
        }else {
            return $this->redirect(Url::to(['site/negado']));
        }
    }

    /**
     * Deletes an existing Registromantenimientos model.
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
     * Finds the Registromantenimientos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Registromantenimientos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Registromantenimientos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
