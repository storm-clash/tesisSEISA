<?php

use kartik\export\ExportMenu;
use yii\bootstrap4\Modal;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClasificarentidadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Clasificarentidads';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clasificarentidad-index">
    <div class="card">
        <div class="card-header card-header-warning">
            <h4 class="card-title"><?=$this->title?></h4>
            <p class="card-category">parámetros de clasificación de los sistemas de seguridad</p>
        </div>
        <div class="card-body" style="padding: 15px">
            <div class="p-3">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <p>
                    <?= Html::button('Crear parámetros de clasificación', [
                        'value'=>Url::to('index.php?r=clasificarentidad/create'),
                        'class' => 'btn btn-warning',
                        'id'=>'BtnModalId',
                        'data-toggle'=>'modal',
                        'data-target'=>'#your-modal',
                    ]) ?>
                </p>
                <?php
                Modal::begin(
                    [
                        'title'=>'<h4>Parámetros de clasificación de los sistemas de seguridad</h4>',
                        //'header'=>'<h4>Altura del Montaje</h4>',
                        'id'=>'your-modal',
                        'size'=>'modal-md',

                    ]
                );
                echo "<div id='modalContent'></div>";
                Modal::end();
                ?>
                <?php
                $gridColumns=[
                   // 'id',
                    'rangoInicial',
                    'rangoFinal',
                    'precioMN',
                    'precioCUC',
                    //'cantHombre',
                    //'cantHoras',
                    //'tipoParametro_id',
                    //'tipoSistemaSeguridad_id',
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

          //  'id',
           // 'rangoInicial',
            [
                'attribute'=>'rangoInicial',
                //'label'=>'Ponderación',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
           // 'rangoFinal',
            [
                'attribute'=>'rangoFinal',
                //'label'=>'Ponderación',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
            //'precioMN',
            [
                'attribute'=>'precioMN',
                //'label'=>'Ponderación',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
           // 'precioCUC',
            [
                'attribute'=>'precioCUC',
                //'label'=>'Ponderación',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
            //'cantHombre',
            [
                'attribute'=>'cantHombre',
                //'label'=>'Ponderación',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
           // 'cantHoras',
            [
                'attribute'=>'cantHoras',
                //'label'=>'Ponderación',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
           // 'tipoParametro.nombre',
            [
                'attribute'=>'tipoParametro.nombre',
                'label'=>'Complejidad del Parámetro',
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
                'label'=>'Sistema al que se asigna',
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
                        return Html::a('<span class="fas fa-trash"><span',['delete','id'=>$model->id],[
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
