<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "estado".
 *
 * @property int $id
 * @property string $nombre
 *
 * @property Equipos[] $equipos
 */
class Estado extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estado';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string','min'=>4 ,'max' => 45],
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
    public function getEquipos()
    {
        return $this->hasMany(Equipos::className(), ['estado_id' => 'id']);
    }
    public static function combo(){
        $models = Estado::find()->orderBy('nombre')->all();
        return ArrayHelper::map($models,'id','nombre');
    }
    public function nombreEstado($id){
        return Estado::find()->where(['id'=>$id])->one();
    }
}
