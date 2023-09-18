<?php

namespace app\models;

use lisi4ok\auditlog\behaviors\LoggableBehavior;
use Yii;

/**
 * This is the model class for table "ordenservicio".
 *
 * @property int $id
 * @property int $cliente_idcliente
 * @property int $brigada_idbrigada
 * @property string $fecha
 * @property int $estado
 * @property int $planificacion_idplanificacion
 *
 * @property Brigada $brigadaIdbrigada
 * @property Cliente $clienteIdcliente
 * @property Planificacion $planificacionIdplanificacion
 * @property Registromantenimientos[] $registromantenimientos
 */
class Ordenservicio extends \yii\db\ActiveRecord
{
    public $sistemas;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ordenservicio';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cliente_idcliente', 'brigada_idbrigada', 'planificacion_idplanificacion'], 'required'],
            [['cliente_idcliente', 'brigada_idbrigada', 'estado', 'planificacion_idplanificacion'], 'integer'],
            [['fecha','sistemas'], 'safe'],
            [['brigada_idbrigada'], 'exist', 'skipOnError' => true, 'targetClass' => Brigada::className(), 'targetAttribute' => ['brigada_idbrigada' => 'idbrigada']],
            [['cliente_idcliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['cliente_idcliente' => 'idcliente']],
            [['planificacion_idplanificacion'], 'exist', 'skipOnError' => true, 'targetClass' => Planificacion::className(), 'targetAttribute' => ['planificacion_idplanificacion' => 'idplanificacion']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cliente_idcliente' => 'Cliente',
            'brigada_idbrigada' => 'Brigada ',
            'fecha' => 'Fecha',
            'sistemas'=>'Sistemas por Cliente',
            'estado' => 'Estado',
            'planificacion_idplanificacion' => 'Planificacion ',
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
    public function getPlanificacionIdplanificacion()
    {
        return $this->hasOne(Planificacion::className(), ['idplanificacion' => 'planificacion_idplanificacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegistromantenimientos()
    {
        return $this->hasMany(Registromantenimientos::className(), ['ordenServicio_id' => 'id']);
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
