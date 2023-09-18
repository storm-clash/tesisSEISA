<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "cantdispositivos".
 *
 * @property int $id
 * @property string $nombre
 * @property string $niveles
 * @property double $ponderacion
 * @property int $puntacion
 *
 * @property Sistemaseguridadelectronica[] $sistemaseguridadelectronicas
 */
class Cantdispositivos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cantdispositivos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'niveles', 'ponderacion', 'puntacion'], 'required'],
            ['nombre','match','pattern'=>"/^[A-Z]+$/i",'message'=>'Sólo se aceptan letras'],
            [['ponderacion'], 'number','min'=>0.1,'max'=>1],
            [['puntacion'], 'number','min'=>1,'max'=>10],
           // [['ponderacion'], 'number'],
            [['puntacion'], 'integer'],
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
            'ponderacion' => 'Ponderación',
            'puntacion' => 'Puntuación',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSistemaseguridadelectronicas()
    {
        return $this->hasMany(Sistemaseguridadelectronica::className(), ['cantDispositivos_id' => 'id']);
    }
    public static function combo(){
        $models = Cantdispositivos::find()->all();
        return ArrayHelper::map($models,'id','niveles');
    }
    public static function comboPon($var){
        return ArrayHelper::map(self::find()->where(['id'=>$var])->all(),'id','ponderacion');
    }
    public static function comboPun($var){
        return ArrayHelper::map(self::find()->where(['id'=>$var])->all(),'id','puntacion');
    }
}
