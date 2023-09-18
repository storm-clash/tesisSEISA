<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "tipoparametro".
 *
 * @property int $id
 * @property string $nombre
 *
 * @property Clasificarentidad[] $clasificarentidads
 */
class Tipoparametro extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipoparametro';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 45],
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
    public function getClasificarentidads()
    {
        return $this->hasMany(Clasificarentidad::className(), ['tipoParametro_id' => 'id']);
    }
    public static function combo(){
        return ArrayHelper::map(self::find()->orderBy('nombre')->all(),'id','nombre');
    }
}
