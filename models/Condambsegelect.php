<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "condambsegelect".
 *
 * @property int $id
 * @property string $nombre
 * @property string $niveles
 * @property double $ponderacion
 * @property int $valores
 *
 * @property Sistemaseguridadelectronica[] $sistemaseguridadelectronicas
 */
class Condambsegelect extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'condambsegelect';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'niveles', 'ponderacion', 'valores'], 'required'],
            [['ponderacion'], 'number','min'=>0.1,'max'=>1],
            [['puntuacion'], 'number','min'=>1,'max'=>10],
            [['valores'], 'integer'],
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
            'valores' => 'Puntuación',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSistemaseguridadelectronicas()
    {
        return $this->hasMany(Sistemaseguridadelectronica::className(), ['condambSegElect_id' => 'id']);
    }
    public static function combo(){
        $models = Condambsegelect::find()->all();
        return ArrayHelper::map($models,'id','niveles');
    }
    public static function comboPon($var){
        return ArrayHelper::map(self::find()->where(['id'=>$var])->all(),'id','ponderacion');
    }
    public static function comboPun($var){
        return ArrayHelper::map(self::find()->where(['id'=>$var])->all(),'id','valores');
    }
}
