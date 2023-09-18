<?php

namespace app\models;

use lisi4ok\auditlog\behaviors\LoggableBehavior;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "ueb".
 *
 * @property int $id
 * @property string $nombre
 * @property string $direccion
 * @property int $telefono
 * @property string $correo
 * @property int $provincia_id
 *
 * @property Brigada[] $brigadas
 * @property Ofertacomercial[] $ofertacomercials
 * @property Provincia $provincia
 */
class Ueb extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ueb';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'direccion', 'telefono', 'correo', 'provincia_id'], 'required'],
            [['telefono', 'provincia_id'], 'integer'],
            [['nombre'], 'string','min'=>4 ,'max' => 60],
            [['telefono'],'match','pattern'=>"/^.{8,11}$/",'message'=>'Mínimo 8 y máximo 11 dígitos'],
            [['direccion'], 'string','min'=>20, 'max' => 100],
            ['nombre','match','pattern'=>"/^[A-Z]+$/i",'message'=>'Sólo se aceptan letras'],
           // [['correo'], 'string', 'max' => 45],
            ['correo','email'],
            ['correo', 'unique','message'=>'correo debe ser único, este está siendo utilizado por otro cliente'],
            [['provincia_id'], 'exist', 'skipOnError' => true, 'targetClass' => Provincia::className(), 'targetAttribute' => ['provincia_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre de la UEB',
            'direccion' => 'Dirección',
            'telefono' => 'Teléfono',
            'correo' => 'Correo Electrónico',
            'provincia_id' => 'Provincia ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrigadas()
    {
        return $this->hasMany(Brigada::className(), ['ueb_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOfertacomercials()
    {
        return $this->hasMany(Ofertacomercial::className(), ['ueb_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvincia()
    {
        return $this->hasOne(Provincia::className(), ['id' => 'provincia_id']);
    }
    public static function combo(){
        $models = Ueb::find()->all();
        return ArrayHelper::map($models,'id','nombre');
    }
    public function uebProvincia($id){
        return Ueb::find()->where(['provincia_id'=>$id])->all();
    }
    public function Provincia($id){
        return Ueb::find()->where(['id'=>$id])->one();
    }
    public static function comboPro($id){
        $models = Ueb::find()->where(['provincia_id'=>$id])->all();
        return ArrayHelper::map($models,'id','nombre');
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
