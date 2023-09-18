<?php

namespace app\models;

use lisi4ok\auditlog\behaviors\LoggableBehavior;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "brigada".
 *
 * @property int $idbrigada
 * @property string $nombre
 * @property int $cantHombres
 * @property int $horasTrabajadas
 * @property int $horasPlanificadas
 * @property int $idJefeBrigada
 * @property int $categoria_id
 * @property int $ueb_id
 * *@property int $estado
 *
 * @property Categoria $categoria
 * @property Ueb $ueb
 * @property Ordenservicio[] $ordenservicios
 * @property Registromantenimientos[] $registromantenimientos
 */
class Brigada extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'brigada';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'cantHombres', 'horasTrabajadas', 'horasPlanificadas', 'idJefeBrigada', 'categoria_id', 'ueb_id','estado'], 'required'],
            [['cantHombres', 'horasTrabajadas', 'horasPlanificadas', 'idJefeBrigada', 'categoria_id', 'ueb_id'], 'integer'],
            [['nombre'], 'string','min'=>3 ,'max' => 60],
            [['cantHombres'], 'integer','min'=>1 ,'max' => 20],
            ['nombre', 'unique','message'=>'nombre debe ser único, este está siendo utilizado por otra Brigada'],

            //['nombre','match','pattern'=>"/^[A-Z]+$/i",'message'=>'Sólo se aceptan letras'],
            [['categoria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['categoria_id' => 'id']],
            [['ueb_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ueb::className(), 'targetAttribute' => ['ueb_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idbrigada' => 'Idbrigada',
            'nombre' => 'Nombre de la Brigada',
            'cantHombres' => 'Cantidad de Hombres',
            'horasTrabajadas' => 'Horas trabajadas',
            'horasPlanificadas' => 'Horas planificadas',
            'idJefeBrigada' => ' Jefe de brigada',
            'categoria_id' => 'Categoria ',
            'ueb_id' => 'Uebs',
            'estado'=>'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categoria::className(), ['id' => 'categoria_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUeb()
    {
        return $this->hasOne(Ueb::className(), ['id' => 'ueb_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdenservicios()
    {
        return $this->hasMany(Ordenservicio::className(), ['brigada_idbrigada' => 'idbrigada']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegistromantenimientos()
    {
        return $this->hasMany(Registromantenimientos::className(), ['brigada_idbrigada' => 'idbrigada']);
    }
    public static function combo(){
        $models = Brigada::find()->all();
        return ArrayHelper::map($models,'idbrigada','nombre');
    }
    public function brigadaUeb($id){
        return Brigada::find()->where(['ueb_id'=>$id])->all();
    }
    public static function comboXid($id){
        $models = Brigada::find()->where(['ueb_id'=>$id])->all();
        return ArrayHelper::map($models,'idbrigada','nombre');
    }
    public static function brigadaMenosHoras($hombres){
        $elegida=[];
        $brigada=Brigada::find()->where(['cantHombres'>=$hombres])->all();
        $elegida=min('horasTrabajadas',$brigada);
        return $elegida;

    }
    public function behaviors()
    {
        return [
            [ 'class'=>LoggableBehavior::className(),
                'ignoredAttributes'=>['created_at','updated_at','created_by','updated_by'],
                'ignorePrimaryKey'=>true,
                'ignorePrimaryKeyForActions'=>['insert', 'update'],
                'dateTimeFormat'=>'y-m-d H:i:s',
            ],
        ];
    }
}
