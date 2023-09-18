<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "clasificarentidad".
 *
 * @property int $id
 * @property double $rangoInicial
 * @property double $rangoFinal
 * @property double $precioMN
 * @property double $precioCUC
 * @property int $cantHombre
 * @property int $cantHoras
 * @property int $tipoParametro_id
 * @property int $tipoSistemaSeguridad_id
 *
 * @property Tiposistemaseguridad $tipoSistemaSeguridad
 * @property Tipoparametro $tipoParametro
 * @property Sistemasintalados[] $sistemasintalados
 */
class Clasificarentidad extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clasificarentidad';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rangoInicial', 'rangoFinal', 'precioMN', 'precioCUC', 'cantHombre', 'cantHoras', 'tipoParametro_id', 'tipoSistemaSeguridad_id'], 'required'],
            [['rangoInicial', 'rangoFinal', 'precioMN', 'precioCUC'], 'number'],

            //['nombre','match','pattern'=>"/^[A-Z]+$/i",'message'=>'Sólo se aceptan letras'],
            [['rangoInicial', 'rangoFinal'], 'number','min'=>1,'max'=>10],
            [[ 'precioMN', 'precioCUC', 'cantHombre', 'cantHoras'], 'number','min'=>1],
            [['cantHoras'],'number','max'=>100],
            [['cantHombre'],'number','max'=>10],

            [['cantHombre', 'cantHoras', 'tipoParametro_id', 'tipoSistemaSeguridad_id'], 'integer'],
            [['tipoSistemaSeguridad_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tiposistemaseguridad::className(), 'targetAttribute' => ['tipoSistemaSeguridad_id' => 'id']],
            [['tipoParametro_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tipoparametro::className(), 'targetAttribute' => ['tipoParametro_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rangoInicial' => 'Rango Inicial',
            'rangoFinal' => 'Rango Final',
            'precioMN' => 'Precio MN',
            'precioCUC' => 'Precio Cuc',
            'cantHombre' => 'Cantidad de Hombre',
            'cantHoras' => 'Cantidad de  Horas',
            'tipoParametro_id' => 'Tipo Parámetro ',
            'tipoSistemaSeguridad_id' => 'Tipo Sistema Seguridad ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoSistemaSeguridad()
    {
        return $this->hasOne(Tiposistemaseguridad::className(), ['id' => 'tipoSistemaSeguridad_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoParametro()
    {
        return $this->hasOne(Tipoparametro::className(), ['id' => 'tipoParametro_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSistemasintalados()
    {
        return $this->hasMany(Sistemasintalados::className(), ['parametrosSistemaClasificados_id' => 'id']);
    }
    public static function comboPun($var){
        return ArrayHelper::map(self::find()->where(['cliente_idcliente'=>$var])->all(),'idclasificarEntidad','cliente_idcliente');
    }
    public static function comboVal(){
        return ArrayHelper::map(self::find()->all(),'idclasificarEntidad','calificacionTec');
    }
    public function llenarTabla($id){
        return Clasificarentidad::find()->where(['cliente_idcliente'=>$id])->all();

    }

    public function llenarTabla2($id){
        return Clasificarentidad::find()->where(['tipoSistemaSeguridad_id'=>$id])->all();

    }
    public function llenarTabla3($id){
        return Clasificarentidad::find()->where(['id'=>$id])->all();

    }
    public static function combo(){
        return ArrayHelper::map(self::find()->groupBy('rangoInicial')->all(),'id','rangoInicial');
    }

    public static function especial(){
        return ArrayHelper::map(self::find()->where(['tipoSistemaSeguridad_id'=>1])->all(),'rangoInicial','rangoInicial');
    }

}
