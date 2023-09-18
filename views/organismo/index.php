<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrganismoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Organismos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organismo-index">

    <div class="card">
        <div class="card-header card-header-warning">
            <h4 class="card-title"><?=$this->title?></h4>
            <p class="card-category">Registro de Organismos</p>
        </div>
        <div class="card-body" style="padding: 15px">
            <div class="p-3">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Organismo', ['create'], ['class' => 'btn btn-warning']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
       /* 'rowOptions'=>function($model){
            if($model->nombre== 'PCC')
            {
                return ['class'=>'success'];

            }else return ['class'=>'warning'];
        },*/
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'idorganismo',
           // 'nombre',
            [
                'attribute'=>'nombre',
                'label'=>'Cargo',
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
                'template'=>'{view}{update}',
                'buttons'=>[
                    'view'=>function ($url,$model){
                        return Html::a('<span class="fas fa-eye fa-lg"><span',['view','id'=>$model->idorganismo],[
                            'title'=>Yii::t('app','Ver'),
                        ]);
                    },
                    'update'=>function ($url,$model){
                        return Html::a('<span class="fas fa-pencil-alt fa-lg"><span',$url,[
                            'title'=>Yii::t('app','Editar'),
                        ]);
                    },






                ],
                'urlCreator'=>function($action,$model,$key,$index){



                     $cliente=\app\models\Cliente::find()->where(['organismo_idorganismo'=>$model->idorganismo])->one();
                    if ($action==='update' && $cliente==null ){
                        $url ='http://mantenimiento.seisa/index.php/organismo/update?id='.$model->idorganismo;
                        return $url;
                    }







                }




            ],
        ],
    ]); ?>
            </div>
        </div>
    </div>
</div>
