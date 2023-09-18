<?php
namespace app\models;

use app\models\User;
use Yii;
use yii\base\Model;

use app\controllers\SiteController;
use yii\web\ForbiddenHttpException;
use yii\web\UploadedFile;

/**
 * Signup form
 */
class SignupForm extends Model
{

    public $nombre;
    public $primerApellido;
    public $segundoApellido;
    public $codigoSEISA;
    public $file;
    public $logo;
    public $rol;
    public $username;
    public $email;
    public $password;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['nombre', 'required'],
            ['nombre','match','pattern'=>'/[a-z]+$/','message'=>'Solo Puede Ingresar Letras'],
            ['primerApellido', 'required'],
            ['primerApellido','match','pattern'=>'/[a-z]+$/','message'=>'Solo Puede Ingresar Letras'],
            ['segundoApellido', 'required'],
            ['segundoApellido','match','pattern'=>'/[a-z]+$/','message'=>'Solo Puede Ingresar Letras'],
            ['codigoSEISA', 'required'],
            [['file'],'file'],
            ['rol', 'required'],
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['logo', 'string', 'max' => 255],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->nombre = $this->nombre;
        $user->primerApellido = $this->primerApellido;
        $user->segundoApellido = $this->segundoApellido;
        $user->codigoSEISA = $this->codigoSEISA;
        $user->rol = $this->rol;
        $user->email = $this->email;
        $user->file=$this->file;
        $user->setPassword($this->password);
        $user->generateAuthKey();


        return $user->save() ? $user : null;
    }
    public function attributeLabels()
    {
        return [
            'file'=>'foto',
        ];
    }



}
