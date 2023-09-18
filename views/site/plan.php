<?php
use miloschuman\highcharts\Highcharts;
use miloschuman\highcharts\SeriesDataHelper;
use yii\web\JsExpression;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

$mes1=0;
$mes2=0;
$mes3=0;
$mes4=0;
$mes5=0;
$mes6=0;
$mes7=0;
$mes8=0;
$mes9=0;
$mes10=0;
$mes11=0;
$mes12=0;


$dato=\app\models\Planificacion::find()->all();

foreach ($dato as $plan)
{


    if(date('m',strtotime($plan['fecha']))==1)
    {
       $mes1++;
    }else
        if(date('m',strtotime($plan['fecha']))==2)
        {
            $mes2++;
        }
        else
            if(date('m',strtotime($plan['fecha']))==3)
            {
                $mes3++;
            }
            else
                if(date('m',strtotime($plan['fecha']))==4)
                {
                    $mes4++;
                }
                else
                    if(date('m',strtotime($plan['fecha']))==5)
                    {
                        $mes5++;
                    }
                    else
                        if(date('m',strtotime($plan['fecha']))==6)
                        {
                            $mes6++;
                        }
                        else
                            if(date('m',strtotime($plan['fecha']))==7)
                            {
                                $mes7++;
                            }
                            else
                                if(date('m',strtotime($plan['fecha']))==8)
                                {
                                    $mes8++;
                                }
                                else
                                    if(date('m',strtotime($plan['fecha']))==9)
                                    {
                                        $mes9++;
                                    }
                                    else
                                        if(date('m',strtotime($plan['fecha']))==10)
                                        {
                                            $mes10++;
                                        }
                                        else
                                            if(date('m',strtotime($plan['fecha']))==11)
                                            {
                                                $mes11++;
                                            }
                                            else
                                                if(date('m',strtotime($plan['fecha']))==12)
                                                {
                                                    $mes12++;
                                                }

}

?>

<div class="container">
    <div class="row">
        <div class="col-md-12 ">
            <?php
            echo Highcharts::widget([
                'scripts' => [
                    'modules/exporting',
                    'themes/grid-light',

                ],
                'options'=>[
                    'title'=>['text'=>'Volumen De Planificación'],
                    'subtitle'=>['text'=>'anual'],
                    'yAxis'=>[
                        'title'=>['text'=>'Planificaciones']
                    ],
                    'xAxis'=>[
                        'categories'=>['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre']
                    ],
                    'legend'=>[
                        'layout'=>'vertical','aling'=>'right','verticalAlign'=>'middle'
                    ],
                    'series'=>[
                        ['name'=>'Sistemas de Seguridad','data'=>[$mes1,$mes2,$mes3,$mes4,$mes5,$mes6,$mes7,$mes8,$mes9,$mes10,$mes11,$mes12]],
                        ['name'=>'Soporte Tecnico','data'=>[2,3,4,5,6,7,8]],

                    ]
                ],


            ]);
            ?>

        </div>

    </div>
</div>