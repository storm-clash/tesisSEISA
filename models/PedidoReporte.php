<?php
namespace app\models;
use Yii;
use yii\base\model;


class PedidoReporte extends model{

    public $pedido;


    public function rules()
    {
        return[
            ['pedido','match','pattern'=>"/^[0-9a-záéíóúñ]+$/i",'message'=>"Solo se aceptan letras y Numeros"],
            ['pedido', 'required'],

        ];



    }
    public function attributeLabels()
    {
        return [
            'pedido'=>"Buscar:",
        ];
    }


}