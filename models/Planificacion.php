<?php

namespace app\models;

use lisi4ok\auditlog\behaviors\LoggableBehavior;
use Yii;

/**
 * This is the model class for table "planificacion".
 *
 * @property int $idplanificacion
 * @property string $fecha
 * @property int $sistemasIntalados_idsistemasIntalados
 * @property int $estado
 *
 * @property Sistemasintalados $sistemasIntaladosIdsistemasIntalados
 */
class Planificacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'planificacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fecha', 'sistemasIntalados_idsistemasIntalados', 'estado'], 'required'],
            [['fecha'], 'safe'],
            [['sistemasIntalados_idsistemasIntalados', 'estado'], 'integer'],
            [['sistemasIntalados_idsistemasIntalados'], 'exist', 'skipOnError' => true, 'targetClass' => Sistemasintalados::className(), 'targetAttribute' => ['sistemasIntalados_idsistemasIntalados' => 'idsistemasIntalados']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idplanificacion' => 'Idplanificacion',
            'fecha' => 'Fecha',
            'sistemasIntalados_idsistemasIntalados' => 'Sistemas Intalados Idsistemas Intalados',
            'estado' => 'Estado',
        ];
    }
//Cliente::comboId(Sistemasintalados::comboidSist($value['sistemasIntalados_idsistemasIntalados'])['cliente_idcliente'])
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSistemasIntaladosIdsistemasIntalados()
    {
        return $this->hasOne(Sistemasintalados::className(), ['idsistemasIntalados' => 'sistemasIntalados_idsistemasIntalados']);
    }
    public  function llenarTabla(){
        return Planificacion::find()->all();
    }
    public  function llenarAsignar($fecha){
        return Planificacion::find()->where(['fecha'=>$fecha])->all();
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
