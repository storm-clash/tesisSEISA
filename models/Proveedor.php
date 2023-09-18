<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proveedor".
 *
 * @property integer $idproveedor
 * @property string $nombreProveedor
 * @property string $nombreRepresentante
 * @property integer $telefono
 * @property string $correo
 * @property string $direccion
 * @property integer $cuentaBancaria
 *
 * @property EquiposHasProveedor[] $equiposHasProveedors
 * @property Equipos[] $equiposIdequipos
 */
class Proveedor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proveedor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombreProveedor', 'telefono', 'correo', 'direccion', 'cuentaBancaria'], 'required'],
            [['telefono', 'cuentaBancaria'], 'integer'],
            [['nombreProveedor', 'nombreRepresentante', 'direccion'], 'string', 'max' => 100],
            [['correo'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idproveedor' => 'Idproveedor',
            'nombreProveedor' => 'Nombre Proveedor',
            'nombreRepresentante' => 'Nombre Representante',
            'telefono' => 'Telefono',
            'correo' => 'Correo',
            'direccion' => 'Direccion',
            'cuentaBancaria' => 'Cuenta Bancaria',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquiposHasProveedors()
    {
        return $this->hasMany(EquiposHasProveedor::className(), ['proveedor_idproveedor' => 'idproveedor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquiposIdequipos()
    {
        return $this->hasMany(Equipos::className(), ['idequipos' => 'equipos_idequipos'])->viaTable('equipos_has_proveedor', ['proveedor_idproveedor' => 'idproveedor']);
    }
}
