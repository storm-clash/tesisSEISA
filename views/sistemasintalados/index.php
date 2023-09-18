<?php

use kartik\export\ExportMenu;
use yii\bootstrap4\Alert;
use yii\bootstrap4\Modal;
use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\helpers\Url;
//use yii\bootstrap4\Html;
use kartik\bs4dropdown\Dropdown;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SistemasintaladosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Sistemas Instalados';
$this->params['breadcrumbs'][] = $this->title;
$img = Yii::getAlias("@web") . '/img/cargando.png';
?>
<style type="text/css">

    .loader{ position: fixed;left: 0px;top:0px;width: 100%;height: 100% ;


        z-index: 9999;background: url(<?=$img?>)50% 50% no-repeat rgb(249,249,249);animation-name: spin ;


</style>

<div class="client-index">

    <div class="card">
        <div class="card-header card-header-warning">
            <h4 class="card-title"><?=$this->title?></h4>
            <p class="card-category">Registro de Sistemas de Seguridad Instalados</p>
        </div>
        <div class="card-body" style="padding: 15px">
            <div class="p-3">


               <p style="float: left">

                 <?= Html::button('Registrar Sistema', [
                 'value'=>Url::to('http://mantenimiento.seisa/index.php/sistemasintalados/create'),
                 'class' => 'btn btn-warning',
                 'id'=>'BtnModalId',
                 'data-toggle'=>'modal',
                'data-target'=>'#your-modal',
                  ]) ?>
              </p>

                <?php $img= Yii::getAlias("@web").'/img/';?>
                <div class="loader " id="cargando" style="display: none">

                </div>

              <?php
                Modal::begin(
               [
               // 'header'=>'<h4>Sistemas Instalados</h4>',
              'title'=>'Registrar Sistemas de Seguridad Instalados',

                'id'=>'your-modal',
                'size'=>'modal-md',
              //'class'=>'loader',
              //'clientOptions'=>['backdrop'=>'static']

               ]
               );
               echo "<div id='modalContent'></div>";
                Modal::end();
                 ?>

                <div style="float: right">
                <?php
                $gridColumns=[
                    // 'id',
                    'clienteIdcliente.nombreCliente',
                    'tipoSistemaSeguridad.nombre',
                  //  'ponderacion',
                   // 'puntacion',
                ];
                echo ExportMenu::widget([
                    'dataProvider'=>$dataProvider,
                    'columns'=>$gridColumns

                ]);
                ?>
                </div>


                <?= GridView::widget([
                'dataProvider' => $dataProvider,
               // 'filterModel' => $searchModel,
                   /* 'rowOptions'=>function(){
                    $equipo=new \app\models\Equipos();
                        if($equipo->estado_id==1){
                            return ['class'=>'bg-success'];

                        } if($equipo->estado_id==2){
                            return ['class'=>'table-success'];

                        } if($equipo->estado_id==3){
                            return ['class'=>'table-warning'];

                        }
                        return ['class'=>'table-danger'];
                    },*/
                'columns' => [
                    [
                        'class'=>'kartik\grid\ExpandRowColumn',

                        'value'=>function ($model,$key,$index,$column){
                            return \kartik\grid\GridView::ROW_COLLAPSED;
                        },
                        'detail'=>function($model,$key,$index,$column){
                            $searchModel= new \app\models\EquiposSearch();
                            $searchModel->sistemasIntalados_idsistemasIntalados=$model->idsistemasIntalados;
                            $dataProvider=$searchModel->search(Yii::$app->request->queryParams);
                            return Yii::$app->controller->renderPartial('/equipos/_indexMostrar',[
                                'searchModel'=>$searchModel,
                                'dataProvider'=>$dataProvider,
                            ]);
                        },
                    ],

            //'idsistemasIntalados',
           // 'cliente_idcliente',
            //'clienteIdcliente.nombreCliente',
            [
                'attribute'=>'clienteIdcliente.nombreCliente',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
            //'tipoSistemaSeguridad.nombre',
            [
                'attribute'=>'tipoSistemaSeguridad.nombre',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
                    [
                        'attribute'=>'local',
                        'contentOptions'=>['style'=>'text-align:center'],
                        'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
                    ],
                    [
                        'attribute'=>'clasificacion',
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
           'headerOptions'=>[
               'style'=>[
                   'color'=>'#9c27b0',
                   'text-align'=>'center',
               ]
           ],
           'contentOptions'=>['style'=>'text-align:center'],
                        'template'=>'{view}{update}{delete}{oferta}',
                        'buttons'=>[
                            'view'=>function ($url,$model){
                                return Html::a('<span class="fas fa-eye fa-lg"><span',['view','id'=>$model->idsistemasIntalados],[
                                    'title'=>Yii::t('app','view'),
                                ]);
                            },
                            'update'=>function ($url,$model){
                                return Html::a('<span class="fas fa-pencil-alt fa-lg"><span',['update','id'=>$model->idsistemasIntalados],[
                                    'title'=>Yii::t('app','editar'),
                                ]);
                            },
                            'delete'=>function ($url,$model){
                                return Html::a('<span class="fas fa-trash fa-lg"><span',$url,[
                                    'title'=>Yii::t('app','eliminar'),
                                    'class'=>'',
                                    'data'=>[
                                        'confirm'=>'Está completamente seguro? Perderá permanentemente esta información.',
                                        'method'=>'post',
                                    ],
                                ]);
                            },
                            'oferta'=>function ($url,$model){
                                return Html::a('<span class="fas fa-address-book fa-lg"><span',$url,[
                                    'title'=>Yii::t('app','equipos'),
                                ]);
                            },
                        ],
                        'urlCreator'=>function($action,$model,$key,$index){

                            if($action==='oferta'){
                                $url ='http://mantenimiento.seisa/index.php/equipos/create?id='.$model->idsistemasIntalados;
                                return $url;
                            }
                            $oferta=\app\models\Ofertacomercial::find()->where(['cliente_idcliente'=>$model->cliente_idcliente])->one();
                          //  foreach ($oferta as $ofert){
                            if($action==='delete' && $oferta==null){
                                $url ='http://mantenimiento.seisa/index.php/equipos/delete?id='.$model->idsistemasIntalados;
                                return $url;
                            }
                            //}


                        }
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



    <script type="text/javascript">
        $(window).load(function () {
            $(".loader").fadeOut("slow");
        });
    </script>
</div>


