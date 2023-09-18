<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estados".
 *
 * @property int $idestados
 * @property string $nombre
 *
 * @property Ofertacomercial[] $ofertacomercials
 */
class Estados extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estados';
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
            'idestados' => 'Idestados',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOfertacomercials()
    {
        return $this->hasMany(Ofertacomercial::className(), ['estados_idestados' => 'idestados']);
    }
}
