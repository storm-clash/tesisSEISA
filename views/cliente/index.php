<?php

use app\models\ClienteSearch;
use kartik\export\ExportMenu;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\helpers\Url;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\bootstrap4\Alert;
use app\models\Ofertacomercial;
use yii\web\View;

//use kartik\grid\ExpandRowColumnAsset;
//use kartik\bs4dropdown\Dropdown;



/* @var $this yii\web\View */
/* @var $searchModel app\models\ClienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clientes';
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
?>


<div class="client-index">

    <div class="card">
        <div class="card-header card-header-warning">
            <h4 class="card-title"><?=$this->title?></h4>
            <p class="card-category">Registro de Clientes</p>
        </div>

        <div class="card-body" style="padding: 15px">
            <div class="p-3">

                <p style="float: left">
                    <?= Html::a('Crear Registro de Cliente', ['create'], ['class' => 'btn btn-warning']) ?>

                </p>
                <div style="float: right">

                <?php

                $gridColumns=[
                    ['class'=>'yii\grid\SerialColumn'],
                    //'idcliente',
                    'fechaAct',
                    'codigoREEUP',
                    'nombreCliente',
                    'organismo.nombre',
                    ['class'=>'yii\grid\ActionColumn'],
                ];
                echo ExportMenu::widget([
                    'dataProvider'=>$dataProvider,
                    'columns'=>$gridColumns

                ]);
                ?>
                </div>
                <?= GridView::widget([


                    'dataProvider' => $dataProvider,
                    //'filterModel' => $searchModel,
                    'rowOptions'=>function($model){
                        if($model->estado==1){
                            return ['class'=>'table-success'];

                        }else return ['class'=>'bg-warning'];
                    },

                    'columns' => [
                        [
                            'class'=>'kartik\grid\ExpandRowColumn',

                            'value'=>function ($model,$key,$index,$column){
                                return \kartik\grid\GridView::ROW_COLLAPSED;
                            },
                            'detail'=>function($model,$key,$index,$column){
                                $searchModel= new \app\models\SistemasintaladosSearch();
                                $searchModel->cliente_idcliente=$model->idcliente;
                                $dataProvider=$searchModel->search(Yii::$app->request->queryParams);
                                return Yii::$app->controller->renderPartial('/sistemasintalados/_indexMostrar',[
                                    'searchModel'=>$searchModel,
                                    'dataProvider'=>$dataProvider,
                                ]);
                            },
                        ],

                        // 'idcliente',
                        //'fechaAct',
                        /* [
                             'attribute'=>'fechaAct',
                             'contentOptions'=>['style'=>'text-align:center']
                         ],*/
                        //'codigoREEUP',
                        [
                            'attribute'=>'codigoREEUP',
                            'contentOptions'=>['style'=>'text-align:center'],
                            'headerOptions'=>[
                                'style'=>[
                                    'color'=>'#9c27b0',
                                    'text-align'=>'center',
                                ]
                            ],
                        ],
                        //'nombreCliente',
                        [
                            'attribute'=>'nombreCliente',
                            'contentOptions'=>['style'=>'text-align:center'],
                            'headerOptions'=>[
                                'style'=>[
                                    'color'=>'#9c27b0',
                                    'text-align'=>'center',
                                ]
                            ],
                        ],
                        //'organismo',
                        [
                            'attribute'=>'organismo.nombre',
                            'contentOptions'=>['style'=>'text-align:center'],
                            'headerOptions'=>[
                                'style'=>[
                                    'color'=>'#9c27b0',
                                    'text-align'=>'center',
                                ]
                            ],
                        ],
                        //'telefono',
                        [
                            'attribute'=>'telefono',
                            'contentOptions'=>['style'=>'text-align:center'],
                            'headerOptions'=>[
                                'style'=>[
                                    'color'=>'#9c27b0',
                                    'text-align'=>'center',
                                ]
                            ],
                        ],
                        // 'correo',
                        [
                            'attribute'=>'correo',
                            'contentOptions'=>['style'=>'text-align:center'],
                            'headerOptions'=>[
                                'style'=>[
                                    'color'=>'#9c27b0',
                                    'text-align'=>'center',
                                ]
                            ],
                            //'header'=>[]
                        ],
                        // 'direccion',
                        [
                            'attribute'=>'direccion',
                            'contentOptions'=>['style'=>'text-align:center'],
                            'headerOptions'=>[
                                'style'=>[
                                    'color'=>'#9c27b0',
                                    'text-align'=>'center',
                                ]
                            ],
                        ],
                        //'cuentaBancariaCUP',
                        //'agenciaBanCup',
                        //'direcAgenciaCup',
                        //'cuentaBanCUC',
                        //'agenciaBanCUC',
                        //'direccionAgentBanCuc',
                        //'provincia_id',
                       // 'estado',



                        ['class' => 'yii\grid\ActionColumn',
                            'header'=>'Acciones',
                            'contentOptions'=>['style'=>'display:block'],
                            'headerOptions'=>[
                                'style'=>[
                                    'color'=>'#9c27b0',
                                    'text-align'=>'center',

                                ]
                            ],
                            'template'=>'{view}{update}{delete}{oferta}{pdf}',
                            'buttons'=>[
                                'view'=>function ($url,$model){
                                    return Html::a('<span class="fas fa-eye fa-lg"><span',['view','id'=>$model->idcliente],[
                                        'title'=>Yii::t('app','Observar'),
                                    ]);
                                },
                                'update'=>function ($url,$model){
                                    return Html::a('<span class="fas fa-pencil-alt fa-lg"><span',['update','id'=>$model->idcliente],[
                                        'title'=>Yii::t('app','modificar'),
                                    ]);
                                },
                                /* 'delete'=>function ($url,$model){
                                     return Html::a('<span class="fas fa-trash"><span',['delete','id'=>$model->idcliente],[
                                         'title'=>Yii::t('app','eliminar'),
                                         'class'=>'',
                                         'data'=>[
                                             'confirm'=>'Está completamente seguro? Perderá permanentemente esta información.',
                                             'method'=>'post',
                                         ],
                                     ]);
                                 },*/
                                'oferta'=>function ($url,$model){
                                    return Html::a('<span class="fas fa-address-book fa-lg"><span',$url,[
                                        'title'=>Yii::t('app','oferta'),
                                    ]);
                                },
                                'pdf'=>function ($url,$model){
                                    return Html::a('<span class="fas fa-file-pdf fa-lg"><span',['createpdf','id'=>$model->idcliente],[
                                        'title'=>Yii::t('app','Generar PDF Contrato'),
                                        'class'=>'',
                                        'data'=>[
                                            'confirm'=>'Está completamente seguro? Desea generar el PDF para este Contrato.',
                                            'method'=>'post',
                                        ],
                                    ]);
                                },


                            ],
                            'urlCreator'=>function($action,$model,$key,$index){
                                $oferta=new Ofertacomercial();

                                $valor=$oferta->buscarNombrexId($model->idcliente);
                                if ($action==='oferta' && empty($valor)==false){

                                }else
                                    if($action==='oferta'){
                                        $url ='http://mantenimiento.seisa/index.php/ofertacomercial/create?id='.$model->idcliente;
                                        return $url;
                                    }


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



</div>
