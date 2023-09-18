<?php

use kartik\export\ExportMenu;
use yii\bootstrap4\Modal;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AlturamontajeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Altura del Montaje';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alturamontaje-index">
    <div class="card">
        <div class="card-header card-header-warning">
            <h4 class="card-title"><?=$this->title?></h4>
            <p class="card-category">Registro de Parámetro de Clasificación: Altura del Montaje</p>
        </div>
        <div class="card-body" style="padding: 15px">
            <div class="p-3">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Crear Altura del Montaje', [
            'value'=>Url::to('http://mantenimiento.seisa/index.php/alturamontaje/create'),
            'class' => 'btn btn-warning',
            'id'=>'BtnModalId',
            'data-toggle'=>'modal',
            'data-target'=>'#your-modal',
        ]) ?>
    </p>
    <?php
    Modal::begin(
        [
              'title'=>'<h4>Altura del Montaje</h4>',
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
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            //'nombre',
            [
                'attribute'=>'nombre',
                //'label'=>'Ponderación',
                'headerOptions'=>['style'=>'text-align:center'],
                'contentOptions'=>['style'=>'text-align:center']
            ],
          //  'niveles',
            [
                'attribute'=>'niveles',
                //'label'=>'Ponderación',
                'headerOptions'=>['style'=>'text-align:center'],
                'contentOptions'=>['style'=>'text-align:center']
            ],
           // 'ponderacion',
            [
                'attribute'=>'ponderacion',
                'label'=>'Ponderación',
                'headerOptions'=>['style'=>'text-align:center'],
                'contentOptions'=>['style'=>'text-align:center']
            ],
          //  'puntuacion',
            [
                'attribute'=>'puntuacion',
                'label'=>'Puntuación',
                'headerOptions'=>['style'=>'text-align:center'],
                'contentOptions'=>['style'=>'text-align:center']
            ],
           // 'altura',

            ['class' => 'yii\grid\ActionColumn',
                'header'=>'Acciones',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
                'template'=>'{view}{update}',
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
