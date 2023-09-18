<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "categoria".
 *
 * @property int $id
 * @property string $nombre
 *
 * @property Brigada[] $brigadas
 */
class Categoria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categoria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            ['nombre','match','pattern'=>"/^[A-Z]+$/i",'message'=>'Sólo se aceptan letras'],
            [['nombre'], 'string', 'min'=>4,'max' => 99],
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
    public function getBrigadas()
    {
        return $this->hasMany(Brigada::className(), ['categoria_id' => 'id']);
    }
    public static function combo(){
        return ArrayHelper::map(self::find()->orderBy('nombre')->all(),'id','nombre');
    }
}
