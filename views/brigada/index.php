<?php

use kartik\export\ExportMenu;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BrigadaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Brigadas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brigada-index">
    <div class="card">
        <div class="card-header card-header-warning">
            <h4 class="card-title"><?=$this->title?></h4>
            <p class="card-category">Registro de Brigadas de Mantenimiento</p>
        </div>
        <div class="card-body" style="padding: 15px">
            <div class="p-3">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <?php
                $gridColumns=[
                    // 'idbrigada',
                    'nombre',
                    'cantHombres',
                    'horasTrabajadas',
                    'horasPlanificadas',
                    'categoria.nombre',
                    'ueb.nombre',
                ];
                echo ExportMenu::widget([
                    'dataProvider'=>$dataProvider,
                    'columns'=>$gridColumns

                ]);
                ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
          'rowOptions'=>function($model){
                        if($model->estado == 1)
                        {
                            return ['class'=>'table-success'];

                        }
                        if($model->estado == 0)
                        {
                            return ['class'=>'table-danger'];

                        }
                        },

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'idbrigada',
           // 'nombre',
            [
                'attribute'=>'nombre',
                //'label'=>'Puntuación',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
            //'cantHombres',
            [
                'attribute'=>'cantHombres',
                'label'=>'Cantidad de Hombres',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
            //'horasTrabajadas',
            [
                'attribute'=>'horasTrabajadas',
                'label'=>'Horas Trabajadas',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
            //'horasPlanificadas',
            [
                'attribute'=>'horasPlanificadas',
                'label'=>'Horas Planificadas',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
            //'idJefeBrigada',
            //'categoria_id',
            [
                'attribute'=>'categoria.nombre',
                'label'=>'Categoria',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
            //'ueb_id',
            [
                'attribute'=>'ueb.nombre',
                'label'=>'UEBs',

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
                        return Html::a('<span class="fas fa-check fa-lg"><span',['estado','id'=>$model->idbrigada],[
                            'title'=>Yii::t('app','Modificar Brigada'),
                            'class'=>'',
                            'data'=>[
                                'confirm'=>'Está completamente seguro? Desea modificar esta Brigada.',
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
