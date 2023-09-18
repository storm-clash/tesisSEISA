<?php

use kartik\export\ExportMenu;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ContratoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Contratos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contrato-index">
    <div class="card">
        <div class="card-header card-header-warning">
            <h4 class="card-title"><?=$this->title?></h4>
            <p class="card-category">Registro de Contratos</p>
        </div>
        <div class="card-body" style="padding: 15px">
            <div class="p-3">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <?php
                $gridColumns=[
                    // 'id',
                    'nombre',
                    'niveles',
                    'ponderacion',
                    'puntuacion',
                    'altura',
                ];
                echo ExportMenu::widget([
                    'dataProvider'=>$dataProvider,
                    'columns'=>$gridColumns

                ]);
                ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'rowOptions'=>function($model){
            if($model->estado==1){
                return ['class'=>'table-success'];

            }else return ['class'=>'table-danger'];
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            //'cliente_idcliente',
            [
                'attribute'=>'clienteIdcliente.nombreCliente',
                'label'=>'Nombre del Cliente',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
           // 'monto',
            [
                'attribute'=>'monto',
                'label'=>'Monto del Contrato',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
            //'dias',
            [
                'attribute'=>'dias',
                'label'=>'Días para efectuar pago',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
           // 'firma',
            [
                'attribute'=>'firma',
                'label'=>'Firma ',
                //'value'=>foto($dataProvider->getModels()),
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
            //'contrato',
            [
                'attribute'=>'contrato',
                'label'=>'Contrato',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
            //'formasPago_id',
            [
                'attribute'=>'formasPago.nombre',
                'label'=>'Forma de Pago',

                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
            //'estado',
            //'motivo',

            ['class' => 'yii\grid\ActionColumn',
                'header'=>'Acciones',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
                'template'=>'{view}{update}{delete}{status}{pdf}{recontratar}',
                'buttons'=>[
                    'view'=>function ($url,$model){
                        return Html::a('<span class="fas fa-eye fa-lg"><span',['view','id'=>$model->id],[
                            'title'=>Yii::t('app','ver'),
                        ]);
                    },
                    'status'=>function ($url,$model){
                        return Html::a('<span class="fas fa-ban fa-lg"><span',['estado','id'=>$model->id],[
                            'title'=>Yii::t('app','Cancelar Contrato'),
                            'class'=>'',
                            'data'=>[
                                'confirm'=>'Está completamente seguro? Desea cancelar/reanudar este Contrato.',
                                'method'=>'post',
                            ],
                        ]);
                    },
                    'pdf'=>function ($url,$model){
                        return Html::a('<span class="fas fa-file-pdf fa-lg"><span',['createpdf','id'=>$model->id],[
                            'title'=>Yii::t('app','Generar PDF Contrato'),
                            'class'=>'',
                            'data'=>[
                                'confirm'=>'Está completamente seguro? Desea generar el PDF para este Contrato.',
                                'method'=>'post',
                            ],
                        ]);
                    },
                    'recontratar'=>function ($url,$model){
                        return Html::a('<span class="fas fa-calendar-check fa-lg"><span',$url,[
                            'title'=>Yii::t('app','Re-Contratación'),
                            'class'=>'',
                            'data'=>[
                                'confirm'=>'Está completamente seguro? Desea Re-Contratar este cliente.',
                                'method'=>'post',
                            ],
                        ]);
                    },



                ],
                'urlCreator'=>function($action,$model,$key,$index){
                    $fecha=date('y-m-d');
                    $profecha=strtotime('first day of January',strtotime($fecha.'+ 1 year'));

                    //$plan=\app\models\Planificacion::find()->where(strtotime('fecha')==strtotime($profecha))->one();

                    if($action==='recontratar' && strtotime( $fecha)>=strtotime($profecha)){
                        $url ='http://mantenimiento.seisa/index.php/contrato/recontratar?id='.$model->id;
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
