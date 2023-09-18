<?php

use kartik\export\ExportMenu;
use yii\bootstrap4\Modal;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PlanificacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Planificacions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="planificacion-index">
    <div class="card">
        <div class="card-header card-header-warning">
            <h4 class="card-title"><?=$this->title?></h4>
            <p class="card-category">Registro de Planificaciones</p>
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
    ];
    echo ExportMenu::widget([
        'dataProvider'=>$dataProvider,
        'columns'=>$gridColumns

    ]);
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'idplanificacion',

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
           // 'sistemasIntalados_idsistemasIntalados',
            [
                'attribute'=>'sistemasIntaladosIdsistemasIntalados.tipoSistemaSeguridad.nombre',
                'label'=>'Sistema de Seguridad',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
            [
                    //Para asignar valor a variable Virtual
                'attribute'=>'nombre',
                'label'=>'Cliente',

                'value'=>'sistemasIntaladosIdsistemasIntalados.clienteIdcliente.nombreCliente',
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
                        return Html::a('<span class="fas fa-eye fa-lg"><span',['view','id'=>$model->idplanificacion],[
                            'title'=>Yii::t('app','ver'),
                        ]);
                    },
                    'update'=>function ($url,$model){
                        return Html::a('<span class="fas fa-pencil-alt fa-lg"><span',$url,[
                            'title'=>Yii::t('app','editar'),
                        ]);
                    },


                     ],
                'urlCreator'=>function($action,$model,$key,$index){



                    $plan=\app\models\Ordenservicio::find()->where(['planificacion_idplanificacion'=>$model->idplanificacion])->all();
                    foreach ($plan as $p){
                        $reg=\app\models\Registromantenimientos::find()->where(['ordenServicio_id'=>$p['id']])->one();
                    if ($action==='update' && $reg==null ){
                        $url ='http://mantenimiento.seisa/index.php/planificacion/update?id='.$model->idplanificacion;
                        return $url;
                    }
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
