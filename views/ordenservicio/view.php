<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ordenservicio */

//$this->title = $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Ordenservicios', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ordenservicio-view">
    <div class="card">
        <div class="card-header card-header-warning">
            <h4 class="card-title"><?=$this->title?></h4>
            <p class="card-category">Registro de Órdenes de Servicio</p>
        </div>
        <div class="card-body" style="padding: 15px">
            <div class="p-3">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id',
          //  'cliente_idcliente',
            [
                'attribute'=>'clienteIdcliente.nombreCliente',
                //'label'=>'Fecha',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
           // 'brigada_idbrigada',
            [
                'attribute'=>'brigadaIdbrigada.nombre',
                //'label'=>'Fecha',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
            //'fecha',
            [
                'attribute'=>'fecha',
                //'label'=>'Fecha',
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

