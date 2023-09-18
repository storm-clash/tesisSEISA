<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "ofertaitems".
 *
 * @property int $id
 * @property string $descripcion
 * @property string $clasificacion
 * @property int $cantXano
 * @property double $precioMN
 * @property double $precioCUC
 * @property int $ofertaComercial_id
 *
 * @property Ofertacomercial $ofertaComercial
 */
class Ofertaitems extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ofertaitems';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'cantXano'], 'safe'],
            [['descripcion', 'clasificacion','cantXano', 'ofertaComercial_id'], 'integer'],
            [['precioMN', 'precioCUC','clasificacion'], 'number'],
            [['descripcion'], 'string', 'max' => 250],
            //[['clasificacion'], 'string', 'max' => 45],
            [['ofertaComercial_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ofertacomercial::className(), 'targetAttribute' => ['ofertaComercial_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descripcion' => 'Descripción',
            'clasificacion' => 'Clasificación',
            'cantXano' => 'Cantidad por Año',
            'precioMN' => 'Precio MN',
            'precioCUC' => 'Precio CUC',
            'ofertaComercial_id' => 'Oferta Comercial ID',
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOfertaComercial()
    {
        return $this->hasOne(Ofertacomercial::className(), ['id' => 'ofertaComercial_id']);
    }
    public function Monto($id){
        $ofertas= Ofertaitems::find()->where(['ofertaComercial_id'=>$id])->all();
          $monto=0;
          foreach ($ofertas as $value) {

              $monto+=$value['cantXano']*$value['precioMN'];


          }
        return $monto;
    }
    public static function comboPun($var){
        return ArrayHelper::map(self::find()->where(['ofertaComercial_id'=>$var])->all(),'id','descripcion');
    }
}
