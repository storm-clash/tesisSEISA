<?php

use app\models\ClienteSearch;
use app\models\SistemasintaladosSearch;
//use kartik\export\ExportMenu;
use yii\bootstrap\Modal;
use yii\bootstrap4\Alert;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clientes';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="client-index">

    <div class="card">
        <div class="card-header card-header-warning">
            <h4 class="card-title"><?=$this->title?></h4>
            <p class="card-category">Registro de Clientes</p>
        </div>

        <div class="card-body" style="padding: 15px">
            <div class="p-3">

                <p>
                    <?= Html::a('Crear Registro de Cliente', ['create'], ['class' => 'btn btn-warning']) ?>
                </p>


                <?= GridView::widget([


                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,

                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        // 'idcliente',
                        //'fechaAct',
                        /* [
                             'attribute'=>'fechaAct',
                             'contentOptions'=>['style'=>'text-align:center']
                         ],*/
                        //'codigoREEUP',
                        [
                            'attribute'=>'codigoREEUP',
                            'contentOptions'=>['style'=>'text-align:center']
                        ],
                        //'nombreCliente',
                        [
                            'attribute'=>'nombreCliente',
                            'contentOptions'=>['style'=>'text-align:center']
                        ],
                        //'organismo',
                        [
                            'attribute'=>'organismo',
                            'contentOptions'=>['style'=>'text-align:center']
                        ],
                        //'telefono',
                        [
                            'attribute'=>'telefono',
                            'contentOptions'=>['style'=>'text-align:center']
                        ],
                        // 'correo',
                        [
                            'attribute'=>'correo',
                            'contentOptions'=>['style'=>'text-align:center']
                            //'header'=>[]
                        ],
                        //  'direccion',
                        /*  [
                              'attribute'=>'direccion',
                              'contentOptions'=>['style'=>'text-align:center']
                          ],*/
                        //'cuentaBancariaCUP',
                        //'agenciaBanCup',
                        //'direcAgenciaCup',
                        //'cuentaBanCUC',
                        //'agenciaBanCUC',
                        //'direccionAgentBanCuc',
                        //'provincia_id',


                        ['class' => 'yii\grid\ActionColumn',

                        ],
                    ],
                    'options'=>['class'=>'grid-view container'],
                    'tableOptions'=>['class'=>'table table-hover'],

                ]); ?>

            </div>
        </div>
    </div>



</div>


