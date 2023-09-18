<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Contrato */

//$this->title = $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Contratos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="contrato-view">
    <div class="card">
        <div class="card-header card-header-warning">
            <h4 class="card-title"><?=$this->title?></h4>
            <p class="card-category">Contrato</p>
        </div>
        <div class="card-body" style="padding: 15px">
            <div class="p-3">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>

        <?= Html::a('Atras', ['index'], ['class' => 'btn btn-danger'])?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
           // 'clienteIdcliente.nombreCliente',
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
           // 'monto',
            [
                'attribute'=>'monto',
                'label'=>'Monto del Contrato',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
           // 'dias',
            [
                'attribute'=>'dias',
                'label'=>'Días para efectuar pago',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
           // 'firma',
            [
                'attribute'=>'firma',
                'value'=> Html::a(Html::img(Yii::getAlias('@web').'/'.$model->firma,['alt'=>'','class'=>'img-responsive','height'=>'100px','width'=>'100px'])),
                'format'=>['raw'],
                'label'=>'Firma del Contratante',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
            //'contrato',
            [
                'attribute'=>'contrato',
                'value'=> Html::a(Html::img(Yii::getAlias('@web').'/'.$model->contrato,['alt'=>'','class'=>'img-responsive','height'=>'100px','width'=>'100px'])),
                'format'=>['raw'],
                'label'=>'Contrato Copia Dura',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
           // 'formasPago.nombre',
            [
                'attribute'=>'formasPago.nombre',
                'label'=>'Forma de Pago Seleccionada',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
            //'estado',
            //'motivo',
        ],
    ]) ?>
            </div>
        </div>
    </div>
</div>
</div>
