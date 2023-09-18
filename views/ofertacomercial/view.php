<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ofertacomercial */

//$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ofertacomercials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ofertacomercial-view">

    <div class="card">
        <div class="card-header card-header-warning">
            <h4 class="card-title"><?=$this->title?></h4>
            <p class="card-category">Registro de Ofertas Comerciales</p>
        </div>
        <div class="card-body" style="padding: 15px">
            <div class="p-3">

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Atras', ['index'], ['class' => 'btn btn-danger'])?>
    </p>
                <?php
                $elaborado=\app\models\User::find()->where(['id'=>2])->one();
                $nombre=$elaborado['username'];
                ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          //  'id',

           // 'cliente_idcliente',
            [
                'attribute'=>'clienteIdcliente.nombreCliente',
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
               // 'label'=>'Nombre de la Provincia',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
          //  'numeroDoc',
            [
                'attribute'=>'numeroDoc',
                'label'=>'Número del Documento',
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
             //   'label'=>'Nombre de la Provincia',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
           // 'fechaVencimiento',
            [
                'attribute'=>'fechaVencimiento',
               // 'label'=>'Nombre de la Provincia',
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
           // 'elaborado',

            [
                'attribute'=>'elaborado',
               // 'label'=>'Nombre de la Provincia',
                'value'=> $nombre,
                'contentOptions'=>['style'=>'text-align:center'],
                'headerOptions'=>[
                    'style'=>[
                        'color'=>'#9c27b0',
                        'text-align'=>'center',
                    ]
                ],
            ],
           // 'cargo',
            [
                'attribute'=>'cargo',
               // 'label'=>'Nombre de la Provincia',
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
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Sistema de Seguridad</th>
                        <th scope="col">Clasificación</th>
                        <th scope="col">Precio MN</th>
                        <th scope="col">Hombres Necesarios Para Mant.</th>
                        <th scope="col">Horas Necesarias</th>


                    </tr>
                    </thead>
                    <?php
                      $sistema=\app\models\Sistemasintalados::find()->where(['cliente_idcliente'=>$model->cliente_idcliente])->all();
                      foreach ($sistema as $sist){
                      $nombreSistema=\app\models\Tiposistemaseguridad::find()->where(['id'=>$sist['tipoSistemaSeguridad_id']])->one();
                      $clasificar= \app\models\Clasificarentidad::find()->where(['id'=>$sist['clasificarentidad_id']])->one();
                    ?>
                    <tr>
                        <th scope="row">1</th>

                        <td><?php echo $nombreSistema['nombre']?></td>
                        <td><?php echo $sist['clasificacion']?></td>
                        <td><?php echo $clasificar['precioMN']?></td>
                        <td><?php echo $clasificar['cantHombre']?></td>
                        <td><?php echo $clasificar['cantHoras']?></td>




                    </tr>
                <?Php }?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
