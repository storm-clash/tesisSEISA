<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equipos".
 *
 * @property int $idequipos
 * @property string $nombreEquipo
 * @property double $precioCosto
 * @property double $precioIntalacion
 * @property double $precioMantenimiento
 * @property int $sistemasIntalados_idsistemasIntalados
 * @property int $estado_id
 * @property int $cantidad
 *
 * @property Estado $estado
 * @property Sistemasintalados $sistemasIntaladosIdsistemasIntalados
 * @property EquiposHasOrdencompra[] $equiposHasOrdencompras
 * @property Ordencompra[] $ordenCompraIdordenCompras
 * @property EquiposHasProveedor[] $equiposHasProveedors
 * @property Proveedor[] $proveedorIdproveedors
 */
class Equipos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'equipos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombreEquipo', 'precioCosto', 'precioIntalacion', 'precioMantenimiento', 'sistemasIntalados_idsistemasIntalados', 'estado_id', 'cantidad'], 'required'],
            [['precioCosto', 'precioIntalacion', 'precioMantenimiento'], 'number'],
            [['sistemasIntalados_idsistemasIntalados', 'estado_id', 'cantidad'], 'integer'],
            [['nombreEquipo'], 'string', 'max' => 50],
            [['cantidad'], 'number', 'min'=>1,'max' => 50],
            [['estado_id'], 'exist', 'skipOnError' => true, 'targetClass' => Estado::className(), 'targetAttribute' => ['estado_id' => 'id']],
            [['sistemasIntalados_idsistemasIntalados'], 'exist', 'skipOnError' => true, 'targetClass' => Sistemasintalados::className(), 'targetAttribute' => ['sistemasIntalados_idsistemasIntalados' => 'idsistemasIntalados']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idequipos' => 'Idequipos',
            'nombreEquipo' => 'Nombre Equipo',
            'precioCosto' => 'Precio Costo',
            'precioIntalacion' => 'Precio Intalacion',
            'precioMantenimiento' => 'Precio Mantenimiento',
            'sistemasIntalados_idsistemasIntalados' => 'Sistemas Intalados Idsistemas Intalados',
            'estado_id' => 'Estado ID',
            'cantidad' => 'Cantidad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstado()
    {
        return $this->hasOne(Estado::className(), ['id' => 'estado_id']);
    }
    public function getSistemasIntaladosIdsistemasIntalados()
    {
        return $this->hasOne(Sistemasintalados::className(), ['idsistemasIntalados' => 'sistemasIntalados_idsistemasIntalados']);
    }

    public function beforeDelete()
    {

        foreach ($this->equiposHasOrdencompras as $equiposHasOrdencompras) {
            $equiposHasOrdencompras->delete();

        }
        /*foreach ($this->equiposHasProveedors as $equiposHasProveedors) {
            $equiposHasProveedors->delete();

        }*/
        return parent::beforeDelete();
    }

    /**
     * @return \yii\db\ActiveQuery
     */


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquiposHasOrdencompras()
    {
        return $this->hasMany(EquiposHasOrdencompra::className(), ['equipos_idequipos' => 'idequipos']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdenCompraIdordenCompras()
    {
        return $this->hasMany(Ordencompra::className(), ['idordenCompra' => 'ordenCompra_idordenCompra'])->viaTable('equipos_has_ordencompra', ['equipos_idequipos' => 'idequipos']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquiposHasProveedors()
    {
        return $this->hasMany(EquiposHasProveedor::className(), ['equipos_idequipos' => 'idequipos']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProveedorIdproveedors()
    {
        return $this->hasMany(Proveedor::className(), ['idproveedor' => 'proveedor_idproveedor'])->viaTable('equipos_has_proveedor', ['equipos_idequipos' => 'idequipos']);
    }
}
