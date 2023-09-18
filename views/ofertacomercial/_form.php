<?php

use app\models\Brigada;
use app\models\Cliente;
use app\models\Tiposistemaseguridad;
use app\models\Ueb;
use kartik\select2\Select2;
use yii\bootstrap4\Alert;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kidzen\dynamicform\DynamicFormWidget;
use yii\jui\DatePicker;


use app\models\Ofertaitems;

/* @var $this yii\web\View */
/* @var $model app\models\Ofertacomercial */
/* @var $form yii\widgets\ActiveForm */

$request=Yii::$app->request;
$id=$request->get('id');

$cliente=new Cliente();
$idUser=Yii::$app->user->id;
$idProvincia= \app\models\Profile::find()->where(['user_id'=>$idUser])->one();
$proCliente=$cliente->buscarProvincia($idProvincia['location']);


?>


<div class="col-md-10" style="margin-left: 100px">

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
            'id' => 'dynamic-form',
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

    <?= $form->field($model, 'numeroDoc')->textInput(['maxlength' => 10]) ?>

                <?= $form->field($model,'fechaVencimiento')->widget(DatePicker::className(),[
                    'dateFormat'=>'php:y-m-d',
                    'clientOptions' => [
                        //'defaultDate' => '2014-01-01',


                    ],
                    'options'=>['class'=>'form-control'],
                ]) ?>



<div class="col-md-5" style="margin-left: 220px;">

    <div class="content" style="">
        <div class="panel panel-default">
            <div class="panel-heading"><h4><i class="fa fa-fire-extinguisher"></i> Items de Ofertas</h4></div>
            <div class="panel-body">
                <?php DynamicFormWidget::begin([
                    'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                    'widgetBody' => '.container-items', // required: css class selector
                    'widgetItem' => '.item', // required: css class
                    'limit' => 10, // the maximum times, an element can be cloned (default 999)
                    'min' => 1, // 0 or 1 (default 1)
                    'insertButton' => '.add-item', // css class
                    'deleteButton' => '.remove-item', // css class
                    'model' => $modelsItems[]=new Ofertaitems(),
                    'formId' => 'dynamic-form',
                    'formFields' => [
                        'descripcion',
                        'clasificacion',
                        //'cantXano',
                       // 'precioMN',
                       // 'precioCUC',

                    ],
                ]); ?>

                <div class="container-items"><!-- widgetContainer -->
                    <?php foreach ($modelsItems as $i => $modelsItems): ?>

                        <div class="item panel panel-default"><!-- widgetBody -->
                            <div class="panel-heading">
                                <h3 class="panel-title pull-left">Items Comerciales</h3>
                                <div class="pull-left">
                                    <button type="button" class="add-item btn btn-success btn-xs"><i class="fa fa-plus"></i></button>
                                    <button type="button" class="remove-item btn btn-danger btn-xs"><i class="fa fa-minus"></i></button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="panel-body">
                                <?php
                                // necessary for update action.
                                if (! $modelsItems->isNewRecord) {
                                    echo Html::activeHiddenInput($modelsItems, "[{$i}]id");
                                }
                                ?>


                                    <div class="">
                                <?= $form->field($modelsItems, "[{$i}]descripcion")->widget(Select2::classname(), [
                                    'data' => Tiposistemaseguridad::combo(),

                                    'options' => ['placeholder' => 'Seleccione ...',

                                        ],
                                    'pluginOptions' => [
                                        'allowClear' => true,

                                    ],
                                ]); ?>
                                    </div>


                                    <div class="">




                                        <?= $form->field($modelsItems, "[{$i}]clasificacion")->widget(Select2::classname(), [
                                            'data' => \app\models\Clasificarentidad::combo(),
                                            'options' => ['placeholder' => 'Seleccione ...',
                                                'class'=>'row',
                                                ],
                                            'pluginOptions' => [
                                                'allowClear' => true
                                            ],
                                        ]); ?>
                                    </div>








                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php DynamicFormWidget::end(); ?>
            </div>


        </div>
    </div>
</div>
    <div class="form-group" style="float: right">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>


</div>
