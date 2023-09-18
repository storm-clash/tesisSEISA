<?php

namespace app\controllers;

use app\models\Altura;
use app\models\Alturamontaje;
use app\models\Cantdispositivos;
use app\models\Cantidadaccesorios;
use app\models\Cantidadsistemasfijos;
use app\models\Cantmediciones;
use app\models\Cantsistemas;
use app\models\Clasificarentidad;
use app\models\Cliente;
use app\models\Compequiposelec;
use app\models\Complejidadsistfijos;
use app\models\Condambsegelect;
use app\models\Condambsistfijos;
use app\models\Contrato;
use app\models\Emails;
use app\models\Mastilpararayo;
use app\models\Nivelessepresores;
use app\models\Obstruccionequipo;
use app\models\Pararrayos;
use app\models\Perimetralmalla;
use app\models\Profile;
use app\models\Provincia;
use app\models\Tamanobajante;
use lisi4ok\auditlog\behaviors\LoggableBehavior;
use Yii;
use app\models\Sistemasintalados;
use app\models\SistemasintaladosSearch;
use yii\data\ActiveDataProvider;
use yii\debug\models\timeline\DataProvider;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\validators\Validator;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Sistemaseguridadelectronica;
use app\models\Sistemasproteccionrayos;
use app\models\Sistemasfijosextincion;
use app\models\Tiposistemaseguridad;

/**
 * SistemasintaladosController implements the CRUD actions for Sistemasintalados model.
 */
class SistemasintaladosController extends Controller
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
     * Lists all Sistemasintalados models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('Comercial'))
        {
            $searchModel = new Sistemasintalados();
            $idUser=Yii::$app->user->id;
            $idProvincia= \app\models\Profile::find()->where(['user_id'=>$idUser])->one();

            $cliente=Cliente::find()->where(['provincia_id'=>$idProvincia['location']])->all();
            //$sistema=Sistemasintalados::find()->all();



            foreach ($cliente as $clin){


                    $dataProvider = new ActiveDataProvider([
                        'query'=>Sistemasintalados::find()->where(['cliente_idcliente']==$clin['idcliente']),
                        'pagination'=>array(
                            'pageSize'=>8,
                        ),
                    ]);



            }







            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else {
            return $this->redirect(Url::to(['site/negado']));
        }
    }

    /**
     * Displays a single Sistemasintalados model.
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
     * Creates a new Sistemasintalados model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (Yii::$app->user->can('Comercial')) {
            $model = new Sistemasintalados();
            $modelTec = new Sistemaseguridadelectronica();
            $modelExt = new Sistemasfijosextincion();
            $modelRayo = new Sistemasproteccionrayos();
            $modelClasificar = new Clasificarentidad();


            if ($model->load(Yii::$app->request->post())) {
                $var = $model->tipoSistemaSeguridad_id;
                $tipoSistema = Tiposistemaseguridad::comboTex($var);


                if (reset($tipoSistema) === 'Sistema Automático de Detección de Incendios' || reset($tipoSistema) === 'Sistemas de Alarma Contra Intrusos' || reset($tipoSistema) === 'Sistema Control de Acceso' || reset($tipoSistema) === 'Circuito Cerrado de Televisión') {

                    //Sistema Tecnologicos
                    //CantidadSistemas
                    $variable1 = Cantsistemas::comboPun($model->idCantSis);
                    $variable2 = Cantsistemas::comboPon($model->idCantSis);
                    $valSist = (reset($variable1)) * (reset($variable2));
                    //Cantidad de Dispositivos
                    $variable3 = Cantdispositivos::comboPun($model->idCant);
                    $variable4 = Cantdispositivos::comboPon($model->idCant);
                    $valCant = (reset($variable3)) * (reset($variable4));
                    //Complejidad del Equipamiento
                    $variable5 = Compequiposelec::comboPun($model->idComp);
                    $variable6 = Compequiposelec::comboPon($model->idComp);
                    $valComp = (reset($variable5)) * (reset($variable6));
                    //Altura
                    $variable7 = Altura::comboPun($model->idaltura);
                    $variable8 = Altura::comboPon($model->idaltura);
                    $valAlt = (reset($variable7)) * (reset($variable8));
                    //Condiciones Ambientales
                    $variable9 = Condambsegelect::comboPun($model->idAmb);
                    $variable10 = Condambsegelect::comboPon($model->idAmb);
                    $valAmb = (reset($variable9)) * (reset($variable10));
                    //Obstruccion del Equipo
                    $variable11 = Obstruccionequipo::comboPun($model->idObs);
                    $variable12 = Obstruccionequipo::comboPon($model->idObs);
                    $valEquip = (reset($variable11)) * (reset($variable12));

                    $model->clasificacion = $valSist + $valCant + $valComp + $valAlt + $valAmb + $valEquip;
                    // $model->clasificarentidad_id=6;
                    $modelo = new Clasificarentidad();
                    $valores = $modelo->llenarTabla2($var);
                    foreach ($valores as $val) {
                        if ($val['rangoInicial'] <= $model->clasificacion && $val['rangoFinal'] >= $model->clasificacion) {
                            $model->clasificarentidad_id = $val['id'];
                        }
                    }


                    if ($model->validate()) {
                        $model->save();
                    }


                    $modelTec->sistemasIntalados_idsistemasIntalados = $model->idsistemasIntalados;
                    $modelTec->cantSistemas_id = $model->idCantSis;
                    $modelTec->cantDispositivos_id = $model->idCant;
                    $modelTec->compEquiposElec_id = $model->idComp;
                    $modelTec->altura_id = $model->idaltura;
                    $modelTec->condambSegElect_id = $model->idAmb;
                    $modelTec->obstruccionEquipo_id = $model->idObs;
                    //$modelTec->save();
                    if ($modelTec->validate()) {
                        // $model->save();

                        $modelTec->save();


                    }


                } else
                    if (reset($tipoSistema) === 'Sistemas Portátiles de Extinción' || reset($tipoSistema) === 'Sistema de Suministro de Agua Contra Incendio') {
                        //Sistema Extincion


                        //CantidadSistemas
                        $variable1 = Alturamontaje::comboPun($model->idalturaMontaje);
                        $variable2 = Alturamontaje::comboPon($model->idalturaMontaje);
                        $valSist = (reset($variable1)) * (reset($variable2));
                        //Cantidad de Dispositivos
                        $variable3 = Cantidadaccesorios::comboPun($model->idaccesorios);
                        $variable4 = Cantidadaccesorios::comboPon($model->idaccesorios);
                        $valCant = (reset($variable3)) * (reset($variable4));
                        //Complejidad del Equipamiento
                        $variable5 = Complejidadsistfijos::comboPun($model->idcomplejidad);
                        $variable6 = Complejidadsistfijos::comboPon($model->idcomplejidad);
                        $valComp = (reset($variable5)) * (reset($variable6));
                        //Altura
                        $variable7 = Cantidadsistemasfijos::comboPun($model->idsistemas);
                        $variable8 = Cantidadsistemasfijos::comboPon($model->idsistemas);
                        $valAlt = (reset($variable7)) * (reset($variable8));
                        //Condiciones Ambientales
                        $variable9 = Condambsistfijos::comboPun($model->idambiente);
                        $variable10 = Condambsistfijos::comboPon($model->idambiente);
                        $valAmb = (reset($variable9)) * (reset($variable10));
                        //Obstruccion del Equipo
                        $variable11 = Obstruccionequipo::comboPun($model->idobsExtintor);
                        $variable12 = Obstruccionequipo::comboPon($model->idobsExtintor);
                        $valEquip = (reset($variable11)) * (reset($variable12));

                        $model->clasificacion = $valSist + $valCant + $valComp + $valAlt + $valAmb + $valEquip;

                        $modelo = new Clasificarentidad();
                        $valores = $modelo->llenarTabla2($var);
                        foreach ($valores as $val) {
                            if ($val['rangoInicial'] <= $model->clasificacion && $val['rangoFinal'] >= $model->clasificacion) {
                                $model->clasificarentidad_id = $val['id'];
                            }
                        }


                        if ($model->validate()) {
                            $model->save();
                        }


                        $modelExt->sistemasIntalados_idsistemasIntalados = $model->idsistemasIntalados;
                        $modelExt->obstruccionEquipo_id = $model->idobsExtintor;
                        $modelExt->cantidadAccesorios_id = $model->idaccesorios;
                        $modelExt->cantidadSistemasFijos_id = $model->idsistemas;
                        $modelExt->alturaMontaje_id = $model->idalturaMontaje;
                        $modelExt->complejidadSistFijos_id = $model->idcomplejidad;
                        $modelExt->condAmbSistFijos_id = $model->idambiente;
                        if ($modelExt->validate()) {
                            $modelExt->save();
                        }


                        } else
                            if (reset($tipoSistema) === 'Sistema de Protección Contra Rayos') {


                                //CantidadSistemas
                                $variable1 = Tamanobajante::comboPun($model->idbajante);
                                $variable2 = Tamanobajante::comboPon($model->idbajante);
                                $valSist = (reset($variable1)) * (reset($variable2));
                                //Cantidad de Dispositivos
                                $variable3 = Mastilpararayo::comboPun($model->idmastil);
                                $variable4 = Mastilpararayo::comboPon($model->idmastil);
                                $valCant = (reset($variable3)) * (reset($variable4));
                                //Complejidad del Equipamiento
                                $variable5 = Pararrayos::comboPun($model->idpararrayo);
                                $variable6 = Pararrayos::comboPon($model->idpararrayo);
                                $valComp = (reset($variable5)) * (reset($variable6));
                                //Altura
                                $variable7 = Perimetralmalla::comboPun($model->idmalla);
                                $variable8 = Perimetralmalla::comboPon($model->idmalla);
                                $valAlt = (reset($variable7)) * (reset($variable8));
                                //Condiciones Ambientales
                                $variable9 = Cantmediciones::comboPun($model->idcantMed);
                                $variable10 = Cantmediciones::comboPon($model->idcantMed);
                                $valAmb = (reset($variable9)) * (reset($variable10));
                                //Obstruccion del Equipo
                                $variable11 = Nivelessepresores::comboPun($model->idsupresor);
                                $variable12 = Nivelessepresores::comboPon($model->idsupresor);
                                $valEquip = (reset($variable11)) * (reset($variable12));

                                $model->clasificacion = $valSist + $valCant + $valComp + $valAlt + $valAmb + $valEquip;

                                $modelo = new Clasificarentidad();
                                $valores = $modelo->llenarTabla2($var);
                                foreach ($valores as $val) {
                                    if ($val['rangoInicial'] <= $model->clasificacion && $val['rangoFinal'] >= $model->clasificacion) {
                                        $model->clasificarentidad_id = $val['id'];
                                    }
                                }


                                if ($model->validate()) {
                                    $model->save();
                                }

                                $modelRayo->sistemasIntalados_idsistemasIntalados = $model->idsistemasIntalados;
                                $modelRayo->nivelesSepresores_id = $model->idsupresor;
                                $modelRayo->mastilPararayo_id = $model->idmastil;
                                $modelRayo->pararrayos_id = $model->idpararrayo;
                                $modelRayo->cantMediciones_id = $model->idcantMed;
                                $modelRayo->perimetralMalla_id = $model->idmalla;
                                $modelRayo->tamanoBajante_id = $model->idbajante;
                                if ($modelRayo->validate()) {
                                    $modelRayo->save();


                                }


                            }


                        // $modelTec->save();
                        return $this->redirect(['view', 'id' => $model->idsistemasIntalados]);
                    }

                return $this->renderAjax('create', [
                    'model' => $model,

                ]);
        }else {
            return $this->redirect(Url::to(['site/negado']));
        }

    }

    /**
     * Updates an existing Sistemasintalados model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $contrato=Contrato::find()->all();
        foreach ($contrato as $kl)
        {
            if($model->cliente_idcliente==$kl['cliente_idcliente'])
            {

                Yii::$app->session->setFlash('danger',"Este sistema forma parte de un contrato");
                return $this->redirect(['index', 'id' => $model->idsistemasIntalados]);


            }else
                {
                    if ($model->load(Yii::$app->request->post()) && $model->save()) {
                        return $this->redirect(['view', 'id' => $model->idsistemasIntalados]);
                    }

                    return $this->render('update', [
                        'model' => $model,
                    ]);
                }
        }

    }

    /**
     * Deletes an existing Sistemasintalados model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        $contrato=Contrato::find()->all();


        foreach ($contrato as $kl)
        {
            if($model->cliente_idcliente==$kl['cliente_idcliente'])
            {

                Yii::$app->session->setFlash('danger',"Este sistema forma parte de un contrato");
                return $this->redirect(['index']);


            }else
            {

                $this->findModel($id)->delete();

                return $this->redirect(['index']);
            }
        }


    }

    /**
     * Finds the Sistemasintalados model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Sistemasintalados the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sistemasintalados::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function clasificar(){

    }
}
