<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "formaspago".
 *
 * @property int $id
 * @property string $nombre
 *
 * @property Contrato[] $contratos
 */
class Formaspago extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'formaspago';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string','min'=>4 ,'max' => 60],
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
    public function getContratos()
    {
        return $this->hasMany(Contrato::className(), ['formasPago_id' => 'id']);
    }
    public static function combo(){
        $models = Formaspago::find()->orderBy('nombre')->all();
        return ArrayHelper::map($models,'id','nombre');
    }
}
