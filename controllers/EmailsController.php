<?php

namespace app\controllers;

use Yii;
use app\models\Emails;
use app\models\EmailsSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\User;


/**
 * EmailsController implements the CRUD actions for Emails model.
 */
class EmailsController extends Controller
{
    public $dataProvider;
    /**
     * @inheritdoc
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
     * Lists all Emails models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new Emails();



              $dataProvider = new ActiveDataProvider([
                  'query'=>Emails::find()->where(['id'=>Yii::$app->user->identity->getId()])
              ]);




        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Emails model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Emails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Emails();

        if ($model->load(Yii::$app->request->post())) {
            //subir el adjunto
            $model->attachment=UploadedFile::getInstance($model,'attachment');
            if($model->attachment){
                $time=time();
                $model->attachment->saveAs('attachments/' .$time. '.'.$model->attachment->extension);
                $model->attachment='attachments/'.$time. '.'. $model->attachment->extension;
            }
            if($model->attachment){
                $value=Yii::$app->mailer->compose()
                    ->setFrom(['ifarocks26@gmail.com'=>'storm'])
                    ->setTo($model->receiver_email)
                    ->setSubject($model->subject)
                    ->setHtmlBody($model->content)
                    ->attach($model->attachment)
                    ->send();
            }else{
                $value= Yii::$app->mailer->compose()
                    ->setFrom(['ifarocks26@gmail.com'=>'storm'])
                    ->setTo($model->receiver_email)
                    ->setSubject($model->subject)
                    ->setHtmlBody($model->content)
                    ->send();

            }
            $model->id=Yii::$app->user->identity->id;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id_email]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Emails model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_email]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Emails model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Emails model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Emails the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Emails::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
