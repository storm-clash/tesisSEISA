<?php

use app\models\Ofertaitems;
use app\models\Planificacion;
use app\models\Sistemasintalados;
use app\models\Tiposistemaseguridad;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Planificacion */
/* @var $form yii\widgets\ActiveForm */
$request=Yii::$app->request;
$id=$request->get('id');

$oferta=new \app\models\Ofertacomercial();
$ofertaComercial=$oferta->buscarNombreCliente($id);





?>


<div class="planificacion-form">
    <div id="master">
        <div class="card">
            <div class="card-header card-header-warning">
                <h4 class="card-title"><?=$this->title?></h4>
                <p class="card-category">Planificación de los Mantenimientos</p>
            </div>
            <div class="card-body" style="padding: 15px">
                <div class="p-3">

                    <?php $form = ActiveForm::begin(); ?>





                    <?= $form->field($model, 'sistemasIntalados_idsistemasIntalados')->widget(Select2::classname(), [
                        'data' => \app\models\Ofertaitems::comboPun($ofertaComercial['id']),
                        'options' => ['placeholder' => 'Seleccione ...',
                            'id'=>'select',
                            'name'=>'sistemas',

                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]); ?>








                    <?php

                    $list=[];
                    $ofert =Ofertaitems::find()->where(['id'=>$ofertaComercial['id']])->one();

                    $countBrigadas= Ofertaitems::find()
                        ->where(['id'=>$ofertaComercial['id']])
                        ->count();

                    $finalAno=date('y-m-d',strtotime('last day of December'));



                    if($countBrigadas>0){
                        $fecha=date('y-m-d');
                        $fechaInicial=date('y-m-d',strtotime($fecha."+15 days"));
                        $fechaRecorrer=$fechaInicial;
                        if($fechaInicial<=$finalAno && $ofert['descripcion']==='Sistema Automático de Detección de Incendios'){
                            $list[]=$fechaInicial;

                            while (date('y-m-d',strtotime($fechaRecorrer."+3 month"))<=$finalAno){
                                $fechaRecorrer=date('y-m-d',strtotime($fechaRecorrer."+3 month"));
                                $list[]=$fechaRecorrer;
                            }




                        }else if($fechaInicial<=$finalAno){
                            $list[]=$fechaInicial;
                            while (date('y-m-d',strtotime($fechaRecorrer."+6 month"))<=$finalAno){
                                $fechaRecorrer=date('y-m-d',strtotime($fechaRecorrer."+6 month"));
                                $list[]=$fechaRecorrer;
                            }

                        }



                    }


                    ?>





                    <table class="table" id="resultados">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Fecha Óptima</th>
                            <th scope="col">Fecha Planificada</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $lon=count($list);
                        for($i=0;$i<$lon;$i++){
                            echo $list[$i];
                            echo "<br>";

                        }


                        ?>



                        <tr>
                            <th scope="row" id="fecha1">1</th>
                            <td>Mark</td>
                            <td></td>
                            <td><?= $form->field($model,'fecha')->widget(DatePicker::className(),[
                                    'value'=>date('y-m-d'),

                                    'dateFormat'=>'php:y-m-d',
                                    'clientOptions' => [
                                        'value'=>date('y-m-d'),




                                    ],

                                    'options'=>[
                                        'class'=>'form-control',
                                        'placeholder'=>'Seleccione ...',
                                        'showOn'=>'button',
                                        'autoSize'=>true,

                                    ],



                                ]); ?></td>
                        </tr>
                        <tr>
                            <th scope="row" id="fecha2">2</th>
                            <td>Jacob</td>
                            <td></td>
                            <td> <?= $form->field($model,'fecha1')->widget(DatePicker::className(),[
                                    'dateFormat'=>'php:y-m-d',
                                    'clientOptions' => [
                                        //'defaultDate' => '2014-01-01',


                                    ],
                                    'options'=>['class'=>'form-control'],
                                ]) ?></td></td>
                        </tr>
                        <tr>
                            <th scope="row" id="fecha3">3</th>
                            <td>Larry</td>
                            <td></td>
                            <td>  <?= $form->field($model,'fecha2')->widget(DatePicker::className(),[
                                    'dateFormat'=>'php:y-m-d',
                                    'clientOptions' => [
                                        //'defaultDate' => '2014-01-01',


                                    ],
                                    'options'=>['class'=>'form-control'],
                                ]) ?></td>
                        </tr>
                        <tr>
                            <th scope="row" id="">4</th>
                            <td>Mark</td>
                            <td></td>
                            <td><?= $form->field($model,'fecha3')->widget(DatePicker::className(),[
                                    'dateFormat'=>'php:y-m-d',
                                    'clientOptions' => [
                                        //'defaultDate' => '2014-01-01',


                                    ],
                                    'options'=>['class'=>'form-control'],
                                ]) ?></td>

                        </tr>


                        </tbody>
                    </table>








                    <div class="form-group">
                        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
    </div>
</div>

