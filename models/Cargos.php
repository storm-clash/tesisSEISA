<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "cargos".
 *
 * @property int $id
 * @property string $cargo
 *
 * @property Responsables[] $responsables
 */
class Cargos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cargos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cargo'], 'required'],
            ['cargo','match','pattern'=>"/^[A-Z]+$/i",'message'=>'Sólo se aceptan letras'],
            [['cargo'], 'string','min'=>4, 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cargo' => 'Cargo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResponsables()
    {
        return $this->hasMany(Responsables::className(), ['cargos_id' => 'id']);
    }
    public static function combo(){
        $models = Cargos::find()->all();
        return ArrayHelper::map($models,'id','cargo');
    }
    public static function comboPro($id){
        $models = Cargos::find()->where(['id'=>$id])->one();
        return ArrayHelper::map($models,'id','nombre');
    }
}
