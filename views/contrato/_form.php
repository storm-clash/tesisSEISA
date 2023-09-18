<?php

use app\models\Formaspago;
use app\models\Cliente;
use kartik\export\ExportMenu;
use kartik\select2\Select2;
use yii\bootstrap4\Alert;
use yii\bootstrap4\Modal;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Ofertaitems;
use yii\helpers\Url;
use kartik\file\FileInput;
//use kartik\export\ExportMenu;


/* @var $this yii\web\View */
/* @var $model app\models\Contrato */
/* @var $form yii\widgets\ActiveForm */
//Recoger el id que paso por GET
$request=Yii::$app->request;
$id=$request->get('id');
//Buscar el nombre del cliente y calcular el monto del contrato
$cliente= new Cliente();
$array=$cliente->buscarNombrexId($id);

/*$ofertaComercial= \app\models\Ofertacomercial::find()->where(['cliente_idcliente'=>$id])->one();

$items=new Ofertaitems();
$monto=$items->Monto($ofertaComercial['id']);*/

$sum=0;

    $sistema=\app\models\Sistemasintalados::find()->where(['cliente_idcliente'=>$id])->all();


    foreach ($sistema as $sis){
        $clasi= \app\models\Clasificarentidad::find()->where(['id'=>$sis['clasificarentidad_id']])->all();
        foreach ($clasi as $re){
            $sum+= floatval($re['precioMN']);

        }



}
?>


<div class="contrato-form">
    <div id="master">
        <div class="card">
            <div class="card-header card-header-warning">
                <h4 class="card-title"><?=$this->title?></h4>
                <p class="card-category">Registro de Contratos de Sistemas de Seguridad</p>
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
    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
 <div class="col-md-12">

 <div class="col-md-6" style="float: left">
     <?= $form->field($model, 'cliente_idcliente')->textInput(['class'=>'form-control class-content-title_series','disabled'=>true,'value'=>$array['nombreCliente']]) ?>



    <?= $form->field($model, 'monto')->textInput(['class'=>'form-control class-content-title_series','disabled'=>true,'value'=>$sum])  ?>

    <?= $form->field($model, 'dias')->textInput(['maxlength' => 10]) ?>


       <div class="form-group">

           <div class="form-row">
              <div >
        <?= $form->field($model, 'firma')->widget(FileInput::classname(), [
            'options' => [
                 'accept' => 'image/*',
                'language'=>"es",
                'attribute' => 'attachment_1',
            ],
            'pluginOptions'=>[
                    'browseLabel'=>'Buscar',
                'removeLabel'=>'Remover',
                'uploadLabel'=>'Subir',
                'captionLabel'=>"",
                'removeClass'=>'btn btn-danger',
                'showUpload'=>false,
                // 'allowedFileExtensions'=>['pdf'],
                'showCaption'=>false,
                'showClose'=>false,
                'dropZoneEnabled'=>false,
                'browseIcon'=>'<i class="fas fa-camera-retro"></i>',
                'maxFileSize'=>1024,
                'msgSizeTooLarge'=>'File"{name}"(<b>{size}kb</b>) exceeds maximun allowed size<b>{maxSize} KB</b>.',


            ],
        ]) ;?>
           </div>

        </div>
       </div>

   </div>
 <div class="col-md-6" style="float: right">


     <?= $form->field($model, 'formasPago_id')->widget(Select2::classname(), [
         'data' => Formaspago::combo(),
         'options' => ['placeholder' => 'Seleccione ...'],
         'pluginOptions' => [
             'allowClear' => true
         ],
     ]); ?>

         <div class="">

                 <?= $form->field($model, 'contrato')->widget(FileInput::classname(), [
                     'options' => [
                             'accept' => 'image/*',
                         'attribute' => 'attachment_1',
                     ],
                     'pluginOptions'=>[
                         'browseLabel'=>'Buscar',
                         'removeLabel'=>'Remover',
                         'placeholder'=>'seleccione',
                         'uploadLabel'=>'Subir',
                         'captionLabel'=>'',
                         'removeClass'=>'btn btn-danger',
                         'showUpload'=>false,
                         'showCaption'=>false,
                         'showClose'=>false,
                         'dropZoneEnabled'=>false,
                         'browseIcon'=>'<i class="fas fa-camera-retro"></i>',
                         'maxFileSize'=>1024,
                         'msgSizeTooLarge'=>'File"{name}"(<b>{size}kb</b>) exceeds maximun allowed size<b>{maxSize} KB</b>.',


                     ],
                 ]) ;?>



         </div>


     </div>






    <div class="form-group" style="float: right">

       <?= Html::submitButton('Guardar', [
                            'class' => 'btn btn-success',
                            //'title'=>Yii::t('app','eliminar'),
                           // 'class'=>'',
                           /* 'data'=>[
                                'class'=>'alert alert-success',
                                'confirm'=>'Está completamente seguro? Se registrará automáticamente la planificación del Mantenimiento a los Sistemas de Seguridad de este Cliente
                                . Para una asignación manual accione " REGISTRAR PLANIFICACIÓN DE MANTENIMIENTO".',
                                'method'=>'post',
                            ],*/

                        ]);?>
    </div>

 </div>

    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
    </div>


</div>
