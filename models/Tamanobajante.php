<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "tamanobajante".
 *
 * @property int $id
 * @property string $nombre
 * @property string $niveles
 * @property double $ponderacion
 * @property int $puntacion
 * @property int $tamano
 *
 * @property Sistemasproteccionrayos[] $sistemasproteccionrayos
 */
class Tamanobajante extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tamanobajante';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'niveles', 'ponderacion', 'puntacion'], 'required'],
            [['ponderacion'], 'number','min'=>0.1,'max'=>1],
            [['puntuacion'], 'number','min'=>1,'max'=>10],
            [['puntacion', 'tamano'], 'integer'],
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
            'puntacion' => 'Puntación',
            'tamano' => 'Tamano',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSistemasproteccionrayos()
    {
        return $this->hasMany(Sistemasproteccionrayos::className(), ['tamanoBajante_id' => 'id']);
    }
    public static function combo(){
        $models = Tamanobajante::find()->all();
        return ArrayHelper::map($models,'id','niveles');
    }
    public static function comboPon($var){
        return ArrayHelper::map(self::find()->where(['id'=>$var])->all(),'id','ponderacion');
    }
    public static function comboPun($var){
        return ArrayHelper::map(self::find()->where(['id'=>$var])->all(),'id','puntacion');
    }
}
