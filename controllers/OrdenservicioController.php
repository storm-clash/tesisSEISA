<?php

namespace app\controllers;

use app\models\Planificacion;
//use http\Url;
use Yii;
use app\models\Ordenservicio;
use app\models\OrdenservicioSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Mpdf\Mpdf;
use yii\helpers\Url;

/**
 * OrdenservicioController implements the CRUD actions for Ordenservicio model.
 */
class OrdenservicioController extends Controller
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
        ];
    }

    /**
     * Lists all Ordenservicio models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('JefeBrigada')) {
            $searchModel = new OrdenservicioSearch();
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
     * Displays a single Ordenservicio model.
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
     * Creates a new Ordenservicio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($date)
    {
        if(Yii::$app->user->can('Comercial'))
        {
        $model = new Ordenservicio();
        $model->fecha=$date;


        $plan=new Planificacion();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->renderAjax('create', [
            'model' => $model,
        ]);
        }else {
            return $this->redirect(Url::to(['site/negado']));
        }
    }

    /**
     * Updates an existing Ordenservicio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->can('Comercial'))
        {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            //$model->fecha=$date;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
        }else {
            return $this->redirect(Url::to(['site/negado']));
        }
    }


    /**
     * Deletes an existing Ordenservicio model.
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
     * Finds the Ordenservicio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ordenservicio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ordenservicio::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionCreatepdf()
    {

        //$url=Url::to([http://mantenimiento.seisa/index.php?r=ordenservicio%2Fcreatepdf]);
        $mPDF1= new Mpdf();
        $mPDF1->SetTitle("Reporte de Orden de Servicio");
        $mPDF1->SetWatermarkText("SEISA, Servicios de Seguridad Integral");
        //$stylesheet= file_get_contents('http://localhost/seisa/views/ordenservicio/bootstrap.min');
        //$mPDF1->WriteHTML($stylesheet,1);

        $mPDF1->showWatermarkText=true;
        $mPDF1->watermark_font='DejaVuSansCondensed';
        $mPDF1->watermarkTextAlpha=0.1;
        $mPDF1->SetDisplayMode('fullpage');
        $mPDF1->WriteHTML($this->renderPartial('ordenPdf'));
        $mPDF1->Output();
        exit;


    }
}
