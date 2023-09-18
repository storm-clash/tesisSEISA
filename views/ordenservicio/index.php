<?php

use kartik\export\ExportMenu;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrdenservicioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Ordenservicios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ordenservicio-index">
    <div class="card">
        <div class="card-header card-header-warning">
            <h4 class="card-title"><?=$this->title?></h4>
            <p class="card-category">Registro de Órdenes de Servicio</p>
        </div>
        <div class="card-body" style="padding: 15px">
            <div class="p-3">



    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <?php
                $gridColumns=[
                    // 'id',
                    'clienteIdcliente.nombreCliente',
                    'brigadaIdbrigada.nombre',
                    'fecha',
                ];
                echo ExportMenu::widget([
                    'dataProvider'=>$dataProvider,
                    'columns'=>$gridColumns

                ]);
                ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'rowOptions'=>function($model){
            if($model->estado==0){
                return ['class'=>'table-danger'];

            }else return ['class'=>'table-success'];
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            //'clienteIdcliente.nombreCliente',
            [
                'attribute'=>'clienteIdcliente.nombreCliente',
                //'label'=>'Fecha',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
           // 'brigadaIdbrigada.nombre',
            [
                'attribute'=>'brigadaIdbrigada.nombre',
                //'label'=>'Fecha',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
           // 'fecha',
            [
                'attribute'=>'fecha',
                'label'=>'Fecha',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
            [
                'attribute'=>'sistemas',
                'label'=>'Sistemas de Seguridad',
                'value'=>'planificacionIdplanificacion.sistemasIntaladosIdsistemasIntalados.tipoSistemaSeguridad.nombre',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
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
                'template'=>'{view}{update}{delete}{registro}',
                'buttons'=>[
                    'view'=>function ($url,$model){
                        return Html::a('<span class="fas fa-eye fa-lg"><span',['view','id'=>$model->id],[
                            'title'=>Yii::t('app','view'),
                        ]);
                    },
                    'update'=>function ($url,$model){
                        return Html::a('<span class="fas fa-pencil-alt fa-lg"><span',['update','id'=>$model->id],[
                            'title'=>Yii::t('app','editar'),
                        ]);
                    },


                    'registro'=>function ($url,$model){
                        return Html::a('<span class="fas fa-address-book fa-lg"><span',$url,[
                            'title'=>Yii::t('app','Registro'),
                        ]);
                    },
                ],
                'urlCreator'=>function($action,$model,$key,$index){
                 $estado=\app\models\Ordenservicio::findOne($model->id);
                    if($action==='registro' && $model->estado==1){
                        $url ='http://mantenimiento.seisa/index.php/registromantenimientos/create?id='.$model->id;
                        return $url;
                    }

                }
            ],
        ],
    ]); ?>
            </div>
        </div>
    </div>
</div>



