<?php

use app\models\Cliente;
use app\models\Sistemaseguridadelectronica;
use app\models\Sistemasfijosextincion;
use app\models\Sistemasintalados;
use app\models\Clasificarentidad;

use app\models\Sistemasproteccionrayos;
use app\models\Tiposistemaseguridad;
use app\models\Ueb;
use kartik\select2\Select2;
use yii\bootstrap4\Alert;
use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\web\View;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\models\Ofertacomercial */
/* @var $form yii\widgets\ActiveForm */
//$modelSistemas=new Clasificarentidad();
$request=Yii::$app->request;
$id=$request->get('id');
$prueba=new Sistemasintalados();
$modelSistemas=$prueba->comboidCla($id);
$correcto=new Clasificarentidad();


$cliente=new Cliente();
$proCliente=$cliente->buscarProvincia($id);






?>

<div class="ofertacomercial-form">
    <div class="card">
        <div class="card-header card-header-warning">
            <h4 class="card-title"><?=$this->title?></h4>
            <p class="card-category">Registro de Ofertas Comerciales</p>
        </div>
        <div class="card-body" style="padding: 15px">
            <div class="p-3">
                <?= yii\bootstrap4\Alert::widget(
                    [
                        'options' => [
                            'class' => 'alert-info alert-dismissible',
                        ],
                        'body' => Yii::t('usuario', 'Debe llenar todos los Campos, Gracias'),
                    ]
                ) ?>
                <?php $form = ActiveForm::begin([
                    'enableAjaxValidation'=>true,
                    'enableClientValidation'=>true,
                ]); ?>




                <?= $form->field($model, 'ueb_id')->widget(Select2::classname(), [
                    'data' => Ueb::comboPro($proCliente['provincia_id']),
                    'options' => ['placeholder' => 'Seleccione ...', ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]); ?>

                <?= $form->field($model, 'numeroDoc')->textInput() ?>
                <?= $form->field($model,'fechaVencimiento')->widget(DatePicker::className(),[
                    'dateFormat'=>'php:y-m-d',
                    'clientOptions' => [
                        //'defaultDate' => '2014-01-01',


                    ],
                    'options'=>['class'=>'form-control'],
                ]) ?>



                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Sistema de Seguridad</th>
                        <th scope="col">Clasificación</th>
                        <th scope="col">Precio MN</th>
                        <th scope="col">Precio CUC</th>


                    </tr>

                    </thead>

                    <?php foreach ($modelSistemas as $modelo){

                    $nombreSistema=\app\models\Tiposistemaseguridad::find()->where(['id'=>$modelo['tipoSistemaSeguridad_id']])->one();
                    $clasificar= \app\models\Clasificarentidad::find()->where(['id'=>$modelo['clasificarentidad_id']])->one();

                            ?>




                    <tr>
                        <th scope="row">1</th>

                        <td><?php echo $nombreSistema['nombre']?></td>
                        <td><?php echo $modelo['clasificacion']?></td>
                        <td><?php echo $clasificar['precioMN']?></td>
                        <td><?php echo $clasificar['precioCUC']?></td>



                    </tr>


                  <?php  }?>


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
