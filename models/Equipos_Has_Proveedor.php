<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equipos_has_proveedor".
 *
 * @property integer $equipos_idequipos
 * @property integer $proveedor_idproveedor
 *
 * @property Equipos $equiposIdequipos
 * @property Proveedor $proveedorIdproveedor
 */
class Equipos_Has_Proveedor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'equipos_has_proveedor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['equipos_idequipos', 'proveedor_idproveedor'], 'required'],
            [['equipos_idequipos', 'proveedor_idproveedor'], 'integer'],
            [['equipos_idequipos'], 'exist', 'skipOnError' => true, 'targetClass' => Equipos::className(), 'targetAttribute' => ['equipos_idequipos' => 'idequipos']],
            [['proveedor_idproveedor'], 'exist', 'skipOnError' => true, 'targetClass' => Proveedor::className(), 'targetAttribute' => ['proveedor_idproveedor' => 'idproveedor']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'equipos_idequipos' => 'Equipos Idequipos',
            'proveedor_idproveedor' => 'Proveedor Idproveedor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquiposIdequipos()
    {
        return $this->hasOne(Equipos::className(), ['idequipos' => 'equipos_idequipos']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProveedorIdproveedor()
    {
        return $this->hasOne(Proveedor::className(), ['idproveedor' => 'proveedor_idproveedor']);
    }
}
