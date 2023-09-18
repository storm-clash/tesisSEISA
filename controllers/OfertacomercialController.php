<?php

namespace app\controllers;

use app\models\Brigada;
use app\models\Clasificarentidad;
use app\models\Sistemaseguridadelectronica;
use app\models\Sistemasfijosextincion;
use app\models\Sistemasintalados;
use app\models\Sistemasproteccionrayos;
use app\models\Tiposistemaseguridad;
use lisi4ok\auditlog\behaviors\LoggableBehavior;
use Mpdf\Mpdf;
use Yii;
use app\models\Model;
use app\models\Ofertacomercial;
use app\models\OfertacomercialSearch;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Ofertaitems;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * OfertacomercialController implements the CRUD actions for Ofertacomercial model.
 */
class OfertacomercialController extends Controller
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
     * Lists all Ofertacomercial models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('Comercial'))
        {
        $searchModel = new OfertacomercialSearch();
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
     * Displays a single Ofertacomercial model.
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
     * Creates a new Ofertacomercial model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('Comercial'))
        {
        $model = new Ofertacomercial();
            if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
                Yii::$app->response->format=Response::FORMAT_JSON;
                return ActiveForm::validate($model);

            }

        $modelsItems = new Ofertaitems();
        $request=Yii::$app->request;
        $id=$request->get('id');
        $var=Sistemasintalados::comboPun($id);

       // $valor=20;

        if ($model->load(Yii::$app->request->post()) ) {

                $model->fecha = date('y-m-d h:m:s');
                $model->elaborado = Yii::$app->user->identity->id;
                $model->cargo = 'Especialista Comercial';
                $model->cliente_idcliente = $id;
                $model->estados_idestados=1;


                if(empty($var)==true) {
                    $model->save();
                    Yii::$app->session->setFlash('success', 'Oferta Comercial ha sido creado exitósamente');

                $modelsItems = Model::createMultiple(Ofertaitems::classname());
                Model::loadMultiple($modelsItems, Yii::$app->request->post());


                // validate all models
                $valid = $model->validate();
                $valid = Model::validateMultiple($modelsItems) && $valid;

                if ($valid) {
                    $transaction = \Yii::$app->db->beginTransaction();
                    try {
                        if ($flag = $model->save(false)) {
                            foreach ($modelsItems as $modelsItems) {
                                $sistema=new Sistemasintalados();
                                $modelsItems->ofertaComercial_id = $model->id;




                                $tipo= Clasificarentidad::find()->where(['tipoSistemaSeguridad_id'=>$modelsItems->descripcion])->all();

                                $maa=Clasificarentidad::find()->where(['id'=>$modelsItems->clasificacion])->one();

                               foreach ($tipo as $suerte)
                               {
                                   if($suerte['rangoInicial']==$maa['rangoInicial'])
                                   {


                                       $modelsItems->clasificacion=$suerte['rangoInicial'];
                                       $modelsItems->precioMN=$suerte['precioMN'];
                                       $modelsItems->precioCUC=$suerte['precioCUC'];
                                       $modelsItems->cantXano=1;

                                       $sistema->cliente_idcliente=$id;
                                       $sistema->tipoSistemaSeguridad_id=$suerte['tipoSistemaSeguridad_id'];
                                       $sistema->local='Empresa';
                                       $sistema->clasificacion=$suerte['rangoInicial'];
                                       $sistema->clasificarentidad_id=$suerte['id'];
                                       if($sistema->validate()){
                                           $sistema->save();

                                       }


                                       if (!($flag = $modelsItems->save(false))) {
                                           $transaction->rollBack();
                                           break;
                                       }
                                   }
                               }





                            }
                        }
                        if ($flag) {
                            $transaction->commit();
                            return $this->redirect(['view', 'id' => $model->id]);
                        }
                    } catch (Exception $e) {
                        $transaction->rollBack();
                    }
                }
            }else

                    $model->save();
                    $prueba=new Sistemasintalados();
                    $modelSistemas2=$prueba->comboidCla($id);

                    $correcto=new Clasificarentidad();
             foreach ($modelSistemas2 as $modelo){





                     $nombreSistema=\app\models\Tiposistemaseguridad::find()->where(['id'=>$modelo['tipoSistemaSeguridad_id']])->one();
                     $clasificar= \app\models\Clasificarentidad::find()->where(['id'=>$modelo['clasificarentidad_id']])->one();


                    $var=0;
                    $modelItem2 = new Ofertaitems();


                        $modelItem2->ofertaComercial_id = $model->id;
                        $modelItem2->descripcion = $nombreSistema['nombre'];
                        $modelItem2->clasificacion = $modelo['clasificacion'];
                        $modelItem2->cantXano = $modelsItems->cantXano;
                        $modelItem2->precioMN = $clasificar['precioMN'];
                        $modelItem2->precioCUC = $clasificar['precioCUC'];
                        if ($modelItem2->validate()) {

                            $modelItem2->save();


                        }


                }
                return $this->redirect(['view', 'id' => $model->id]);
        }
        if(empty($var)==false){
            return $this->render('create2', [
                'model' => $model,
               // 'modelsItems' => (empty($modelsItems)) ? [new Ofertaitems] : $modelsItems
            ]);

          }else

            return $this->render('create', [
                'model' => $model,
                'modelsItems' => (empty($modelsItems)) ? [new Ofertaitems] : $modelsItems
            ]);
        }else {
            return $this->redirect(Url::to(['site/negado']));
        }

    }

    /**
     * Updates an existing Ofertacomercial model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);


        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format=Response::FORMAT_JSON;
            return ActiveForm::validate($model);

        }

        if ($model->load(Yii::$app->request->post())) {
            $model->estados_idestados=1;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Ofertacomercial model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        //$sistema=Sistemasintalados::find()->where([''])
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionLists($id)
    {
        $ofert=new Ofertacomercial();
       // $oferta=$ofert->buscarUeb($id);

        $countBrigadas= Clasificarentidad::find()
            ->where(['tipoSistemaSeguridad_id'=>$id])
            ->count();

        $brigadas= Clasificarentidad::find()
            ->where(['tipoSistemaSeguridad_id'=>$id])
            ->all();

        if($countBrigadas>0){
            foreach ($brigadas as $brigada){
                echo "<option value='".$brigada->id."'>".$brigada->rangoInicial."</options>";
            }
        }
        else{
            echo "<options>-</options>";
        }
    }

    /**
     * Finds the Ofertacomercial model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ofertacomercial the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ofertacomercial::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionEstado($id){

        $model = Ofertacomercial::findOne($id);
        if($model->estados_idestados==1) {
            $model->estados_idestados = 2;
            if ($model->validate()) {
                $model->save();
                Yii::$app->session->setFlash('success', 'Oferta Aceptada');
            }
        }else if($model->estados_idestados==2) {
            $model->estados_idestados = 3;
            if ($model->validate()) {
                $model->save();
                Yii::$app->session->setFlash('danger', 'Esta oferta ha sido Rechazada');
            }
        }else if($model->estados_idestados==3) {
            $model->estados_idestados = 1;
            if ($model->validate()) {
                $model->save();
                Yii::$app->session->setFlash('info', 'Vuelve al estado de Elaborado');
            }
        }
        return $this->redirect(['index']);

    }
    public function actionCreatepdf($id)
    {
        $mPDF=new Mpdf();
        $mPDF->SetTitle("Reporte Ofertas Comerciales");
        $mPDF->SetWatermarkText("SEISA");
        $mPDF->showWatermarkText=true;
        $mPDF->watermark_font='DejaVuSansCondensed';
        $mPDF->watermarkTextAlpha=0.1;
        $mPDF->SetDisplayMode('fullpage');
        $mPDF->WriteHTML($this->renderPartial('ofertaPDF',['id'=>$id]));
        $mPDF->Output();
        exit;
    }
}
