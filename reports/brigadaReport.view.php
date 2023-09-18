<?php
use \koolreport\widgets\koolphp\Table;
use \koolreport\widgets\koolphp\Card;
use \koolreport\widgets\google\ColumnChart;
?>

<html>
<head>
    <div class="report-content">
        <div class="text-center">
            <title>Reportes de Brigadas</title>
        </div>
    </div>
</head>
<body>


<?php
Card::create(array(
    "title"=>"Horas Trabajadas",
    "value"=>$this->src("default")->query("select sum(horasTrabajadas) FROM brigada
                "),
    "cssClass"=>array(
        "card"=>"bg-info",
    )
));
?>

<?php
Card::create(array(
    "title"=>"Horas Restantes Planificadas",
    "value"=>$this->src("default")->query("select sum(horasPlanificadas) FROM brigada
                "),
    "cssClass"=>array(
        "card"=>"bg-info",
    )
));
?>



<?php
Card::create(array(
    "title"=>"Ganancia por Concepto de Mantenimiento en MN",
    "value"=>$this->src("default")->query("select max(monto) from contrato"),
    "cssClass"=>array(
        "card"=>"bg-success",
    )
));
?>

<?php

use miloschuman\highcharts\Highcharts;
use miloschuman\highcharts\SeriesDataHelper;
use yii\web\JsExpression;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;



$data=\app\models\Brigada::find()->all();

$dataProvider=new \yii\data\ArrayDataProvider(['allModels'=>$data]);


?>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12 strategy_bar">
            <?php
            echo Highcharts::widget([
                'scripts' => [
                    'modules/exporting',
                    'themes/grid-light',
                ],
                'options'=>[
                    'title'=>['text'=>'Cantidad de Hombres por Brigada'],
                    'yAxis'=>[
                        [
                            'title'=>[
                                'text'=>'Hombres',
                                'categories'=>new SeriesDataHelper($dataProvider,['nombre']),
                            ]
                        ],
                    ],
                    'labels' => [
                        'items' => [
                            [
                                'html' => 'Total de Hombres',
                                'style' => [
                                    'left' => '50px',
                                    'top' => '18px',
                                    'color' => new JsExpression('(Highcharts.theme && Highcharts.theme.textColor) || "black"'),
                                ],
                            ],
                        ],
                    ],
                    'series'=>[
                        [
                            'type'=>'column',
                            'name'=>new SeriesDataHelper($dataProvider,['nombre']),
                            'data'=>new SeriesDataHelper($dataProvider,['cantHombres:int'])
                        ],
                    ]
                ]
            ]);
            ?>

        </div>

    </div>
</div>


<h5 class="text-center"> Relación de Contratos de SEISA</h5>
<?php
Table::create(array(
    "dataSource"=>$this->dataStore("brigada"),

    "cssClass"=>array(
        "table"=>"table-bordered table-striped table-hover",
    ),
    "class"=>array("table"=>"table table-hoover")));

?>
</body>
</html>


