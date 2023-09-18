<?php

namespace app\models;

use lisi4ok\auditlog\behaviors\LoggableBehavior;
use Yii;

/**
 * This is the model class for table "ofertacomercial".
 *
 * @property int $id
 * @property int $cliente_idcliente
 * @property int $ueb_id
 * @property int $numeroDoc
 * @property string $fecha
 * @property string $fechaVencimiento
 * @property int $elaborado
 * @property string $cargo
 * @property int $estados_idestados
 *
 * @property Cliente $clienteIdcliente
 * @property Estados $estadosIdestados
 * @property Ueb $ueb
 * @property Ofertaitems[] $ofertaitems
 */
class Ofertacomercial extends \yii\db\ActiveRecord
{
    public $monto;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ofertacomercial';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cliente_idcliente', 'ueb_id', 'numeroDoc', 'fecha', 'fechaVencimiento', 'elaborado', 'cargo', 'estados_idestados'], 'required'],
            [['cliente_idcliente', 'ueb_id', 'numeroDoc', 'elaborado', 'estados_idestados'], 'integer'],
            [['fecha', 'fechaVencimiento','monto'], 'safe'],
            ['numeroDoc', 'unique','message'=>'numeroDoc debe ser único, este está siendo utilizado en otro contrato'],
            [['cargo'], 'string', 'max' => 45],
            ['fechaVencimiento', 'compare', 'compareValue' => date('y-m-d'),'operator'=>'>=','message'=>'fecha de Vencimiento debe ser mayor que la actual'],
            [['cliente_idcliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['cliente_idcliente' => 'idcliente']],
            [['estados_idestados'], 'exist', 'skipOnError' => true, 'targetClass' => Estados::className(), 'targetAttribute' => ['estados_idestados' => 'idestados']],
            [['ueb_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ueb::className(), 'targetAttribute' => ['ueb_id' => 'id']],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cliente_idcliente' => 'Cliente Idcliente',
            'ueb_id' => 'Nombre de la UEB',
            'numeroDoc' => 'Número del Documento',
            'fecha' => 'Fecha',
            'fechaVencimiento' => 'Fecha de Vencimiento',
            'elaborado' => 'Elaborado',
            'cargo' => 'Cargo',
            'estados_idestados' => 'Estados Idestados',
            'monto'=>'Monto',
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
    public function getEstadosIdestados()
    {
        return $this->hasOne(Estados::className(), ['idestados' => 'estados_idestados']);
    }

    public function validarFecha(){
        if($this->fecha<=date('y-m-d')){
            $this->addError('fecha','Fecha debe ser mayor al día actual.');

        }
    }
    public function beforeDelete()
    {



        foreach ($this->ofertaitems as $ofertaitems) {
            $ofertaitems->delete();

        }




        return parent::beforeDelete();
    }
    public function afterFind()
    {
        parent::afterFind();
       $this->monto='Monto de la oferta';
    }



    /**
     * @return \yii\db\ActiveQuery
     */


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUeb()
    {
        return $this->hasOne(Ueb::className(), ['id' => 'ueb_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOfertaitems()
    {
        return $this->hasMany(Ofertaitems::className(), ['ofertaComercial_id' => 'id']);
    }
    public function buscarNombrexId($id){
        return Ofertacomercial::find()->where(['cliente_idcliente'=>$id])->one();
    }
    public function buscarNombreCliente($id){
        return Ofertacomercial::find()->where(['cliente_idcliente'=>$id])->one();
    }
    public function buscarUeb($id){
        return Ofertacomercial::find()->where(['cliente_idcliente'=>$id])->one();
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
