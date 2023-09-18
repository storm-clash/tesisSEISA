<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cliente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cliente-form">
    <div class="card">
        <div class="card-header card-header-warning">
            <h4 class="card-title"><?=$this->title?></h4>
            <p class="card-category">Registro de Clientes de la entidad SEISA</p>

        </div>
        <div class="card-body" style="padding: 15px">
            <div class="p-3">

                <?= yii\bootstrap4\Alert::widget(
                [
                'options' => [
                'class' => 'alert-info alert-dismissible',
                ],
                'body' => Yii::t('usuario', 'Debe Llenar todos los campos, Gracias'),
                ]
                ) ?>

    <?php $form = ActiveForm::begin([
            'enableAjaxValidation'=>true,
            'enableClientValidation'=>true,
    ]); ?>

    <div class="col-md-12">



        <div class="col-md-6" style="float: left">


            <?= $form->field($model, 'codigoREEUP')->textInput(['maxlength' => 10,]) ?>

            <?= $form->field($model, 'nombreCliente')->textInput(['maxlength' => 20]) ?>

            <?= $form->field($model, 'telefono')->textInput(['maxlength' => 10]) ?>

            <?= $form->field($model, 'correo')->textInput(['maxlength' => 30,'placeholder'=>'name@example.com']) ?>

            <?= $form->field($model, 'direccion')->textInput(['maxlength' => 50]) ?>

            <?= $form->field($model, 'cuentaBancariaCUP')->textInput(['maxlength' => 16,'placeholder'=>'xxxx xxxx xxxx xxxx']) ?>
            <?= $form->field($model, 'agenciaBanCup')->textInput(['maxlength' => 15]) ?>



        </div>


        <div class="col-md-6" style="float: right">

            <?= $form->field($model, 'direcAgenciaCup')->textInput(['maxlength' => 50]) ?>


                    <?= $form->field($model, 'cuentaBanCUC')->textInput(['maxlength' => 16,'placeholder'=>'xxxx xxxx xxxx xxxx']) ?>

                    <?= $form->field($model, 'agenciaBanCUC')->textInput(['maxlength' => 20]) ?>

                    <?= $form->field($model, 'direccionAgentBanCuc')->textInput(['maxlength' => 50]) ?>







                    <?= $form->field($model, 'organismo_idorganismo')->widget(Select2::classname(), [
                        'data' => \app\models\Organismo::combo(),
                        'options' => ['placeholder' => 'Seleccione ...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]); ?>





        </div>

    </div>
    <div class="form-group" style="float: right">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        <?=
        Html::a('<span class="fas fa-question fa-lg"><span',['ayuda'],[
            'title'=>Yii::t('app','Ayuda'),
        ]);?>

    </div>

    <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>

</div>






