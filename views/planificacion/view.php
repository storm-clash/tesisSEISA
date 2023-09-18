<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Planificacion */

//$this->title = $model->idplanificacion;
//$this->params['breadcrumbs'][] = ['label' => 'Planificacions', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="planificacion-view">
    <div class="card">
        <div class="card-header card-header-warning">
            <h4 class="card-title"><?=$this->title?></h4>
            <p class="card-category">Registro de Planificaciones</p>
        </div>
        <div class="card-body" style="padding: 15px">
            <div class="p-3">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->idplanificacion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Atras', ['index'], ['class' => 'btn btn-danger'])?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'idplanificacion',
           // 'fecha',
            [
                'attribute'=>'fecha',
                'label'=>'Fecha de la Planificación',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
            //'sistemasIntalados_idsistemasIntalados',
            [
                'attribute'=>'sistemasIntaladosIdsistemasIntalados.tipoSistemaSeguridad.nombre',
                'label'=>'Sistema de Seguridad',
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
