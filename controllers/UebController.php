<?php

namespace app\controllers;

use app\models\Cliente;
use lisi4ok\auditlog\behaviors\LoggableBehavior;
use Yii;
use app\models\Ueb;
use app\models\UebSearch;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * UebController implements the CRUD actions for Ueb model.
 */
class UebController extends Controller
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
     * Lists all Ueb models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('Comercial'))
        {
            $searchModel = new UebSearch();
            $idUser=Yii::$app->user->id;
            $idProvincia= \app\models\Profile::find()->where(['user_id'=>$idUser])->one();

            $dataProvider = new ActiveDataProvider([
                'query'=>Ueb::find()->where(['provincia_id'=>$idProvincia['location']]),
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
     * Displays a single Ueb model.
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
     * Creates a new Ueb model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        if(Yii::$app->user->can('Comercial'))
        {
        $model = new Ueb();
            if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
                Yii::$app->response->format=Response::FORMAT_JSON;
                return ActiveForm::validate($model);

            }

        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            Yii::$app->session->setFlash('success', 'Esta UEB ha sido creado exitósamente');
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
     * Updates an existing Ueb model.
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
            if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())){
                Yii::$app->response->format=Response::FORMAT_JSON;
                return ActiveForm::validate($model);

            }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
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
     * Deletes an existing Ueb model.
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
     * Finds the Ueb model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ueb the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ueb::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
