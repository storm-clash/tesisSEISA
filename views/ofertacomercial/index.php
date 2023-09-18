<?php

use app\models\Ofertacomercial;
use kartik\export\ExportMenu;
use yii\bootstrap4\Alert;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OfertacomercialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Ofertacomercials';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ofertacomercial-index">

    <div class="card">
        <div class="card-header card-header-warning">
            <h4 class="card-title"><?=$this->title?></h4>
            <p class="card-category">Registro de Ofertas Comerciales</p>
        </div>
        <div class="card-body" style="padding: 15px">
            <div class="p-3">

                <?php
                $gridColumns=[
                    // 'id',
                    'clienteIdcliente.nombreCliente',
                    'ueb.nombre',
                    'numeroDoc',
                    'fecha',
                    'elaborado',
                    'fechaVencimiento',
                    'cargo',
                ];
                echo ExportMenu::widget([
                    'dataProvider'=>$dataProvider,
                    'columns'=>$gridColumns

                ]);
                ?>


    <?= GridView::widget([
            'showFooter'=>true,
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
                    'rowOptions'=>function($model){
                        if($model->estados_idestados == 1)
                        {
                            return ['class'=>'table-info'];

                        }
                        if($model->estados_idestados == 2)
                        {
                            return ['class'=>'table-success'];

                        }
                        if($model->estados_idestados == 3)
                        {
                            return ['class'=>'table-danger'];

                        }
                    },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            //'clienteIdcliente.nombreCliente',
            [
                'attribute'=>'clienteIdcliente.nombreCliente',
                'label'=>'Nombre del Cliente',
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
                'contentOptions'=>['style'=>'text-align:center']
            ],
            //'ueb.nombre',
            [
                'attribute'=> 'ueb.nombre',
                'label'=>'UEB',
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
                'contentOptions'=>['style'=>'text-align:center']
            ],
            //'numeroDoc',
            [
                'attribute'=>'numeroDoc',
                'label'=>'Número de Documento',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
            //'fecha',
            [
                'attribute'=>'fecha',
                'label'=>'Fecha de Creación',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
            //'fechaVencimiento',
            [
                'attribute'=>'fechaVencimiento',
                'label'=>'Fecha de Vencimiento',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
           // 'elaborado',
            [
                'attribute'=>'monto',


               // 'label'=>'Monto',
                'footer'=>sumarizeFooter($dataProvider->getModels()),
                'format'=>'raw',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],

            //'cargo',
            [
                'attribute'=>'cargo',
                'label'=>'Cargo',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
            //'estadosIdestados.nombre',
            [
                'attribute'=>'estadosIdestados.nombre',
                'label'=>'Cargo',
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
                'contentOptions'=>['style'=>'display:block'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',

                    ]
                ],
                'template'=>'{view}{update}{delete}{contratar}{estatus}{pdf}',
                'buttons'=>[
                    'view'=>function ($url,$model){
                        return Html::a('<span class="fas fa-eye fa-lg"><span',['view','id'=>$model->id],[
                            'title'=>Yii::t('app','Ver'),
                        ]);
                    },
                    'update'=>function ($url,$model){
                        return Html::a('<span class="fas fa-pencil-alt fa-lg"><span',$url,[
                            'title'=>Yii::t('app','Editar'),
                        ]);
                    },
                    'estatus'=>function ($url,$model){
                        return Html::a('<span class="fas fa-check fa-lg"><span',$url,[
                            'title'=>Yii::t('app','Modificar Oferta'),
                            'class'=>'',
                            'data'=>[
                                'confirm'=>'Está completamente seguro? Desea modificar esta Oferta.',
                                'method'=>'post',
                            ],
                        ]);
                    },


                     'contratar'=>function ($url,$model){
                        return Html::a('<span class="fas fa-address-book fa-lg"><span',$url,[
                            'title'=>Yii::t('app','contratar'),
                        ]);
                    },
                    'pdf'=>function ($url,$model){
                        return Html::a('<span class="fas fa-file-pdf fa-lg"><span',['createpdf','id'=>$model->id],[
                            'title'=>Yii::t('app','Generar PDF Oferta Comercial'),
                            'class'=>'',
                            'data'=>[
                                'confirm'=>'Está completamente seguro? Desea generar el PDF para esta Oferta Comercial.',
                                'method'=>'post',
                            ],
                        ]);
                    },


                ],
                'urlCreator'=>function($action,$model,$key,$index){

                    $date=date('y-m-d');

                     $contrato=\app\models\Contrato::find()->where(['cliente_idcliente'=>$model->cliente_idcliente])->one();
                    if ($action==='contratar' && $date<=$model->fechaVencimiento && $model->estados_idestados==2 && $contrato==null){

                        $url ='http://mantenimiento.seisa/index.php/contrato/create?id='.$model->cliente_idcliente;
                        return $url;
                    }



                    if ($action==='update' && $model->estados_idestados ==3 ){
                        $url ='http://mantenimiento.seisa/index.php/ofertacomercial/update?id='.$model->id;
                        return $url;
                    }

                    if ($action==='estatus' && $model->estados_idestados !=3 && $contrato==null){
                        $url ='http://mantenimiento.seisa/index.php/ofertacomercial/estado?id='.$model->id;
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
                <?php
                function sumarizeFooter($model){
                    $sum=0;
                    foreach ($model as $mod){
                        $sistema=\app\models\Sistemasintalados::find()->where(['cliente_idcliente'=>$mod['cliente_idcliente']])->all();


                    foreach ($sistema as $sis){
                        $clasi= \app\models\Clasificarentidad::find()->where(['id'=>$sis['clasificarentidad_id']])->all();
                        foreach ($clasi as $re){
                            $sum+= floatval($re['precioMN']);

                        }


                    }
                    }
                    return $sum;
                }
                ?>
            </div>
        </div>
    </div>



</div>
