<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "sistemaseguridadelectronica".
 *
 * @property int $idsistemaSeguridadElectronica
 * @property int $sistemasIntalados_idsistemasIntalados
 * @property int $cantSistemas_id
 * @property int $cantDispositivos_id
 * @property int $compEquiposElec_id
 * @property int $altura_id
 * @property int $condambSegElect_id
 * @property int $obstruccionEquipo_id
 *
 * @property Altura $altura
 * @property Cantdispositivos $cantDispositivos
 * @property Cantsistemas $cantSistemas
 * @property Compequiposelec $compEquiposElec
 * @property Condambsegelect $condambSegElect
 * @property Obstruccionequipo $obstruccionEquipo
 * @property Sistemasintalados $sistemasIntaladosIdsistemasIntalados
 */
class Sistemaseguridadelectronica extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sistemaseguridadelectronica';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sistemasIntalados_idsistemasIntalados', 'cantSistemas_id', 'cantDispositivos_id', 'compEquiposElec_id', 'altura_id', 'condambSegElect_id', 'obstruccionEquipo_id'], 'required'],
            [['sistemasIntalados_idsistemasIntalados', 'cantSistemas_id', 'cantDispositivos_id', 'compEquiposElec_id', 'altura_id', 'condambSegElect_id', 'obstruccionEquipo_id'], 'integer'],
            [['altura_id'], 'exist', 'skipOnError' => true, 'targetClass' => Altura::className(), 'targetAttribute' => ['altura_id' => 'id']],
            [['cantDispositivos_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cantdispositivos::className(), 'targetAttribute' => ['cantDispositivos_id' => 'id']],
            [['cantSistemas_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cantsistemas::className(), 'targetAttribute' => ['cantSistemas_id' => 'id']],
            [['compEquiposElec_id'], 'exist', 'skipOnError' => true, 'targetClass' => Compequiposelec::className(), 'targetAttribute' => ['compEquiposElec_id' => 'id']],
            [['condambSegElect_id'], 'exist', 'skipOnError' => true, 'targetClass' => Condambsegelect::className(), 'targetAttribute' => ['condambSegElect_id' => 'id']],
            [['obstruccionEquipo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Obstruccionequipo::className(), 'targetAttribute' => ['obstruccionEquipo_id' => 'id']],
            [['sistemasIntalados_idsistemasIntalados'], 'exist', 'skipOnError' => true, 'targetClass' => Sistemasintalados::className(), 'targetAttribute' => ['sistemasIntalados_idsistemasIntalados' => 'idsistemasIntalados']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idsistemaSeguridadElectronica' => 'Idsistema Seguridad Electronica',
            'sistemasIntalados_idsistemasIntalados' => 'Sistemas Intalados Idsistemas Intalados',
            'cantSistemas_id' => 'Cant Sistemas ID',
            'cantDispositivos_id' => 'Cant Dispositivos ID',
            'compEquiposElec_id' => 'Comp Equipos Elec ID',
            'altura_id' => 'Altura ID',
            'condambSegElect_id' => 'Condamb Seg Elect ID',
            'obstruccionEquipo_id' => 'Obstruccion Equipo ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAltura()
    {
        return $this->hasOne(Altura::className(), ['id' => 'altura_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCantDispositivos()
    {
        return $this->hasOne(Cantdispositivos::className(), ['id' => 'cantDispositivos_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCantSistemas()
    {
        return $this->hasOne(Cantsistemas::className(), ['id' => 'cantSistemas_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompEquiposElec()
    {
        return $this->hasOne(Compequiposelec::className(), ['id' => 'compEquiposElec_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCondambSegElect()
    {
        return $this->hasOne(Condambsegelect::className(), ['id' => 'condambSegElect_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObstruccionEquipo()
    {
        return $this->hasOne(Obstruccionequipo::className(), ['id' => 'obstruccionEquipo_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSistemasIntaladosIdsistemasIntalados()
    {
        return $this->hasOne(Sistemasintalados::className(), ['idsistemasIntalados' => 'sistemasIntalados_idsistemasIntalados']);
    }
    public function validate($attributeNames = null, $clearErrors = true)
    {
        return parent::validate($attributeNames, $clearErrors); // TODO: Change the autogenerated stub
    }
    public static function comboVal($var){
        return ArrayHelper::map(self::find()->where(['id'=>$var])->all(),'id','niveles');
    }


}

