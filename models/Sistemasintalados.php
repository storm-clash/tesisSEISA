<?php

namespace app\models;

use lisi4ok\auditlog\behaviors\LoggableBehavior;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "sistemasintalados".
 *
 * @property int $idsistemasIntalados
 * @property int $cliente_idcliente
 * @property int $tipoSistemaSeguridad_id
 * @property string $local
 * @property double $clasificacion
 * @property int $clasificarentidad_id
 *
 * @property Equipos[] $equipos
 * @property Sistemaseguridadelectronica[] $sistemaseguridadelectronicas
 * @property Sistemasfijosextincion[] $sistemasfijosextincions
 * @property Clasificarentidad $clasificarentidad
 * @property Cliente $clienteIdcliente
 * @property Tiposistemaseguridad $tipoSistemaSeguridad
 * @property Sistemasproteccionrayos[] $sistemasproteccionrayos
 */
class Sistemasintalados extends \yii\db\ActiveRecord
{
    public $idaltura;
    public $idCant;
    public $idCantSis;
    public $idComp;
    public $idAmb;
    public $idObs;
    //Sistema de Proteccion Contra rayos
    public $idsupresor;
    public $idmastil;
    public $idmalla;
    public $idbajante;
    public $idpararrayo;
    public $idcantMed;
    //sistema Extintores
    public $idobsExtintor;
    public $idalturaMontaje;
    public $idcomplejidad;
    public $idambiente;
    public $idaccesorios;
    public $idsistemas;
    //

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sistemasintalados';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            //Sistema Tecnologicos
            [['idaltura', 'idCant', 'idCantSis', 'idComp', 'idAmb', 'idObs'], 'safe'],
            [['idaltura', 'idCant', 'idCantSis', 'idComp', 'idAmb', 'idObs'], 'integer'],
            //Sistemas Rayos
            [['idsupresor', 'idmastil', 'idmalla', 'idbajante', 'idpararrayo', 'idcantMed'], 'safe'],
            [['idsupresor', 'idmastil', 'idmalla', 'idbajante', 'idpararrayo', 'idcantMed'], 'integer'],
            //Sistema Extintores
            [['idobsExtintor', 'idalturaMontaje', 'idcomplejidad', 'idambiente', 'idaccesorios', 'idsistemas'], 'safe'],
            [['idobsExtintor', 'idalturaMontaje', 'idcomplejidad', 'idambiente', 'idaccesorios', 'idsistemas'], 'integer'],
            [['cliente_idcliente', 'tipoSistemaSeguridad_id', 'local', 'clasificacion','clasificarentidad_id'], 'required'],
            [['cliente_idcliente', 'tipoSistemaSeguridad_id', 'clasificarentidad_id'], 'integer'],
            [['clasificacion'], 'number'],
            [['local'], 'string', 'max' => 100],
            [['clasificarentidad_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clasificarentidad::className(), 'targetAttribute' => ['clasificarentidad_id' => 'id']],
            [['cliente_idcliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['cliente_idcliente' => 'idcliente']],
            [['tipoSistemaSeguridad_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tiposistemaseguridad::className(), 'targetAttribute' => ['tipoSistemaSeguridad_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [

            'local' => 'Local',

            'clasificarentidad_id' => 'Clasificarentidad ID',
            //
            'idsistemasIntalados' => 'Id Sistema',
            'cliente_idcliente' => 'Nombre del Cliente',
            'tipoSistemaSeguridad_id' => 'Sistema Seguridad',
            'idaltura' => 'Altura',
            'idCantSis' => 'Cantidad de Sistemas Intalados',
            'idCant' => 'Cantidad de Dispositivos',
            'idComp' => 'Composición de Equipos',
            'idAmb' => 'Comdiciones Ambientales',
            'idObs' => 'Obstrucción de Equipos',
            //Sistema Pararrayos
            'idsupresor' => 'Niveles de Supresor',
            'idmastil' => 'Tamaño del Mástil',
            'idmalla' => 'Tamaño de la Malla Perimetral',
            'idbajante' => 'Tamaño del Bajante',
            'idpararrayo' => 'Cantidad de Pararrayos',
            'idcantMed' => 'Cantidad de Mediciones',
            'idobsExtintor' => 'Obstrucción del Equipo',
            //Sistema de Extintores
           // 'idobsExtintor' => 'Obstrucción del Equipo',
            'idalturaMontaje' => 'Altura del Montaje',
            'idcomplejidad' => 'Complejidad del Equipamiento',
            'idambiente' => 'Condiciones Ambientales',
            'idaccesorios' => 'Cantidad de Accesorios',
            'idsistemas' => 'Cantidad de Sistemas',
            'ubicacion' => 'Locación del sistema dentro de la unidad',
            'clasificacion' => 'Clasificación del sistema',

        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipos()
    {
        return $this->hasMany(Equipos::className(), ['sistemasIntalados_idsistemasIntalados' => 'idsistemasIntalados']);
    }
    //Eliminar en Cascada
    public function beforeDelete()
    {



            foreach ($this->sistemaseguridadelectronicas as $sistemaseguridadelectronicas) {
                $sistemaseguridadelectronicas->delete();

            }

            foreach ($this->sistemasfijosextincions as $sistemasfijosextincions) {
                $sistemasfijosextincions->delete();
            }


            foreach ($this->sistemasproteccionrayos as $sistemasproteccionrayos) {
                $sistemasproteccionrayos->delete();
            }
        foreach ($this->equipos as $equipos) {
            $equipos->delete();
        }



        return parent::beforeDelete();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSistemaseguridadelectronicas()
    {
        return $this->hasMany(Sistemaseguridadelectronica::className(), ['sistemasIntalados_idsistemasIntalados' => 'idsistemasIntalados']);
    }



    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSistemasfijosextincions()
    {
        return $this->hasMany(Sistemasfijosextincion::className(), ['sistemasIntalados_idsistemasIntalados' => 'idsistemasIntalados']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClasificarentidad()
    {
        return $this->hasOne(Clasificarentidad::className(), ['id' => 'clasificarentidad_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClienteIdcliente()
    {
        return $this->hasOne(Cliente::className(), ['idcliente' => 'cliente_idcliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoSistemaSeguridad()
    {
        return $this->hasOne(Tiposistemaseguridad::className(), ['id' => 'tipoSistemaSeguridad_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSistemasproteccionrayos()
    {
        return $this->hasMany(Sistemasproteccionrayos::className(), ['sistemasIntalados_idsistemasIntalados' => 'idsistemasIntalados']);
    }
    public static function comboPun($var){
        return ArrayHelper::map(self::find()->where(['cliente_idcliente'=>$var])->all(),'idsistemasIntalados','cliente_idcliente');
    }
    public static function comboidCla($var){
        return Sistemasintalados::find()->where(['cliente_idcliente'=>$var])->all();
    }
    public function llenarGroupBy($id,$cla){
        return count(Sistemasintalados::find()->where(['cliente_idcliente'=>$id])->andWhere(['clasificacion'=>$cla])->all());

    }
    public static function comboidSist($var){
        return Sistemasintalados::find()->where(['idsistemasIntalados'=>$var])->one();
    }
    public static function combo(){
        return ArrayHelper::map(self::find()->all(),'idsistemasIntalados','tipoSistemaSeguridad_id.nombre');
    }
    public static function comboClienteSistema($id){
        return ArrayHelper::map(self::find()->where(['cliente_idcliente'=>$id])->all(),'idsistemasIntalados','tipoSistemaSeguridad.nombre');
    }
    public function buscarNombrexId($id){
        return Sistemasintalados::find()->where(['idsistemasIntalados'=>$id])->one();
    }
    public static function comboSistema($id){
        return ArrayHelper::map(self::find()->where(['cliente_idcliente'=>$id])->one(),'idsistemasIntalados','tipoSistemaSeguridad.nombre');
    }
    public static function comboJesus($id){
        return ArrayHelper::map(self::find()->where(['idsistemasIntalados'=>$id])->all(),'idsistemasIntalados','tipoSistemaSeguridad.nombre');
    }
    public function cantidad($id){
        $ofertas= Ofertaitems::find()->where(['ofertaComercial_id'=>$id])->all();



        return array_sum(array_column($ofertas,'precioMN'));
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
