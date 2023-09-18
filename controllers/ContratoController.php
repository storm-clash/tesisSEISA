<?php

namespace app\controllers;

use app\models\Altura;
use app\models\Brigada;
use app\models\Cargos;
use app\models\Clasificarentidad;
use app\models\Cliente;
use app\models\Emails;
use app\models\Ofertaitems;
use app\models\Ordenservicio;
use app\models\Planificacion;
use app\models\Registromantenimientos;
use app\models\Sistemasintalados;
use app\models\Tiposistemaseguridad;
use app\models\Ueb;
use app\models\User;
use lisi4ok\auditlog\behaviors\LoggableBehavior;
use Yii;
use app\models\Contrato;
use app\models\ContratoSearch;
use yii\base\Model;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use Mpdf\Mpdf;

/**
 * ContratoController implements the CRUD actions for Contrato model.
 */
class ContratoController extends Controller
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
     * Lists all Contrato models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('Comercial'))
        {
        $searchModel = new ContratoSearch();
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
     * Displays a single Contrato model.
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
     * Creates a new Contrato model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('Comercial'))
        {
            $model = new Contrato();

            $cliente=new Cliente();
            $model->estado=1;
            $request=Yii::$app->request;
            $id=$request->get('id');
            $cli=$cliente->prueba($id);
            $sum=0;

            $sistema=\app\models\Sistemasintalados::find()->where(['cliente_idcliente'=>$id])->all();


            foreach ($sistema as $sis){
                $clasi= \app\models\Clasificarentidad::find()->where(['id'=>$sis['clasificarentidad_id']])->all();
                foreach ($clasi as $re){
                    $sum+= floatval($re['precioMN']);

                }



            }

            if ($model->load(Yii::$app->request->post())) {
                //get the instance of the upload file
                $imageName=$cli['nombreCliente'];
                $model->firma=UploadedFile::getInstance($model,'firma');
                $model->firma->saveAs('contratosSubidosFirmas/'.$imageName.'.'.$model->firma->extension);
                //Contrato
                $model->contrato=UploadedFile::getInstance($model,'contrato');
                $model->contrato->saveAs('contratosSubidos/'.$imageName.'.'.$model->contrato->extension);


                //save the path en la bd
                $model->firma= 'contratosSubidosFirmas/'.$imageName.'.'.$model->firma->extension;
                //Contrato
                $model->contrato= 'contratosSubidos/'.$imageName.'.'.$model->contrato->extension;
                $model->cliente_idcliente=$id;

                $model->monto=$sum;

                if($model->validate()) {
                    $model->save();
                    Yii::$app->session->setFlash('success', 'Este Contrato ha sido creado exitósamente');

                    //$oferta=new \app\models\Ofertacomercial();
                    // $ofertaComercial=$oferta->buscarNombreCliente($id);

                    $sistema= Sistemasintalados::find()->where(['cliente_idcliente'=>$id])->all();

                    foreach ($sistema as $value){
                        $plan=new Planificacion();
                        $orden=new Ordenservicio();

                        $tipo=Tiposistemaseguridad::find()->where(['id'=>$value['tipoSistemaSeguridad_id']])->one();


                        $provinciaCliente=Cliente::findOne($id);
                        $ueb=Ueb::find()->where(['provincia_id'=>$provinciaCliente['provincia_id']])->one();
                        $brigadas=Brigada::find()->where(['ueb_id'=>$ueb['id']])->all();



                        $cont= min('horasTrabajadas',$brigadas);




                        $clasificar= Clasificarentidad::find()->where(['id'=>$value['clasificarentidad_id']])->one();

                        //->andWhere($clasificar['cantHombre']<='cantHombres')

                        $brigadas2=Brigada::find()->where(['ueb_id'=>$ueb['id']])->andWhere('horasTrabajadas'==$cont)->one();
                        if($brigadas2['estado']==1){


                            $brigadaSelex = Brigada::findOne($brigadas2['idbrigada']);

                            $brigadaSelex->horasPlanificadas=$brigadaSelex->horasPlanificadas+$clasificar['cantHoras'];

                            if($brigadaSelex->validate()){
                                $brigadaSelex->save();

                            }
                        }




                        $finalAno = date('y-m-d', strtotime('last day of December'));


                        $fecha = date('y-m-d');
                        $fechaInicial = date('y-m-d', strtotime($fecha . "+15 days"));
                        $fechaRecorrer = $fechaInicial;
                        if ($fechaInicial <= $finalAno && $tipo['nombre'] === 'Sistema Automático de Detección de Incendios') {
                            //$list[] = $fechaInicial;
                            // $sisttema=Sistemasintalados::find()->where(['cliente_idcliente'=>$id])->andWhere([''])

                            $plan->fecha=$fechaInicial;
                            $plan->sistemasIntalados_idsistemasIntalados=$value['idsistemasIntalados'];
                            $plan->estado=1;
                            if($plan->validate()){
                                $plan->save();
                                $orden->cliente_idcliente=$value['cliente_idcliente'];
                                $orden->brigada_idbrigada=$brigadas2['idbrigada'];
                                $orden->fecha=$fechaInicial;
                                $orden->planificacion_idplanificacion=$plan->idplanificacion;
                                $orden->estado=1;
                                if($orden->validate()){
                                    $orden->save();
                                }
                            }



                            while (date('y-m-d', strtotime($fechaRecorrer . "+3 month")) <= $finalAno) {
                                $fechaRecorrer = date('y-m-d', strtotime($fechaRecorrer . "+3 month"));
                                $plan=new Planificacion();
                                $plan->fecha=$fechaRecorrer;
                                $plan->sistemasIntalados_idsistemasIntalados=$value['idsistemasIntalados'];
                                $plan->estado=1;
                                if($plan->validate()){
                                    $plan->save();
                                    $orden->cliente_idcliente=$value['cliente_idcliente'];
                                    $orden->brigada_idbrigada=$brigadas2['idbrigada'];
                                    $orden->fecha=$fechaRecorrer;
                                    $orden->planificacion_idplanificacion=$plan->idplanificacion;
                                    $orden->estado=1;
                                    if($orden->validate()){
                                        $orden->save();
                                    }
                                }
                            }



                        } else if ($fechaInicial <= $finalAno) {
                            // $plan=new Planificacion();
                            $plan->fecha=$fechaInicial;
                            $plan->sistemasIntalados_idsistemasIntalados=$value['idsistemasIntalados'];
                            $plan->estado=1;
                            if($plan->validate()){
                                $plan->save();
                                $orden->cliente_idcliente=$value['cliente_idcliente'];
                                $orden->brigada_idbrigada=$brigadas2['idbrigada'];
                                $orden->fecha=$fechaInicial;
                                $orden->planificacion_idplanificacion=$plan->idplanificacion;
                                $orden->estado=1;
                                if($orden->validate()){
                                    $orden->save();
                                }

                            }

                            while (date('y-m-d', strtotime($fechaRecorrer . "+6 month")) <= $finalAno) {
                                $fechaRecorrer = date('y-m-d', strtotime($fechaRecorrer . "+6 month"));
                                $plan=new Planificacion();
                                $plan->fecha=$fechaRecorrer;
                                $plan->sistemasIntalados_idsistemasIntalados=$value['idsistemasIntalados'];
                                $plan->estado=1;
                                if($plan->validate()){
                                    $plan->save();
                                    $orden->cliente_idcliente=$value['cliente_idcliente'];
                                    $orden->brigada_idbrigada=$brigadas2['idbrigada'];
                                    $orden->fecha=$fechaRecorrer;
                                    $orden->planificacion_idplanificacion=$plan->idplanificacion;
                                    $orden->estado=1;
                                    if($orden->validate()){
                                        $orden->save();
                                    }
                                }
                            }



                        }
                    }









                }
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        }else {
            return $this->redirect(Url::to(['site/negado']));
        }
    }

    /**
     * Updates an existing Contrato model.
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
        ]);
    }

    /**
     * Deletes an existing Contrato model.
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
     * Finds the Contrato model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Contrato the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Contrato::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionEstado($id){

        $model = Contrato::findOne($id);
        if($model->estado==1) {
            $model->estado = 0;
            $model->motivo='Incumplimiento en los Términos de pago';
            $cliente=Cliente::findOne($model['cliente_idcliente']);
            $ordenServ=Ordenservicio::find()->where(['cliente_idcliente'=>$model['cliente_idcliente']])->one();
            $brigada=Brigada::find()->where(['idbrigada'=>$ordenServ['brigada_idbrigada']])->one();
            $user=User::find()->where(['id'=>$brigada['idJefeBrigada']])->one();

            $value= Yii::$app->mailer->compose()
                ->setFrom(['negocios@seisa.cu'=>'SEISA'])
                ->setTo($cliente->correo)
                ->setSubject("Cancelación de Contrato")
                ->setHtmlBody("Debido a incumplimientos en el pago procedemos a cancelar los mantenimientos restantes. Gracias")
                ->send();

            $value= Yii::$app->mailer->compose()
                ->setFrom(['negocios@seisa.cu'=>'SEISA'])
                ->setTo($user->email)
                ->setSubject("Cancelación de Contrato")
                ->setHtmlBody("Debido a incumplimientos en el pago procedemos a cancelar los mantenimientos restantes del cliente Gracias")
                ->send();
            $orden=Ordenservicio::find()->where(['cliente_idcliente'=>$model['cliente_idcliente']])->all();

            foreach ($orden as $ord)
            {
                $registro=Registromantenimientos::find()->where(['ordenServicio_id'=>$ord['id']]);
                if($ord['fecha']>=date('y-m-d') )
                {
                    $estado=Ordenservicio::findOne($ord['id']);
                    $estado->estado=0;
                    if($estado->validate()){
                        $estado->save();
                    }

                }
            }
            if ($model->validate()) {
                $model->save();
                Yii::$app->session->setFlash('danger', 'Contrato Cancelado');
            }
        }else if($model->estado==0) {
            $model->estado = 1;
            $model->motivo='Pago Realizado';
            $cliente=Cliente::findOne($model['cliente_idcliente']);
            $ordenServ=Ordenservicio::find()->where(['cliente_idcliente'=>$model['cliente_idcliente']])->one();
            $brigada=Brigada::find()->where(['idbrigada'=>$ordenServ['brigada_idbrigada']])->one();
            $user=User::find()->where(['id'=>$brigada['idJefeBrigada']])->one();

            $value= Yii::$app->mailer->compose()
                ->setFrom(['negocios@seisa.cu'=>'SEISA'])
                ->setTo($cliente->correo)
                ->setSubject("Reanudación de Contrato")
                ->setHtmlBody("Debido al abono del dinero debido procedemos a reanudar los mantenimientos restantes. Gracias")
                ->send();

            $value= Yii::$app->mailer->compose()
                ->setFrom(['negocios@seisa.cu'=>'SEISA'])
                ->setTo($user->email)
                ->setSubject("Reanudación de Contrato")
                ->setHtmlBody("Debido al abono del dinero debido procedemos a reanudar los mantenimientos restantes. Gracias")
                ->send();
            $orden=Ordenservicio::find()->where(['cliente_idcliente'=>$model['cliente_idcliente']])->all();
            foreach ($orden as $ord)
            {
                $mierda=Registromantenimientos::find()->where(['ordenServicio_id'=>$ord['id']])->one();
                if($ord['fecha']>=date('y-m-d') && $mierda==null)
                {
                    $estado=Ordenservicio::findOne($ord['id']);
                    $estado->estado=1;
                    if($estado->validate()){
                        $estado->save();
                    }

                }
            }
            if ($model->validate()) {
                $model->save();
                Yii::$app->session->setFlash('success', 'Este Contrato vuelve a estar activo');
            }
        }
        return $this->redirect(['index']);

    }
      public function actionCreatepdf($id)
      {
          $mPDF=new Mpdf();
          $mPDF->SetTitle("Reporte Contratos");
          $mPDF->SetWatermarkText("SEISA");
          $mPDF->showWatermarkText=true;
          $mPDF->watermark_font='DejaVuSansCondensed';
          $mPDF->watermarkTextAlpha=0.1;
          $mPDF->SetDisplayMode('fullpage');
          $mPDF->WriteHTML($this->renderPartial('contratoPDF',['id'=>$id]));
          $mPDF->Output();
          exit;
      }

    public function actionRecontratar($id){

        $model = Contrato::findOne($id);
        $sistema=Sistemasintalados::find()->where(['cliente_idcliente'=>$model->cliente_idcliente])->all();
        foreach ($sistema as $value){
            $plan=new Planificacion();
            $orden=new Ordenservicio();

            $tipo=Tiposistemaseguridad::find()->where(['id'=>$value['tipoSistemaSeguridad_id']])->one();


            $provinciaCliente=Cliente::findOne($id);
            $ueb=Ueb::find()->where(['provincia_id'=>$provinciaCliente['provincia_id']])->one();
            $brigadas=Brigada::find()->where(['ueb_id'=>$ueb['id']])->all();



            $cont= min('horasTrabajadas',$brigadas);




            $clasificar= Clasificarentidad::find()->where(['id'=>$value['clasificarentidad_id']])->one();

            //->andWhere($clasificar['cantHombre']<='cantHombres')

            $brigadas2=Brigada::find()->where(['ueb_id'=>$ueb['id']])->andWhere(['horasTrabajadas'=>$cont])->one();
            if($brigadas2['estado']==1){


                $brigadaSelex = Brigada::findOne($brigadas2['idbrigada']);
                $brigadaSelex->horasTrabajadas=0;

                $brigadaSelex->horasPlanificadas=$clasificar['cantHoras'];

                if($brigadaSelex->validate()){
                    $brigadaSelex->save();

                }
            }




            $finalAno = date('y-m-d', strtotime('last day of December'));


            $fecha = date('y-m-d');
            $fechaInicial = date('y-m-d', strtotime($fecha . "+15 days"));
            $fechaRecorrer = $fechaInicial;
            if ($fechaInicial <= $finalAno && $tipo['nombre'] === 'Sistema Automático de Detección de Incendios') {
                //$list[] = $fechaInicial;
                // $sisttema=Sistemasintalados::find()->where(['cliente_idcliente'=>$id])->andWhere([''])

                $plan->fecha=$fechaInicial;
                $plan->sistemasIntalados_idsistemasIntalados=$value['idsistemasIntalados'];
                $plan->estado=1;
                if($plan->validate()){
                    $plan->save();
                    $orden->cliente_idcliente=$value['cliente_idcliente'];
                    $orden->brigada_idbrigada=$brigadas2['idbrigada'];
                    $orden->fecha=$fechaInicial;
                    $orden->planificacion_idplanificacion=$plan->idplanificacion;
                    $orden->estado=0;
                    if($orden->validate()){
                        $orden->save();
                    }
                }



                while (date('y-m-d', strtotime($fechaRecorrer . "+3 month")) <= $finalAno) {
                    $fechaRecorrer = date('y-m-d', strtotime($fechaRecorrer . "+3 month"));
                    $plan=new Planificacion();
                    $plan->fecha=$fechaRecorrer;
                    $plan->sistemasIntalados_idsistemasIntalados=$value['idsistemasIntalados'];
                    $plan->estado=1;
                    if($plan->validate()){
                        $plan->save();
                        $orden->cliente_idcliente=$value['cliente_idcliente'];
                        $orden->brigada_idbrigada=$brigadas2['idbrigada'];
                        $orden->fecha=$fechaRecorrer;
                        $orden->planificacion_idplanificacion=$plan->idplanificacion;
                        $orden->estado=0;
                        if($orden->validate()){
                            $orden->save();
                        }
                    }
                }



            } else if ($fechaInicial <= $finalAno) {
                // $plan=new Planificacion();
                $plan->fecha=$fechaInicial;
                $plan->sistemasIntalados_idsistemasIntalados=$value['idsistemasIntalados'];
                $plan->estado=1;
                if($plan->validate()){
                    $plan->save();
                    $orden->cliente_idcliente=$value['cliente_idcliente'];
                    $orden->brigada_idbrigada=$brigadas2['idbrigada'];
                    $orden->fecha=$fechaInicial;
                    $orden->planificacion_idplanificacion=$plan->idplanificacion;
                    $orden->estado=0;
                    if($orden->validate()){
                        $orden->save();
                    }

                }

                while (date('y-m-d', strtotime($fechaRecorrer . "+6 month")) <= $finalAno) {
                    $fechaRecorrer = date('y-m-d', strtotime($fechaRecorrer . "+6 month"));
                    $plan=new Planificacion();
                    $plan->fecha=$fechaRecorrer;
                    $plan->sistemasIntalados_idsistemasIntalados=$value['idsistemasIntalados'];
                    $plan->estado=1;
                    if($plan->validate()){
                        $plan->save();
                        $orden->cliente_idcliente=$value['cliente_idcliente'];
                        $orden->brigada_idbrigada=$brigadas2['idbrigada'];
                        $orden->fecha=$fechaRecorrer;
                        $orden->planificacion_idplanificacion=$plan->idplanificacion;
                        $orden->estado=0;
                        if($orden->validate()){
                            $orden->save();
                        }
                    }
                }



            }
        }

        return $this->redirect(['index']);

    }

}
