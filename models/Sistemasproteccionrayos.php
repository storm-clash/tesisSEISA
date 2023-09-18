<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "sistemasproteccionrayos".
 *
 * @property int $idsistemasProteccionRayos
 * @property int $sistemasIntalados_idsistemasIntalados
 * @property int $nivelesSepresores_id
 * @property int $mastilPararayo_id
 * @property int $pararrayos_id
 * @property int $cantMediciones_id
 * @property int $perimetralMalla_id
 * @property int $tamanoBajante_id
 *
 * @property Cantmediciones $cantMediciones
 * @property Mastilpararayo $mastilPararayo
 * @property Nivelessepresores $nivelesSepresores
 * @property Pararrayos $pararrayos
 * @property Perimetralmalla $perimetralMalla
 * @property Sistemasintalados $sistemasIntaladosIdsistemasIntalados
 * @property Tamanobajante $tamanoBajante
 */
class Sistemasproteccionrayos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sistemasproteccionrayos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sistemasIntalados_idsistemasIntalados', 'nivelesSepresores_id', 'mastilPararayo_id', 'pararrayos_id', 'cantMediciones_id', 'perimetralMalla_id', 'tamanoBajante_id'], 'required'],
            [['sistemasIntalados_idsistemasIntalados', 'nivelesSepresores_id', 'mastilPararayo_id', 'pararrayos_id', 'cantMediciones_id', 'perimetralMalla_id', 'tamanoBajante_id'], 'integer'],
            [['cantMediciones_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cantmediciones::className(), 'targetAttribute' => ['cantMediciones_id' => 'id']],
            [['mastilPararayo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Mastilpararayo::className(), 'targetAttribute' => ['mastilPararayo_id' => 'id']],
            [['nivelesSepresores_id'], 'exist', 'skipOnError' => true, 'targetClass' => Nivelessepresores::className(), 'targetAttribute' => ['nivelesSepresores_id' => 'id']],
            [['pararrayos_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pararrayos::className(), 'targetAttribute' => ['pararrayos_id' => 'id']],
            [['perimetralMalla_id'], 'exist', 'skipOnError' => true, 'targetClass' => Perimetralmalla::className(), 'targetAttribute' => ['perimetralMalla_id' => 'id']],
            [['sistemasIntalados_idsistemasIntalados'], 'exist', 'skipOnError' => true, 'targetClass' => Sistemasintalados::className(), 'targetAttribute' => ['sistemasIntalados_idsistemasIntalados' => 'idsistemasIntalados']],
            [['tamanoBajante_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tamanobajante::className(), 'targetAttribute' => ['tamanoBajante_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idsistemasProteccionRayos' => 'Idsistemas Proteccion Rayos',
            'sistemasIntalados_idsistemasIntalados' => 'Sistemas Intalados Idsistemas Intalados',
            'nivelesSepresores_id' => 'Niveles Sepresores ID',
            'mastilPararayo_id' => 'Mastil Pararayo ID',
            'pararrayos_id' => 'Pararrayos ID',
            'cantMediciones_id' => 'Cant Mediciones ID',
            'perimetralMalla_id' => 'Perimetral Malla ID',
            'tamanoBajante_id' => 'Tamano Bajante ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCantMediciones()
    {
        return $this->hasOne(Cantmediciones::className(), ['id' => 'cantMediciones_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMastilPararayo()
    {
        return $this->hasOne(Mastilpararayo::className(), ['id' => 'mastilPararayo_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNivelesSepresores()
    {
        return $this->hasOne(Nivelessepresores::className(), ['id' => 'nivelesSepresores_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPararrayos()
    {
        return $this->hasOne(Pararrayos::className(), ['id' => 'pararrayos_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerimetralMalla()
    {
        return $this->hasOne(Perimetralmalla::className(), ['id' => 'perimetralMalla_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSistemasIntaladosIdsistemasIntalados()
    {
        return $this->hasOne(Sistemasintalados::className(), ['idsistemasIntalados' => 'sistemasIntalados_idsistemasIntalados']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTamanoBajante()
    {
        return $this->hasOne(Tamanobajante::className(), ['id' => 'tamanoBajante_id']);
    }
    public static function idPararrayo($var){
        return ArrayHelper::map(self::find()->where(['sistemasIntalados_idsistemasIntalados'=>$var])->all(),'sistemasIntalados_idsistemasIntalados','pararrayos_id');
    }
}
