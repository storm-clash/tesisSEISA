<?php

namespace app\models;

use lisi4ok\auditlog\behaviors\LoggableBehavior;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "cliente".
 *
 * @property int $idcliente
 * @property string $fechaAct
 * @property string $codigoREEUP
 * @property string $nombreCliente
 * @property int $telefono
 * @property string $correo
 * @property string $direccion
 * @property int $cuentaBancariaCUP
 * @property string $agenciaBanCup
 * @property string $direcAgenciaCup
 * @property int $cuentaBanCUC
 * @property string $agenciaBanCUC
 * @property string $direccionAgentBanCuc
 * @property int $estado
 * @property int $provincia_id
 * @property int $organismo_idorganismo
 *
 * @property Organismo $organismoIdorganismo
 * @property Provincia $provincia
 * @property Contrato[] $contratos
 * @property Ofertacomercial[] $ofertacomercials
 * @property Ordencompra[] $ordencompras
 * @property Ordenservicio[] $ordenservicios
 * @property Registromantenimientos[] $registromantenimientos
 * @property Responsables[] $responsables
 * @property Sistemasintalados[] $sistemasintalados
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'codigoREEUP', 'nombreCliente','estado', 'telefono', 'correo', 'direccion', 'cuentaBancariaCUP', 'agenciaBanCup', 'direcAgenciaCup', 'cuentaBanCUC', 'agenciaBanCUC', 'direccionAgentBanCuc', 'provincia_id','organismo_idorganismo'], 'required'],
            // [['fechaAct'], 'safe'],
            ['codigoREEUP', 'unique','message'=>'codigoREEUP debe ser único, este está siendo utilizado por otro cliente'],
            ['correo', 'unique','message'=>'correo debe ser único, este está siendo utilizado por otro cliente'],
            ['telefono', 'unique','message'=>'telefono debe ser único, este está siendo utilizado por otro cliente'],
            ['direccion', 'unique','message'=>'direccion debe ser único, este está siendo utilizado por otro cliente'],
            ['cuentaBancariaCUP', 'unique','message'=>'Cuenta Bancaria debe ser único, este está siendo utilizado por otro cliente'],
            ['cuentaBanCUC', 'unique','message'=>'Cuenta Bancaria debe ser único, este está siendo utilizado por otro cliente'],
            ['nombreCliente', 'unique','message'=>'El nombre del cliente debe ser único, este está siendo utilizado por otro usuario'],
            [['nombreCliente','agenciaBanCup','direcAgenciaCup','agenciaBanCUC','direccionAgentBanCuc'],'match','pattern'=>"/^.{3,50}$/",'message'=>'Mínimo 3 y máximo 50 caracteres'],
            ['direccion','match','pattern'=>"/^.{3,100}$/",'message'=>'Mínimo 3 y máximo 100 caracteres'],
            [['nombreCliente','agenciaBanCup','agenciaBanCUC'],'match','pattern'=>"/^[A-Z]+$/i",'message'=>'Sólo se aceptan letras'],
            ['correo','email'],
            //['correo','exist','targetAttribute'=>'correo'],
            [['telefono'],'match','pattern'=>"/^.{8,11}$/",'message'=>'Mínimo 8 y máximo 11 dígitos'],
            // [['codigoREEUP'],'match','pattern'=>"/^.{6,8}$/",'message'=>'Mínimo 6 y máximo 8 dígitos'],
            [['cuentaBancariaCUP','cuentaBanCUC'],'match','pattern'=>"/^.{16,16}$/",'message'=>'Debe ingresar 16 dígitos'],
            [['telefono', 'cuentaBancariaCUP', 'cuentaBanCUC', 'provincia_id'], 'integer'],
            [['codigoREEUP'], 'string', 'max' => 45],
            [['nombreCliente', 'correo', 'direccion', 'agenciaBanCup', 'direcAgenciaCup', 'agenciaBanCUC', 'direccionAgentBanCuc'], 'string', 'max' => 100],

            [['provincia_id'], 'exist', 'skipOnError' => true, 'targetClass' => Provincia::className(), 'targetAttribute' => ['provincia_id' => 'id']],
            [['organismo_idorganismo'], 'exist', 'skipOnError' => true, 'targetClass' => Organismo::className(), 'targetAttribute' => ['organismo_idorganismo' => 'idorganismo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idcliente' => 'Idcliente',
            'fechaAct' => 'Fecha actualización',
            'codigoREEUP' => 'Código REEUP',
            'nombreCliente' => 'Nombre del Cliente',
            'organismo' => 'Organismo al que Pertenece',
            'telefono' => 'Teléfono',
            'correo' => 'Correo electrónico',
            'direccion' => 'Dirección',
            'cuentaBancariaCUP' => ' Número Cuenta Bancaria en CUP',
            'agenciaBanCup' => 'Nombre de Agencia Bancaria en CUP',
            'direcAgenciaCup' => 'Dirección de Agencia Bancaria en CUP',
            'cuentaBanCUC' => 'Número Cuenta Bancaria en CUC',
            'agenciaBanCUC' => 'Nombre de Agencia Bancaria en CUC',
            'direccionAgentBanCuc' => 'Dirección de Agencia Bancaria en CUC',
            'provincia_id' => 'Provincia',
            'organismo_idorganismo' => 'Organismo al que Pertenece',
            'estado'=>'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function getClasificarentidads()
    {
        return $this->hasMany(Clasificarentidad::className(), ['cliente_idcliente' => 'idcliente']);
    }



    public function beforeDelete()
    {



        foreach ($this->ordencompras as $ordencompras) {
            $ordencompras->delete();

        }

        foreach ($this->registromantenimientos as $registromantenimientos) {
            $registromantenimientos->delete();
        }


        foreach ($this->responsables as $responsables) {
            $responsables->delete();
        }
        foreach ($this->sistemasintalados as $sistemasintalados) {
            $sistemasintalados->delete();
        }



        return parent::beforeDelete();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvincia()
    {
        return $this->hasOne(Provincia::className(), ['id' => 'provincia_id']);
    }
    public function getOrganismo()
    {
        return $this->hasOne(Organismo::className(), ['idorganismo' => 'organismo_idorganismo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdencompras()
    {
        return $this->hasMany(Ordencompra::className(), ['cliente_idcliente' => 'idcliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlanificacions()
    {
        return $this->hasMany(Planificacion::className(), ['cliente_idcliente' => 'idcliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegistromantenimientos()
    {
        return $this->hasMany(Registromantenimientos::className(), ['cliente_idcliente' => 'idcliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResponsables()
    {
        return $this->hasMany(Responsables::className(), ['cliente_idcliente' => 'idcliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSistemasintalados()
    {
        return $this->hasMany(Sistemasintalados::className(), ['cliente_idcliente' => 'idcliente']);
    }
    /* public function validarCorreo($attribute,$params){

         $correo=["ifarocks26@gmail.com"];
         foreach ($correo as $value){
             if($this->correo===$value){
                 $this->addError($attribute,'El correo seleccionado existe');
                 return true;
             }else
             {
                 return false;
             }
         }




     }*/
    public static function combo(){
        $models = Cliente::find()->all();
        return ArrayHelper::map($models,'idcliente','nombreCliente');
    }
    public function buscarNombrexId($id){
        return Cliente::find()->where(['idcliente'=>$id])->one();
    }
    public static function comboId($id){
        $models = Cliente::find()->where(['idcliente'=>$id])->all();
        return ArrayHelper::map($models,'idcliente','nombreCliente');
    }
    public function buscarProvincia($id){
        return Cliente::find()->where(['idcliente'=>$id])->one();
    }
    public function prueba($id){
        return Cliente::find()->where(['idcliente'=>$id])->one();
    }
    public static function comboPro($id){
        $models = Cliente::find()->where(['idcliente'=>$id])->all();
        return ArrayHelper::map($models,'idcliente','provincia_id');
    }
    public function duro($id){
        return Cliente::find()->where(['idcliente'=>$id])->all();
    }
    public static function comboSoloClientesSinSistemas(){
        $oferta=Ofertacomercial::find()->all();
        $model=Cliente::find()->all();
        $models=[];

        foreach ($model as $value){
            $boolean=false;
            $j=0;
            while (!$boolean && $j<count($oferta)){
                if($value['idcliente']===$oferta[$j]['cliente_idcliente']){
                    $boolean=true;

                }
                $j++;
            }
            if($boolean !=true){
                $models[] = Cliente::find()->where(['idcliente'=>$value['idcliente']])->one();
            }



        }
        return ArrayHelper::map($models,'idcliente','nombreCliente');
    }
    public static function clientesQNOrden()
    {
        $models = [];
        $orden = Ordenservicio::find()->all();
        $cliente = Cliente::find()->all();
        $contrato=Contrato::find()->all();
        foreach ($orden as $ord) {
            foreach ($contrato as $cont) {
                foreach ($cliente as $client) {
                    if ($ord['cliente_idcliente'] != $client['idcliente'] && $client['idcliente']==$cont['cliente_idcliente']) {
                        $models[] = $client;

                    }
                }
            }
        }
        return ArrayHelper::map($models, 'idcliente', 'nombreCliente');
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
