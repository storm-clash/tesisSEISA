<?php

namespace app\controllers;

use app\models\Brigada;
use app\models\Cliente;
use app\models\Ofertaitems;
use app\models\Ordenservicio;
use app\models\Sistemasintalados;
use app\models\Tiposistemaseguridad;
use app\models\User;
use lisi4ok\auditlog\behaviors\LoggableBehavior;
use Yii;
use app\models\Planificacion;
use app\models\Ofertacomercial;
use app\models\PlanificacionSearch;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PlanificacionController implements the CRUD actions for Planificacion model.
 */
class PlanificacionController extends Controller
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
     * Lists all Planificacion models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('Comercial'))
        {
        $searchModel = new PlanificacionSearch();
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
     * Displays a single Planificacion model.
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
     * Creates a new Planificacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('Comercial'))
        {
        $request=Yii::$app->request;
        $id=$request->get('id');
        $model = new Planificacion();

        if ($model->load(Yii::$app->request->post())) {

            $model->cliente_idcliente=$id;
            $model->estado=1;

            $model->save();
            return $this->redirect(['view', 'id' => $model->idplanificacion]);
        }

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
        }else {
            return $this->redirect(Url::to(['site/negado']));
        }
    }

    /**
     * Updates an existing Planificacion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {



        $model = $this->findModel($id);
        $orden= Ordenservicio::find()->where(['planificacion_idplanificacion'=>$model->idplanificacion])->one();
        $cliente=Cliente::findOne($orden['cliente_idcliente']);
        $brigada=Brigada::findOne($orden['brigada_idbrigada']);
        $user=User::findOne($brigada['idJefeBrigada']);


        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            Yii::$app->session->setFlash('success', 'Planificación Reprogramada Satisfactoriamente');
            $ordenes=Ordenservicio::findOne($orden['id']);
            $ordenes->fecha=$model->fecha;
            if($ordenes->validate())
            {
                $ordenes->save();
                $value= Yii::$app->mailer->compose()
                    ->setFrom(['negocios@seisa.cu'=>'SEISA'])
                    ->setTo($cliente->correo)
                    ->setSubject("Modificación en la Planificación")
                    ->setHtmlBody('Debido a problemas en la empresa cambiamos el mantenimiento del'.$ordenes->fecha.'  para la fecha'.$model->fecha.' Gracias')
                    ->send();

                $value= Yii::$app->mailer->compose()
                    ->setFrom(['negocios@seisa.cu'=>'SEISA'])
                    ->setTo($user->email)
                    ->setSubject("Modificación en la Planificación")
                    ->setHtmlBody('Debido a problemas en la empresa cambiamos el mantenimiento del'.$ordenes->fecha.'  para la fecha'.$model->fecha.' Gracias')
                    ->send();
            }
            return $this->redirect(['view', 'id' => $model->idplanificacion]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Planificacion model.
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

    public function actionLists($id)
    {
        $list=[];
        $ofert =Ofertaitems::find()->where(['id'=>$id])->one();

        $countBrigadas= Ofertaitems::find()
            ->where(['id'=>$id])
            ->count();

        $finalAno=date('y-m-d',strtotime('last day of December'));



        if($countBrigadas>0){
            $fecha=date('y-m-d');
            $fechaInicial=date('y-m-d',strtotime($fecha."+15 days"));
            $fechaRecorrer=$fechaInicial;
            if($fechaInicial<=$finalAno && $ofert['descripcion']==='Sistema Automático de Detección de Incendios'){
                $list[]=$fechaInicial;
                echo "<option value='".$list[0]."'></options>";

                while (date('y-m-d',strtotime($fechaRecorrer."+3 month"))<=$finalAno){
                    $fechaRecorrer=date('y-m-d',strtotime($fechaRecorrer."+3 month"));
                    $list[]=$fechaRecorrer;
                }
                $lon = count($list);
                for ($i = 0; $i < $lon; $i++) {
                    echo $list[$i];
                    echo "<option value='".$list[$i]."'></options>";

                }


            }else if($fechaInicial<=$finalAno){
                $list[]=$fechaInicial;
                echo "<option value='".$list[0]."'></options>";
                while (date('y-m-d',strtotime($fechaRecorrer."+6 month"))<=$finalAno){
                    $fechaRecorrer=date('y-m-d',strtotime($fechaRecorrer."+6 month"));
                    $list[]=$fechaRecorrer;
                }
                $lon = count($list);
                for ($i = 0; $i < $lon; $i++) {
                    echo $list[$i];
                    echo "<option value='".$list[$i]."'></options>";

                }


            }



        }else{
               echo "<options>-</options>";
           }

    }


        /**
     * Finds the Planificacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Planificacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Planificacion::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
