<?php

namespace app\models;

use lisi4ok\auditlog\behaviors\LoggableBehavior;
use Yii;

/**
 * This is the model class for table "registromantenimientos".
 *
 * @property int $idregistroMantenimientos
 * @property string $fecha
 * @property string $incidencias
 * @property int $cliente_idcliente
 * @property int $brigada_idbrigada
 * @property int $ordenServicio_id
 *
 * @property Brigada $brigadaIdbrigada
 * @property Cliente $clienteIdcliente
 * @property Ordenservicio $ordenServicio
 * @property Registrosadiosaci[] $registrosadiosacis
 */
class Registromantenimientos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'registromantenimientos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha', 'incidencias', 'cliente_idcliente', 'brigada_idbrigada', 'ordenServicio_id'], 'required'],
            [['fecha'], 'safe'],
            [['cliente_idcliente', 'brigada_idbrigada', 'ordenServicio_id'], 'integer'],
            [['incidencias'], 'string', 'max' => 500],
            [['brigada_idbrigada'], 'exist', 'skipOnError' => true, 'targetClass' => Brigada::className(), 'targetAttribute' => ['brigada_idbrigada' => 'idbrigada']],
            [['cliente_idcliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['cliente_idcliente' => 'idcliente']],
            [['ordenServicio_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ordenservicio::className(), 'targetAttribute' => ['ordenServicio_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idregistroMantenimientos' => 'Idregistro Mantenimientos',
            'fecha' => 'Fecha',
            'incidencias' => 'Incidencias',
            'cliente_idcliente' => 'Cliente Idcliente',
            'brigada_idbrigada' => 'Brigada Idbrigada',
            'ordenServicio_id' => 'Orden Servicio ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrigadaIdbrigada()
    {
        return $this->hasOne(Brigada::className(), ['idbrigada' => 'brigada_idbrigada']);
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
    public function getOrdenServicio()
    {
        return $this->hasOne(Ordenservicio::className(), ['id' => 'ordenServicio_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegistrosadiosacis()
    {
        return $this->hasMany(Registrosadiosaci::className(), ['registroMantenimientos_idregistroMantenimientos' => 'idregistroMantenimientos']);
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
