<?php

use kartik\export\ExportMenu;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrdencompraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Ordencompras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ordencompra-index">
    <div class="card">
        <div class="card-header card-header-warning">
            <h4 class="card-title"><?=$this->title?></h4>
            <p class="card-category">Registro de Órdenes de Compra</p>
        </div>
        <div class="card-body" style="padding: 15px">
            <div class="p-3">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <?php
                $gridColumns=[
                    // 'idordenCompra',
                    'fecha',
                    'cliente_idcliente',
                ];
                echo ExportMenu::widget([
                    'dataProvider'=>$dataProvider,
                    'columns'=>$gridColumns

                ]);
                ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'idordenCompra',
           // 'fecha',
            [
                'attribute'=>'fecha',
                //'label'=>'Ponderación',
                'headerOptions'=>['style'=>'text-align:center'],
                'contentOptions'=>['style'=>'text-align:center']
            ],
            //'cliente_idcliente',
            [
                'attribute'=>'clienteIdcliente.nombreCliente',
                //'label'=>'Ponderación',
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
                'contentOptions'=>['style'=>'text-align:center']
            ],
            [
                'attribute'=>'nombre',
                //'value'=>'equiposHasOrdencompras.equiposIdequipos.nombreEquipo',

                //'label'=>'Ponderación',
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
                'contentOptions'=>['style'=>'text-align:center']
            ],
            [
                'attribute'=>'cantidad',
               // 'value'=>'equiposHasOrdencompras.equiposIdequipos.cantidad',
                //'label'=>'Ponderación',
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
                'contentOptions'=>['style'=>'text-align:center']
            ],
            [
                'attribute'=>'estado',
                // 'value'=>'equiposHasOrdencompras.equiposIdequipos.cantidad',
                //'label'=>'Ponderación',
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
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
                'template'=>'{view}{update}{delete}',
                'buttons'=>[
                    'view'=>function ($url,$model){
                        return Html::a('<span class="fas fa-eye"><span',$url,[
                            'title'=>Yii::t('app','view'),
                        ]);
                    },
                    'update'=>function ($url,$model){
                        return Html::a('<span class="fas fa-pencil-alt"><span',$url,[
                            'title'=>Yii::t('app','editar'),
                        ]);
                    },
                    'delete'=>function ($url,$model){
                        return Html::a('<span class="fas fa-trash"><span',['delete','id'=>$model->idordenCompra],[
                            'title'=>Yii::t('app','eliminar'),
                            'class'=>'',
                            'data'=>[
                                'confirm'=>'Está completamente seguro? Perderá permanentemente esta información.',
                                'method'=>'post',
                            ],
                        ]);
                    },


                ],

            ],
        ],
        'options'=>['class'=>'container col-md-10 col-lg-10 col-sm-12'],
        'tableOptions'=>[
            'class'=>'table table-hover table table-bordered',

        ],
    ]); ?>
            </div>
        </div>
    </div>
</div>
