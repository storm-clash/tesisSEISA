<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Clasificarentidad */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Clasificarentidads', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="clasificarentidad-view">

    <div class="card">
        <div class="card-header card-header-warning">
            <h4 class="card-title"><?=$this->title?></h4>
            <p class="card-category">Registro de Clasificación de Instalaciones</p>
        </div>
        <div class="card-body" style="padding: 15px">
            <div class="p-3">

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id',
            [
                'attribute'=>'id',
                //'label'=>'Nombre de la Provincia',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
           // 'rangoInicial',
            [
                'attribute'=>'rangoInicial',
               // 'label'=>'Nombre de la Provincia',
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
               // 'label'=>'Nombre de la Provincia',
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
                //'label'=>'Nombre de la Provincia',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
            //'precioCUC',
            [
                'attribute'=>'precioCUC',
               // 'label'=>'Nombre de la Provincia',
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
               // 'label'=>'Nombre de la Provincia',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
            //'cantHoras',
            [
                'attribute'=>'cantHoras',
               // 'label'=>'Nombre de la Provincia',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
            //'tipoParametro_id',
            [
                'attribute'=>'tipoParametro.nombre',
                'label'=>'Complejidad',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
            //'tipoSistemaSeguridad_id',
            [
                'attribute'=>'tipoSistemaSeguridad.nombre',
                'label'=>'Nombre del Sistema',
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
            </div>
        </div>
    </div>
</div>
</div>
