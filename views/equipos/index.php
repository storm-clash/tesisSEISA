<?php

use kartik\export\ExportMenu;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EquiposSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Equipos';
$this->params['breadcrumbs'][] = ['label' => 'Equipos', 'url' => ['index']];
?>
<div class="equipos-index">
    <div class="card">
        <div class="card-header card-header-warning">
            <h4 class="card-title"><?=$this->title?></h4>
            <p class="card-category">Registro de Equipos por Sistema de Seguridad</p>
        </div>
        <div class="card-body" style="padding: 15px">
            <div class="p-3">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <?php
                $gridColumns=[
                    // 'idequipos',
                    'nombreEquipo',
                    'precioCosto',
                    'precioIntalacion',
                    'precioMantenimiento',
                    'sistemasIntaladosIdsistemasIntalados.tipoSistemaSeguridad.nombre',
                    'estado.nombre',
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
           // 'sistemasIntaladosIdsistemasIntalados.tipoSistemaSeguridad.nombre',
            [
                'attribute'=>'sistemasIntaladosIdsistemasIntalados.tipoSistemaSeguridad.nombre',
                'label'=>'Sistema de Seguridad',
                'headerOptions'=>[
                        'style'=>[
                                'color'=>'#9c27b0',
                                'text-align'=>'center',
                        ]
                ],
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
                            $url ='index.php?r=equipos/view&id='.$model->idequipos;
                            return $url;
                        }
                        if($action==='update'){
                            $url ='index.php?r=equipos/update&id='.$model->idequipos;
                            return $url;
                        }
                        if($action==='delete'){
                            $url ='index.php?r=equipos/delete&id='.$model->idequipos;
                            return $url;
                        }


                    }


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
