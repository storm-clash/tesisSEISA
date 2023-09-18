<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Registromantenimientos */

$this->title = $model->idregistroMantenimientos;
$this->params['breadcrumbs'][] = ['label' => 'Registromantenimientos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="registromantenimientos-view">

    <div class="card">
        <div class="card-header card-header-warning">
            <h4 class="card-title"><?=$this->title?></h4>
            <p class="card-category">Registro de Mantenimientos</p>
        </div>
        <div class="card-body" style="padding: 15px">
            <div class="p-3">

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->idregistroMantenimientos], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Atras', ['index'], ['class' => 'btn btn-danger'])?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'idregistroMantenimientos',
            [
                'attribute'=>'idregistroMantenimientos',
                // 'label'=>'Fecha',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
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
            // 'incidencias',
            [
                'attribute'=>'incidencias',
                // 'label'=>'Fecha',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
            //'cliente_idcliente',
            [
                'attribute'=>'clienteIdcliente.nombreCliente',
                'label'=>'Nombre del Cliente',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
            //'brigada_idbrigada',
            [
                'attribute'=>'brigadaIdbrigada.nombre',
                'label'=>'Nombre de la Brigada',
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
