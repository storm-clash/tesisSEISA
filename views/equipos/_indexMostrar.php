<?php

use app\models\SistemasintaladosSearch;
use kartik\export\ExportMenu;
use yii\bootstrap\Modal;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SistemasintaladosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Equipos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>


        <?= GridView::widget([

            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                // 'idequipos',
                //'nombreEquipo',
                [
                    'attribute'=>'nombreEquipo',
                    'label'=>'Nombre del Equipo',
                    'headerOptions'=>['style'=>'text-align:center'],
                    'contentOptions'=>['style'=>'text-align:center']
                ],
                // 'precioCosto',
                [
                    'attribute'=>'precioCosto',
                    'label'=>'Precio de Costo',
                    'headerOptions'=>['style'=>'text-align:center'],
                    'contentOptions'=>['style'=>'text-align:center']
                ],
                //'precioIntalacion',
                [
                    'attribute'=>'precioIntalacion',
                    'label'=>'Precio de Instalación',
                    'headerOptions'=>['style'=>'text-align:center'],
                    'contentOptions'=>['style'=>'text-align:center']
                ],
                //'precioMantenimiento',
                [
                    'attribute'=>'precioMantenimiento',
                    'label'=>'Precio de Mantenimiento',
                    'headerOptions'=>['style'=>'text-align:center'],
                    'contentOptions'=>['style'=>'text-align:center']
                ],

                //'estado.nombre',
                [
                    'attribute'=> 'estado.nombre',
                    'label'=>'Estado Técnico',
                    'headerOptions'=>[
                        'style'=>[
                            'color'=>'#9c27b0',
                            'text-align'=>'center',
                        ]
                    ],
                    'contentOptions'=>['style'=>'text-align:center']
                ],

                ['class' => 'yii\grid\ActionColumn',
                    'header'=>'Acciones',
                    'contentOptions'=>['style'=>'text-align:center'],
                    'headerOptions'=>['style'=>'color:#9c27b0'],
                    'template'=>'{view}{update}{delete}',
                    'buttons'=>[
                        'view'=>function ($url,$model){
                            return Html::a('<span class="fas fa-eye"><span',$url,[
                                'title'=>Yii::t('app','ver'),
                            ]);
                        },
                        'update'=>function ($url,$model){
                            return Html::a('<span class="fas fa-pencil-alt"><span',$url,[
                                'title'=>Yii::t('app','editar'),
                            ]);
                        },
                        'delete'=>function ($url,$model){
                            return Html::a('<span class="fas fa-trash"><span',['delete','id'=>$model->idequipos],[
                                'title'=>Yii::t('app','eliminar'),
                                'class'=>'',
                                'data'=>[
                                    'confirm'=>'Está completamente seguro? Perderá permanentemente esta información.',
                                    'method'=>'post',
                                ],
                            ]);
                        },
                        'urlCreator'=>function($action,$model,$key,$index){


                            if($action==='view'){
                                $url ='http://mantenimiento.seisa/index.php/equipos/view?id='.$model->idequipos;
                                return $url;
                            }
                            if($action==='update'){
                                $url ='http://mantenimiento.seisa/index.php/equipos/update?id='.$model->idequipos;
                                return $url;
                            }
                            if($action==='delete'){
                                $url ='http://mantenimiento.seisa/index.php/equipos/delete?id='.$model->idequipos;
                                return $url;
                            }


                        }


                    ],

                ],
            ],



        ]); ?>
</div>

