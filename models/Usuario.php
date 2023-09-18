<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property int $idusuario
 * @property string $nombreUsuario
 * @property string $primerApellido
 * @property string $segundoApellido
 * @property string $codigoSEISA
 * @property string $contrasena
 * @property string $user
 * @property string $auth_key
 * @property string $contrasena_reset_token
 * @property string $correo
 * @property int $rol_idrol
 *
 * @property Rol $rolIdrol
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombreUsuario', 'primerApellido', 'segundoApellido', 'codigoSEISA', 'contrasena', 'user', 'rol_idrol'], 'required'],
            [['rol_idrol'], 'integer'],
            [['nombreUsuario', 'primerApellido', 'segundoApellido', 'codigoSEISA', 'contrasena', 'user', 'auth_key', 'contrasena_reset_token', 'correo'], 'string', 'max' => 45],
            [['rol_idrol'], 'exist', 'skipOnError' => true, 'targetClass' => Rol::className(), 'targetAttribute' => ['rol_idrol' => 'idrol']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idusuario' => 'Idusuario',
            'nombreUsuario' => 'Nombre Usuario',
            'primerApellido' => 'Primer Apellido',
            'segundoApellido' => 'Segundo Apellido',
            'codigoSEISA' => 'Codigo Seisa',
            'contrasena' => 'Contrasena',
            'user' => 'User',
            'auth_key' => 'Auth Key',
            'contrasena_reset_token' => 'Contrasena Reset Token',
            'correo' => 'Correo',
            'rol_idrol' => 'Rol Idrol',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRolIdrol()
    {
        return $this->hasOne(Rol::className(), ['idrol' => 'rol_idrol']);
    }
}
