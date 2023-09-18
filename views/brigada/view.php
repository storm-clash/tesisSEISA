<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Brigada */

$this->title = $model->idbrigada;
$this->params['breadcrumbs'][] = ['label' => 'Brigadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="brigada-view">
    <div class="card">
        <div class="card-header card-header-warning">
            <h4 class="card-title"><?=$this->title?></h4>
            <p class="card-category">Registro de Brigadas</p>
        </div>
        <div class="card-body" style="padding: 15px">
            <div class="p-3">





    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->idbrigada], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Atras', ['index'], ['class' => 'btn btn-danger'])?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'idbrigada',

           // 'nombre',
            [
                'attribute'=>'nombre',
                //'label'=>'Nombre de la Provincia',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
           // 'cantHombres',
            [
                'attribute'=>'cantHombres',
                //'label'=>'Nombre de la Provincia',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
           // 'horasTrabajadas',
            [
                'attribute'=>'horasTrabajadas',
                //'label'=>'Nombre de la Provincia',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
           // 'horasPlanificadas',
            [
                'attribute'=>'horasPlanificadas',
                //'label'=>'Nombre de la Provincia',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
            //'idJefeBrigada',
            [
                'attribute'=>'idJefeBrigada',
                'value'=>jefeBrigada($model),
                //'label'=>'Nombre de la Provincia',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
            //'categoria_id',
            [
                'attribute'=>'categoria.nombre',
                //'label'=>'Nombre de la Provincia',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
           // 'ueb_id',
            [
                'attribute'=>'ueb.nombre',
                //'label'=>'Nombre de la Provincia',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
        ],
    ]) ?>
                <?php
                function jefeBrigada($model){
                    $mo=[];
                    $sum=\app\models\User::find()->where(['id'=>$model['idJefeBrigada']])->one();
                    if(empty($sum)==false){
                        $mo[]=$sum;
                    }
                    return $sum['username'];

                    }


                ?>
            </div>
        </div>
    </div>
</div>
