<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "tiposistemaseguridad".
 *
 * @property int $id
 * @property string $nombre
 *
 * @property Sistemasintalados[] $sistemasintalados
 */
class Tiposistemaseguridad extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tiposistemaseguridad';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 60],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSistemasintalados()
    {
        return $this->hasMany(Sistemasintalados::className(), ['tipoSistemaSeguridad_id' => 'id']);
    }
    public static function combo(){
        return ArrayHelper::map(self::find()->orderBy('nombre')->all(),'id','nombre');
    }
    public static function comboTex($var){
        return ArrayHelper::map(self::find()->where(['id'=>$var])->all(),'id','nombre');
    }
    public function llenarTabla($id){
        return Tiposistemaseguridad::find()->where(['id'=>$id])->one();
    }
    public function llenarTabla2($id){
        return Tiposistemaseguridad::find()->where(['id'=>$id])->all();
    }

    public  function jjjjj($var){
        $pepe= Tiposistemaseguridad::find()->where(['id'=>$var])->one();
         return $pepe['nombre'];
    }


}
