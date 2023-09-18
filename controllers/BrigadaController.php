<?php

namespace app\controllers;

use app\models\AuthAssignment;
use app\models\Ofertacomercial;
use app\models\Profile;
use app\models\Provincia;
use app\models\Ueb;
use Yii;
use app\models\Brigada;
use app\models\BrigadaSearch;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;
use lisi4ok\auditlog\behaviors\LoggableBehavior;

/**
 * BrigadaController implements the CRUD actions for Brigada model.
 */
class BrigadaController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['create', 'update', 'index'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
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
     * Lists all Brigada models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->can('Comercial')) {
            $searchModel = new BrigadaSearch();
            $idUser=Yii::$app->user->id;
            $idProvincia= \app\models\Profile::find()->where(['user_id'=>$idUser])->one();
            $idueb=Ueb::find()->where(['provincia_id'=>$idProvincia['location']])->all();
            foreach ($idueb as $prueba){

            $dataProvider = new ActiveDataProvider([
                'query'=>Brigada::find()->where(['ueb_id'=>$prueba['id']]),
                'pagination'=>array(
                    'pageSize'=>8,
                ),

            ]);
            }

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        } else {
            return $this->redirect(Url::to(['site/negado']));
        }
    }

    /**
     * Displays a single Brigada model.
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
     * Creates a new Brigada model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (Yii::$app->user->can('Comercial')) {
            $request = Yii::$app->request;
            $id = $request->get('id');


            $model = new Brigada();
            if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
                Yii::$app->response->format=Response::FORMAT_JSON;
                return ActiveForm::validate($model);

            }

            if ($model->load(Yii::$app->request->post())) {

                $model->ueb_id = $id;
                $model->estado = 1;
                $model->save();
                Yii::$app->session->setFlash('success', 'Esta Brigada ha sido creado exitósamente');
                return $this->redirect(['view', 'id' => $model->idbrigada]);
            }

            return $this->render('create', [
                'model' => $model,

            ]);
        } else {
            return $this->redirect(Url::to(['site/negado']));
        }
    }

    /**
     * Updates an existing Brigada model.
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

            $model->horasPlanificadas = 0;
            $model->horasTrabajadas = 0;
            $model->save();
            return $this->redirect(['view', 'id' => $model->idbrigada]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Brigada model.
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
        $ofert = new Ofertacomercial();
        $oferta = $ofert->buscarUeb($id);

        $countBrigadas = Brigada::find()
            ->where(['ueb_id' => $oferta['ueb_id']])
            ->count();

        $brigadas = Brigada::find()
            ->where(['ueb_id' => $oferta['ueb_id']])
            ->orderBy('idbrigada DESC')
            ->all();

        if ($countBrigadas > 0) {
            foreach ($brigadas as $brigada) {
                echo "<option value='" . $brigada->idbrigada . "'>" . $brigada->nombre . "</options>";
            }
        } else {
            echo "<options>-</options>";
        }
    }

    public function actionLists2($id)
    {
        $ofert = new Ofertacomercial();
        $oferta = $ofert->buscarUeb($id);

        $countBrigadas = Brigada::find()
            ->where(['ueb_id' => $oferta['ueb_id']])
            ->count();

        $brigadas = Brigada::find()
            ->where(['ueb_id' => $oferta['ueb_id']])
            ->andWhere(['estado'=>1])
            ->orderBy('idbrigada DESC')
            ->all();

        if ($countBrigadas > 0) {
            foreach ($brigadas as $brigada) {
                echo "<option value='" . $brigada->idbrigada . "'>" . $brigada->nombre . "</options>";
            }
        } else {
            echo "<options>-</options>";
        }
    }

    /**
     * Finds the Brigada model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Brigada the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Brigada::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionEstado($id)
    {

        $model = Brigada::findOne($id);
        if ($model->estado == 1) {
            $model->estado = 0;
            if ($model->validate()) {
                $model->save();
                Yii::$app->session->setFlash('danger', 'Brigada Desactivada');
            }
        } else if ($model->estado == 0) {
            $model->estado = 1;
            if ($model->validate()) {
                $model->save();
                Yii::$app->session->setFlash('success', 'Brigada Activada');
            }
        }
        return $this->redirect(['index']);
    }




}
