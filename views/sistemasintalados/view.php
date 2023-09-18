<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Sistemasintalados */

$this->title = $model->idsistemasIntalados;
$this->params['breadcrumbs'][] = ['label' => 'Sistemasintalados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sistemasintalados-view">

    <div class="card">
        <div class="card-header card-header-warning">
            <h4 class="card-title"><?=$this->title?></h4>
            <p class="card-category">Registro de las Instalaciones de los Sistemas de Seguridad</p>
        </div>
        <div class="card-body" style="padding: 15px">
            <div class="p-3">

    <p>
        <?php

        $contrato= new \app\models\Contrato();



        ?>
        <?= Html::a('Modificar', ['update', 'id' => $model->idsistemasIntalados], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Atras', ['index'], ['class' => 'btn btn-danger'])?>


    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'idsistemasIntalados',
           /* [
                'attribute'=>'idsistemasIntalados',
               // 'label'=>'Nombre del Sistema',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],*/
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
           // 'local',
            [
                'attribute'=>'local',
                'label'=>'Local donde está instalado',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
           // 'clasificacion',
            [
                'attribute'=>'clasificacion',
               // 'label'=>'Nombre del Sistema',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
           // 'clasificarentidad_id',
           /* [
                'attribute'=>'clasificarentidad_id',
               // 'label'=>'Nombre del Sistema',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],*/
        ],
    ]) ?>
            </div>
        </div>
    </div>
</div>
</div>
