<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "perimetralmalla".
 *
 * @property int $id
 * @property string $nombre
 * @property string $niveles
 * @property double $ponderacion
 * @property int $puntuacion
 * @property int $tamaño
 *
 * @property Sistemasproteccionrayos[] $sistemasproteccionrayos
 */
class Perimetralmalla extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'perimetralmalla';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'niveles', 'ponderacion', 'puntuacion'], 'required'],
            [['ponderacion'], 'number','min'=>0.1,'max'=>1],
            [['puntuacion'], 'number','min'=>1,'max'=>10],
            [['puntuacion', 'tamaño'], 'integer'],
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
            'puntuacion' => 'Puntuación',
            'tamaño' => 'Tamaño',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSistemasproteccionrayos()
    {
        return $this->hasMany(Sistemasproteccionrayos::className(), ['perimetralMalla_id' => 'id']);
    }
    public static function combo(){
        $models = Perimetralmalla::find()->all();
        return ArrayHelper::map($models,'id','niveles');
    }
    public static function comboPon($var){
        return ArrayHelper::map(self::find()->where(['id'=>$var])->all(),'id','ponderacion');
    }
    public static function comboPun($var){
        return ArrayHelper::map(self::find()->where(['id'=>$var])->all(),'id','puntuacion');
    }
}
