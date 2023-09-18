<?php
use miloschuman\highcharts\Highcharts;
use miloschuman\highcharts\SeriesDataHelper;
use yii\web\JsExpression;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Sistemasintalados;


$tipo1=0;
$tipo2=0;
$tipo3=0;
$tipo4=0;
$tipo5=0;
$tipo6=0;
$tipo7=0;



$contrato=\app\models\Contrato::find()->all();
foreach ($contrato as $cont){
    $sistema=Sistemasintalados::find()->where(['cliente_idcliente'=>$cont['cliente_idcliente']])->all();
    foreach ($sistema as $sist){
        if($sist['tipoSistemaSeguridad_id']==1)
        {
            $tipo1++;
        }else if($sist['tipoSistemaSeguridad_id']==2)
        {
            $tipo2++;
        }else if($sist['tipoSistemaSeguridad_id']==3)
        {
            $tipo3++;
        }else if($sist['tipoSistemaSeguridad_id']==4)
        {
            $tipo4++;
        }else if($sist['tipoSistemaSeguridad_id']==5)
        {
            $tipo5++;
        }else if($sist['tipoSistemaSeguridad_id']==6)
        {
            $tipo6++;
        }else if($sist['tipoSistemaSeguridad_id']==7)
        {
            $tipo7++;
        }

    }
}
$data=[
    ['Sistema Automático de Detección de Incendios',$tipo1],
    ['Sistemas de Alarma Contra Intrusos',$tipo2],
    ['Sistema de Protección Contra Rayos',$tipo3],
    ['Sistema de Suministro de Agua Contra Incendio',$tipo4],
    ['Sistemas Portátiles de Extinción',$tipo5],
    ['Sistema Control de Acceso',$tipo6],
    ['Circuito Cerrado de Televisión',$tipo7],
];

//$dataProvider=new \yii\data\ArrayDataProvider(['allModels'=>$data]);


?>
<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <?php
            echo Highcharts::widget([
                'scripts' => [
                    'modules/exporting',
                    'themes/grid-light',
                    'highcharts-pie',
                ],
                'options'=>[
                    'credits'=>['enabled'=>false],
                    'chart'=>['type'=>'pie'],
                    'plotOptions'=>[
                        'pie'=>[
                            'allowPointSelect'=>true,
                            'cursor'=>'pointer',
                            'innerSize'=>100,
                            'depth'=>45,
                            'showInLegend'=>true,
                        ]
                    ],
                    'title'=>['text'=>'Cantidad de Sistemas Contratados'],
                    'series'=>[[
                        'type'=>'pie',
                        'name'=>'Sistemas',
                        'data'=>$data,
                    ]],
                ]

            ]);
            ?>

        </div>

    </div>
</div>
