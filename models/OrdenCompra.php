<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ordencompra".
 *
 * @property int $idordenCompra
 * @property string $fecha
 * @property int $cliente_idcliente
 *
 * @property EquiposHasOrdencompra[] $equiposHasOrdencompras
 * @property Equipos[] $equiposIdequipos
 * @property Cliente $clienteIdcliente
 */
class Ordencompra extends \yii\db\ActiveRecord
{
    public $nombre;
    public $cantidad;
    public $estado;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ordencompra';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha', 'cliente_idcliente'], 'required'],
            [['fecha','nombre','cantidad','estado'], 'safe'],
            [['cliente_idcliente'], 'integer'],
            [['cliente_idcliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['cliente_idcliente' => 'idcliente']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idordenCompra' => 'Idorden Compra',
            'fecha' => 'Fecha',
            'cliente_idcliente' => 'Cliente Idcliente',
            'nombre'=>'Nombre del Equipo',
            'cantidad'=>'Cantidad',
        ];
    }
    public function afterFind()
    {
        parent::afterFind();
        $has_orden=EquiposHasOrdencompra::find()->where(['ordenCompra_idordenCompra'=>$this->idordenCompra])->one();
        $equipos=Equipos::find()->where(['idequipos'=>$has_orden['equipos_idequipos']])->one();
        $this->nombre=$equipos['nombreEquipo'];
        $this->cantidad=$equipos['cantidad'];
        $dato=Estado::find()->where(['id'=>$equipos['estado_id']])->one();
        $this->estado=$dato['nombre'];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquiposHasOrdencompras()
    {
        return $this->hasMany(EquiposHasOrdencompra::className(), ['ordenCompra_idordenCompra' => 'idordenCompra']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquiposIdequipos()
    {
        return $this->hasMany(Equipos::className(), ['idequipos' => 'equipos_idequipos'])->viaTable('equipos_has_ordencompra', ['ordenCompra_idordenCompra' => 'idordenCompra']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClienteIdcliente()
    {
        return $this->hasOne(Cliente::className(), ['idcliente' => 'cliente_idcliente']);
    }
}
