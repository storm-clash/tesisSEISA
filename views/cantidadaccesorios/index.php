<?php

use kartik\export\ExportMenu;
use yii\bootstrap4\Modal;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CantidadaccesoriosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Cantidad de Accesorios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cantidadaccesorios-index">
    <div class="card">
        <div class="card-header card-header-warning">
            <h4 class="card-title"><?=$this->title?></h4>
            <p class="card-category">Registro de Parámetro de Clasificación: Cantidad de Accesorios</p>
        </div>
        <div class="card-body" style="padding: 15px">
            <div class="p-3">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Crear Cantidad de Accesorios', [
            'value'=>Url::to('index.php?r=cantidadaccesorios/create'),
            'class' => 'btn btn-warning',
            'id'=>'BtnModalId',
            'data-toggle'=>'modal',
            'data-target'=>'#your-modal',
        ]) ?>
    </p>
    <?php
    Modal::begin(
        [
            //'header'=>'<h4>Cantidad de Accesorios</h4>',
            'title'=>'<h4>Cantidad de Accesorios</h4>',
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
        'nombre',
        'niveles',
        'ponderacion',
        'puntuacion',
        'accesorios',
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
            //'nombre',
            [
                'attribute'=>'nombre',
                //'label'=>'Ponderación',
                'contentOptions'=>['style'=>'text-align:center']
            ],
            //'niveles',
            [
                'attribute'=>'niveles',
                //'label'=>'Ponderación',
                'contentOptions'=>['style'=>'text-align:center']
            ],
            //'ponderacion',
            [
                'attribute'=>'ponderacion',
                'label'=>'Ponderación',
                'contentOptions'=>['style'=>'text-align:center']
            ],
           // 'puntuacion',
            [
                'attribute'=>'puntuacion',
                'label'=>'Puntuación',
                'contentOptions'=>['style'=>'text-align:center']
            ],
           // 'accesorios',


            ['class' => 'yii\grid\ActionColumn',
                'header'=>'Acciones',
                'headerOptions'=>['style'=>'color:#9c27b0'],
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
