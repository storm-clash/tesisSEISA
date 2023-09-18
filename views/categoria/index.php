<?php

use kartik\export\ExportMenu;
use yii\bootstrap4\Modal;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategoriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Categorias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoria-index">
    <div class="card">
        <div class="card-header card-header-warning">
            <h4 class="card-title"><?=$this->title?></h4>
            <p class="card-category">Registro de Categorias de Brigadas de Mantenimiento</p>
        </div>
        <div class="card-body" style="padding: 15px">
            <div class="p-3">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <p>
                    <?= Html::button('Registrar Categoria de las Brigadas de Mantenimiento', [
                        'value'=>Url::to('index.php?r=categoria/create'),
                        'class' => 'btn btn-warning',
                        'id'=>'BtnModalId',
                        'data-toggle'=>'modal',
                        'data-target'=>'#your-modal',
                    ]) ?>
                </p>
                <?php
                Modal::begin(
                    [
                        'title'=>'<h4>Categoria de las brigadas de Mantenimiento</h4>',
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
