<?php

use app\models\SistemasintaladosSearch;
use kartik\export\ExportMenu;
use yii\bootstrap\Modal;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SistemasintaladosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sistemas Instalados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sistemasintalados-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            //'idsistemasIntalados',
            //'cliente_idcliente',
            'clienteIdcliente.nombreCliente',
           // 'tipoSistemaSeguridad_id',
            'tipoSistemaSeguridad.nombre',



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
                        return Html::a('<span class="fas fa-trash"><span',$url,[
                            'title'=>Yii::t('app','eliminar'),
                            'class'=>'',
                            'data'=>[
                                'confirm'=>'Está completamente seguro? Perderá permanentemente esta información.',
                                'method'=>'post',
                            ],
                        ]);
                    },
                    'oferta'=>function ($url,$model){
                        return Html::a('<span class="fas fa-address-book"><span',$url,[
                            'title'=>Yii::t('app','equipos'),
                        ]);
                    },
                ],
                'urlCreator'=>function($action,$model,$key,$index){

                    if($action==='oferta'){
                        $url ='index.php?r=equipos/create&id='.$model->idsistemasIntalados;
                        return $url;
                    }
                    if($action==='view'){
                        $url ='index.php?r=sistemasintalados/view&id='.$model->idsistemasIntalados;
                        return $url;
                    }
                    if($action==='update'){
                        $url ='index.php?r=sistemasintalados/update&id='.$model->idsistemasIntalados;
                        return $url;
                    }
                    if($action==='delete'){
                        $url ='index.php?r=sistemasintalados/delete&id='.$model->idsistemasIntalados;
                        return $url;
                    }


                }
            ],


        ],
    ]); ?>
</div>

