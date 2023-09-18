<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "provincia".
 *
 * @property int $id
 * @property string $nombre
 *
 * @property Brigada[] $brigadas
 * @property Cliente[] $clientes
 */
class Provincia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'provincia';
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
    public function getBrigadas()
    {
        return $this->hasMany(Brigada::className(), ['provincia_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientes()
    {
        return $this->hasMany(Cliente::className(), ['provincia_id' => 'id']);
    }
    /*public static function combo(){
        return ArrayHelper::map(self::find()->orderBy('nombre')->all(),'id','nombre');
    }*/
    public static function combo(){
        $models = Provincia::find()->all();
        return ArrayHelper::map($models,'id','nombre');
    }
    public function provinciaXid($id){
        return Provincia::find()->andWhere(['id'=>$id])->one();
    }
}
