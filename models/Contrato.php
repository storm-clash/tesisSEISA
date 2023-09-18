<?php

namespace app\models;

use lisi4ok\auditlog\behaviors\LoggableBehavior;
use Yii;

/**
 * This is the model class for table "contrato".
 *
 * @property int $id
 * @property int $cliente_idcliente
 * @property double $monto
 * @property int $dias
 * @property string $firma
 * @property string $contrato
 * @property int $formasPago_id
 * @property int $estado
 * @property string $motivo
 *
 * @property Cliente $clienteIdcliente
 * @property Formaspago $formasPago
 */
class Contrato extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contrato';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cliente_idcliente', 'monto', 'dias', 'firma', 'contrato', 'formasPago_id'], 'required'],
            [['cliente_idcliente',  'formasPago_id', 'estado'], 'integer'],
            [['file'], 'file'],
            [['dias'], 'number', 'min'=>1,'max' => 90],
            [['monto'], 'number'],
            [['firma', 'contrato', 'motivo'], 'string', 'max' => 250],
            [['cliente_idcliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['cliente_idcliente' => 'idcliente']],
            [['formasPago_id'], 'exist', 'skipOnError' => true, 'targetClass' => Formaspago::className(), 'targetAttribute' => ['formasPago_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cliente_idcliente' => 'Nombre del Cliente',
            'monto' => 'Monto del Contrato',
            'dias' => 'Días para efectuar pago por servicios ',
            'firma' => 'Firma autorizada',
            'contrato' => 'Contrato copia dura',
            'formasPago_id' => 'Formas de pago ',
            'estado' => 'Estado',
            'motivo' => 'Motivo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClienteIdcliente()
    {
        return $this->hasOne(Cliente::className(), ['idcliente' => 'cliente_idcliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFormasPago()
    {
        return $this->hasOne(Formaspago::className(), ['id' => 'formasPago_id']);
    }
    public function behaviors()
    {
        return [
            [ 'class'=>LoggableBehavior::className(),
                'ignoredAttributes'=>['created_at','updated_at','created_by','updated_by'],
                'ignorePrimaryKey'=>true,
                'ignorePrimaryKeyForActions'=>['insert', 'update'],
                'dateTimeFormat'=>'y-m-d H:i:s',
            ],
        ];
    }

}
