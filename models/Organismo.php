<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "organismo".
 *
 * @property int $idorganismo
 * @property string $nombre
 *
 * @property Cliente[] $clientes
 */
class Organismo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'organismo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idorganismo' => 'Idorganismo',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientes()
    {
        return $this->hasMany(Cliente::className(), ['organismo_idorganismo' => 'idorganismo']);
    }
    public static function combo(){
        $models = Organismo::find()->all();
        return ArrayHelper::map($models,'idorganismo','nombre');
    }
}
