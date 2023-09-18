<?php

namespace app\controllers;

//use http\Url;
use Da\User\Model\Profile;
use lisi4ok\auditlog\behaviors\LoggableBehavior;
use lisi4ok\auditlog\models\AuditLog;
use Mpdf\Mpdf;
use yii\helpers\Url;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Yii;
use app\models\Cliente;
use app\models\ClienteSearch;
use yii\debug\models\timeline\DataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Responsables;
use app\models\Cargos;
use kartik\mpdf\Pdf;
use yii\data\ActiveDataProvider;
use yii\widgets\ActiveForm;
use yii\web\Response;

/**
 * ClienteController implements the CRUD actions for Cliente model.
 */
class ClienteController extends Controller
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
     * Lists all Cliente models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('Comercial'))
        {
            $idUser=Yii::$app->user->id;
            $idProvincia= \app\models\Profile::find()->where(['user_id'=>$idUser])->one();
            $searchModel = new ClienteSearch();
            $dataProvider = new ActiveDataProvider([
                'query'=>Cliente::find()->where(['provincia_id'=>$idProvincia['location']]),
                'pagination'=>array(
                    'pageSize'=>8,
                ),

            ]);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }else {
            return $this->redirect(Url::to(['site/negado']));
        }
    }

    /**
     * Displays a single Cliente model.
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
     * Creates a new Cliente model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('Comercial'))
        {
        $model = new Cliente();

        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
            Yii::$app->response->format=Response::FORMAT_JSON;
            return ActiveForm::validate($model);

        }

        if ($model->load(Yii::$app->request->post())) {
            $idUser=Yii::$app->user->id;
            $idProvincia= \app\models\Profile::find()->where(['user_id'=>$idUser])->one();
            $model->fechaAct=date('y-m-d');
            $model->estado=1;
            $model->provincia_id=$idProvincia['location'];

            if($model->validate()){
            $model->save();
            Yii::$app->session->setFlash('success', 'Este Cliente ha sido creado exitósamente');
            }
            return $this->redirect(['view', 'id' => $model->idcliente]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
        }else {
            return $this->redirect(Url::to(['site/negado']));
        }
    }

    /**
     * Updates an existing Cliente model.
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idcliente]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Cliente model.
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
     * Finds the Cliente model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cliente the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cliente::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
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
        $mPDF->WriteHTML($this->renderPartial('clientePDF',['id'=>$id]));
        $mPDF->Output();
        exit;
    }
    public function actionAyuda(){


                Yii::$app->session->setFlash('info', 'Aquí se muestra Información relativa a la visual');
                return $this->render("ayudaCliente");


    }
}
