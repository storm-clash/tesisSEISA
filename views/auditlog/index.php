<?php

use kartik\export\ExportMenu;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AuditlogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Auditlogs';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auditlog-index">
    <div class="card">
        <div class="card-header card-header-warning">
            <h4 class="card-title"><?=$this->title?></h4>
            <p class="card-category">Registro de Trazas</p>
        </div>

        <div class="card-body" style="padding: 15px">
            <div class="p-3">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                <?php

                $gridColumns=[
                    ['class'=>'yii\grid\SerialColumn'],
                    //'idcliente',
                    'fechaAct',
                    'codigoREEUP',
                    'nombreCliente',
                    'organismo.nombre',
                    ['class'=>'yii\grid\ActionColumn'],
                ];
                echo ExportMenu::widget([
                    'dataProvider'=>$dataProvider,
                    'columns'=>$gridColumns

                ]);
                ?>
            </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
           // 'model',
            [
                'attribute'=>'model',
                'label'=>'Modelo',

                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
            //'action',
            [
                'attribute'=>'action',
                'label'=>'Acción Realizada',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
           // 'old:ntext',
           // 'new:ntext',
            //'at',
            [
                'attribute'=>'at',
                'label'=>'Fecha',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
           // 'by',
            [
                'attribute'=>'by',
                'label'=>'Usuario',
                'value'=>'user.username',
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
                'contentOptions'=>['style'=>'display:block'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',

                    ]
                ],
                'template'=>'{view}{update}{delete}{oferta}{pdf}',
                'buttons'=>[
                    'view'=>function ($url,$model){
                        return Html::a('<span class="fas fa-eye fa-lg"><span',['view','id'=>$model->id],[
                            'title'=>Yii::t('app','Observar'),
                        ]);
                    },



                    'pdf'=>function ($url,$model){
                        return Html::a('<span class="fas fa-file-pdf fa-lg"><span',['createpdf','id'=>$model->id],[
                            'title'=>Yii::t('app','Generar PDF Contrato'),
                            'class'=>'',
                            'data'=>[
                                'confirm'=>'Está completamente seguro? Desea generar el PDF para este Registro.',
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
</div>
