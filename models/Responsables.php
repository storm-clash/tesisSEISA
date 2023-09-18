<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "responsables".
 *
 * @property int $id
 * @property string $nombre
 * @property string $primerApe
 * @property string $segApellido
 * @property int $carnet
 * @property int $cliente_idcliente
 * @property int $cargos_id
 *
 * @property Cargos $cargos
 * @property Cliente $clienteIdcliente
 */
class Responsables extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'responsables';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'primerApe', 'segApellido', 'carnet', 'cliente_idcliente', 'cargos_id'], 'required'],
            [['carnet', 'cliente_idcliente', 'cargos_id'], 'integer'],
            [['nombre', 'primerApe', 'segApellido'], 'string', 'max' => 45],
            [['cargos_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cargos::className(), 'targetAttribute' => ['cargos_id' => 'id']],
            [['cliente_idcliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['cliente_idcliente' => 'idcliente']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'primerApe' => 'Primer Ape',
            'segApellido' => 'Seg Apellido',
            'carnet' => 'Carnet',
            'cliente_idcliente' => 'Cliente Idcliente',
            'cargos_id' => 'Cargos ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCargos()
    {
        return $this->hasOne(Cargos::className(), ['id' => 'cargos_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClienteIdcliente()
    {
        return $this->hasOne(Cliente::className(), ['idcliente' => 'cliente_idcliente']);
    }
}
