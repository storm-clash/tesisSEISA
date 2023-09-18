<?php

use app\models\Ofertacomercial;
use kartik\export\ExportMenu;
use yii\bootstrap4\Alert;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UebSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Unidad Empresarial de Base';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ueb-index">
    <div class="card">
        <div class="card-header card-header-warning">
            <h4 class="card-title"><?=$this->title?></h4>
            <p class="card-category">Registro de Unidad Empresarial de Base</p>
        </div>
        <div class="card-body" style="padding: 15px">
            <div class="p-3">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Registrar UEB', ['create'], ['class' => 'btn btn-warning']) ?>
    </p>

                <?php
                $gridColumns=[
                    // 'id',
                    'nombre',
                    'direccion',
                    'telefono',
                    'correo',
                    'provincia.nombre',
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

           // 'id',
           // 'nombre',
            [
                'attribute'=>'nombre',
               // 'label'=>'Ponderación',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
            //'direccion',
            [
                'attribute'=>'direccion',
               // 'label'=>'Ponderación',
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
               // 'label'=>'Ponderación',
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
               // 'label'=>'Ponderación',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
            //'provincia_id',
            [
                'attribute'=>'provincia.nombre',
                'label'=>'Provincia',
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
                'template'=>'{view}{update}{delete}{brigadas}',
                'buttons'=>[
                    'view'=>function ($url,$model){
                        return Html::a('<span class="fas fa-eye"><span',['view','id'=>$model->id],[
                            'title'=>Yii::t('app','view'),
                        ]);
                    },
                    'update'=>function ($url,$model){
                        return Html::a('<span class="fas fa-pencil-alt"><span',['update','id'=>$model->id],[
                            'title'=>Yii::t('app','editar'),
                        ]);
                    },
                    'delete'=>function ($url,$model){
                        return Html::a('<span class="fas fa-trash"><span',['delete','id'=>$model->id],[
                            'title'=>Yii::t('app','eliminar'),
                            'class'=>'',
                            'data'=>[
                                'confirm'=>'Está completamente seguro? Perderá permanentemente esta información.',
                                'method'=>'post',
                            ],
                        ]);
                    },
                    'brigadas'=>function ($url,$model){
                        return Html::a('<span class="fas fa-address-book"><span',$url,[
                            'title'=>Yii::t('app','brigadas'),
                        ]);
                    },
                ],
                'urlCreator'=>function($action,$model,$key,$index){

                    if ($action==='brigadas' ){


                            $url ='http://mantenimiento.seisa/index.php//brigada/create?id='.$model->id;
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
