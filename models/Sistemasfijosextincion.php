<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sistemasfijosextincion".
 *
 * @property int $idsistemasFijosExtincion
 * @property int $sistemasIntalados_idsistemasIntalados
 * @property int $obstruccionEquipo_id
 * @property int $cantidadAccesorios_id
 * @property int $cantidadSistemasFijos_id
 * @property int $alturaMontaje_id
 * @property int $complejidadSistFijos_id
 * @property int $condAmbSistFijos_id
 *
 * @property Alturamontaje $alturaMontaje
 * @property Cantidadaccesorios $cantidadAccesorios
 * @property Cantidadsistemasfijos $cantidadSistemasFijos
 * @property Complejidadsistfijos $complejidadSistFijos
 * @property Condambsistfijos $condAmbSistFijos
 * @property Obstruccionequipo $obstruccionEquipo
 * @property Sistemasintalados $sistemasIntaladosIdsistemasIntalados
 */
class Sistemasfijosextincion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sistemasfijosextincion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sistemasIntalados_idsistemasIntalados', 'obstruccionEquipo_id', 'cantidadAccesorios_id', 'cantidadSistemasFijos_id', 'alturaMontaje_id', 'complejidadSistFijos_id', 'condAmbSistFijos_id'], 'required'],
            [['sistemasIntalados_idsistemasIntalados', 'obstruccionEquipo_id', 'cantidadAccesorios_id', 'cantidadSistemasFijos_id', 'alturaMontaje_id', 'complejidadSistFijos_id', 'condAmbSistFijos_id'], 'integer'],
            [['alturaMontaje_id'], 'exist', 'skipOnError' => true, 'targetClass' => Alturamontaje::className(), 'targetAttribute' => ['alturaMontaje_id' => 'id']],
            [['cantidadAccesorios_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cantidadaccesorios::className(), 'targetAttribute' => ['cantidadAccesorios_id' => 'id']],
            [['cantidadSistemasFijos_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cantidadsistemasfijos::className(), 'targetAttribute' => ['cantidadSistemasFijos_id' => 'id']],
            [['complejidadSistFijos_id'], 'exist', 'skipOnError' => true, 'targetClass' => Complejidadsistfijos::className(), 'targetAttribute' => ['complejidadSistFijos_id' => 'id']],
            [['condAmbSistFijos_id'], 'exist', 'skipOnError' => true, 'targetClass' => Condambsistfijos::className(), 'targetAttribute' => ['condAmbSistFijos_id' => 'id']],
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
            'idsistemasFijosExtincion' => 'Idsistemas Fijos Extincion',
            'sistemasIntalados_idsistemasIntalados' => 'Sistemas Intalados Idsistemas Intalados',
            'obstruccionEquipo_id' => 'Obstruccion Equipo ID',
            'cantidadAccesorios_id' => 'Cantidad Accesorios ID',
            'cantidadSistemasFijos_id' => 'Cantidad Sistemas Fijos ID',
            'alturaMontaje_id' => 'Altura Montaje ID',
            'complejidadSistFijos_id' => 'Complejidad Sist Fijos ID',
            'condAmbSistFijos_id' => 'Cond Amb Sist Fijos ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlturaMontaje()
    {
        return $this->hasOne(Alturamontaje::className(), ['id' => 'alturaMontaje_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCantidadAccesorios()
    {
        return $this->hasOne(Cantidadaccesorios::className(), ['id' => 'cantidadAccesorios_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCantidadSistemasFijos()
    {
        return $this->hasOne(Cantidadsistemasfijos::className(), ['id' => 'cantidadSistemasFijos_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComplejidadSistFijos()
    {
        return $this->hasOne(Complejidadsistfijos::className(), ['id' => 'complejidadSistFijos_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCondAmbSistFijos()
    {
        return $this->hasOne(Condambsistfijos::className(), ['id' => 'condAmbSistFijos_id']);
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
}
