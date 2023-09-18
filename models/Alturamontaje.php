<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "alturamontaje".
 *
 * @property int $id
 * @property string $nombre
 * @property string $niveles
 * @property double $ponderacion
 * @property int $puntuacion
 * @property int $altura
 *
 * @property Sistemasfijosextincion[] $sistemasfijosextincions
 */
class Alturamontaje extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'alturamontaje';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'niveles', 'ponderacion', 'puntuacion'], 'required'],
            ['nombre','match','pattern'=>"/^[A-Z]+$/i",'message'=>'Sólo se aceptan letras'],
            [['ponderacion'], 'number','min'=>0.1,'max'=>1],
            [['puntuacion'], 'number','min'=>1,'max'=>10],
            [['puntuacion', 'altura'], 'integer'],
            [['nombre', 'niveles'], 'string', 'max' => 45],
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
            'niveles' => 'Niveles',
            'ponderacion' => 'Ponderacion',
            'puntuacion' => 'Puntuacion',
            'altura' => 'Altura',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSistemasfijosextincions()
    {
        return $this->hasMany(Sistemasfijosextincion::className(), ['alturaMontaje_id' => 'id']);
    }
    public static function combo(){
        $models = Alturamontaje::find()->all();
        return ArrayHelper::map($models,'id','niveles');
    }
    public static function comboPon($var){
        return ArrayHelper::map(self::find()->where(['id'=>$var])->all(),'id','ponderacion');
    }
    public static function comboPun($var){
        return ArrayHelper::map(self::find()->where(['id'=>$var])->all(),'id','puntuacion');
    }
}
