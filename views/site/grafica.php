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
