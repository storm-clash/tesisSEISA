<?php

use app\models\Tiposistemaseguridad;
use app\models\Tipoparametro;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Clasificarentidad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clasificarentidad-form">
    <div class="card">
        <div class="card-header card-header-warning">
            <h4 class="card-title"><?=$this->title?></h4>
            <p class="card-category">Registro de Sistemas de Seguridad</p>
        </div>
        <div class="card-body" style="padding: 15px">
            <div class="p-3">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rangoInicial')->textInput() ?>

    <?= $form->field($model, 'rangoFinal')->textInput() ?>

    <?= $form->field($model, 'precioMN')->textInput() ?>

    <?= $form->field($model, 'precioCUC')->textInput() ?>

    <?= $form->field($model, 'cantHombre')->textInput() ?>

    <?= $form->field($model, 'cantHoras')->textInput() ?>


    <?= $form->field($model, 'tipoParametro_id')->widget(Select2::classname(), [
        'data' => Tipoparametro::combo(),
        'options' => ['placeholder' => 'Seleccione ...',],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>


    <?= $form->field($model, 'tipoSistemaSeguridad_id')->widget(Select2::classname(), [
        'data' => Tiposistemaseguridad::combo(),
        'options' => ['placeholder' => 'Seleccione ...',],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>
