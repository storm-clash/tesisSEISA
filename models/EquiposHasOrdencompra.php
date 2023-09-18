<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equipos_has_ordencompra".
 *
 * @property int $equipos_idequipos
 * @property int $ordenCompra_idordenCompra
 *
 * @property Equipos $equiposIdequipos
 * @property Ordencompra $ordenCompraIdordenCompra
 */
class EquiposHasOrdencompra extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'equipos_has_ordencompra';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['equipos_idequipos', 'ordenCompra_idordenCompra'], 'required'],
            [['equipos_idequipos', 'ordenCompra_idordenCompra'], 'integer'],
            [['equipos_idequipos', 'ordenCompra_idordenCompra'], 'unique', 'targetAttribute' => ['equipos_idequipos', 'ordenCompra_idordenCompra']],
            [['equipos_idequipos'], 'exist', 'skipOnError' => true, 'targetClass' => Equipos::className(), 'targetAttribute' => ['equipos_idequipos' => 'idequipos']],
            [['ordenCompra_idordenCompra'], 'exist', 'skipOnError' => true, 'targetClass' => Ordencompra::className(), 'targetAttribute' => ['ordenCompra_idordenCompra' => 'idordenCompra']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'equipos_idequipos' => 'Equipos Idequipos',
            'ordenCompra_idordenCompra' => 'Orden Compra Idorden Compra',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquiposIdequipos()
    {
        return $this->hasOne(Equipos::className(), ['idequipos' => 'equipos_idequipos']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdenCompraIdordenCompra()
    {
        return $this->hasOne(Ordencompra::className(), ['idordenCompra' => 'ordenCompra_idordenCompra']);
    }
}
