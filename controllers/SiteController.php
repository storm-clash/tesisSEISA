<?php
namespace app\controllers;

use app\models\Cliente;
use app\models\Planificacion;
use app\models\Sistemasintalados;
use app\models\Tiposistemaseguridad;
use app\models\User;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\LoginForm;
use app\models\PasswordResetRequestForm;
use app\models\ResetPasswordForm;
use app\models\SignupForm;
use app\models\ContactForm;
use yii\web\ForbiddenHttpException;
use yii\web\UploadedFile;
use app\controllers\UserController;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],

                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),

            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'page'=>[
                'class'=>'yii\web\ViewAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {

        if(Yii::$app->user->isGuest)
            return $this->redirect('/index.php/user/security/login');
      // $this->layout='indexlayout';
        $pp=new Planificacion();
        $planificacion1=$pp->llenarTabla();
        $planificacion=[];
        $sistema=new Sistemasintalados();
        $cliente=new Cliente();
        $nombreTipo=new Tiposistemaseguridad();



        foreach ($planificacion1 as $valor) {
            $event = new \yii2fullcalendar\models\Event();
            $event->id = $valor['idplanificacion'];
            $event->backgroundColor='#FF9800';

            $nombreS=$sistema->buscarNombrexId($valor['sistemasIntalados_idsistemasIntalados']);
            $nombreC=$cliente->prueba($nombreS['cliente_idcliente']);
            $tipoSistema=$nombreTipo->llenarTabla($nombreS['tipoSistemaSeguridad']);
            $event->title = 'Cliente   '.$nombreC['nombreCliente'].'-> '.
                ' Sistema '.$tipoSistema['nombre'];


            //$event->title = 'Mant.Prev=>'.$tipoSistema['nombre'];
            $event->start = $valor['fecha'];

            $planificacion[] = $event;
        }

        return $this->render('index',[
            'planificacion'=>$planificacion,
        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        if(Yii::$app->user->can('admin')) {

            $model = new SignupForm();
            if ($model->load(Yii::$app->request->post())) {
                if ($user = $model->signup()) {

                    return $this->redirect('/index.php?r=user%2Findex');
                }
            }

            return $this->render('signup', [
                'model' => $model,
            ]);
        }else {
            throw new ForbiddenHttpException;
        }
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    public function actionReport()
    {
        $report=new \app\reports\MyReport();
        $report->run();
        return $this->render('report',array("report"=>$report));
    }

    public function actionBrigada()
    {
        $brigada=new \app\reports\brigadaReport();
        $brigada->run();
        return $this->render('brigada',array("brigada"=>$brigada));
    }

    public function actionGrafica(){
        return $this->render("grafica");
    }
    public function actionGanancia(){
        return $this->render("ganancia");
    }
    public function actionPlan(){
        return $this->render("plan");
    }
    public function actionNegado(){
        return $this->render("negado");
    }

    public function actionInfo(){
        return $this->render("info");
    }



}
