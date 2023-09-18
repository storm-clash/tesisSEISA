<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cantidadaccesorios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cantidadaccesorios-form">
    <div class="card">
        <div class="card-header card-header-warning">
            <h4 class="card-title"><?=$this->title?></h4>
            <p class="card-category">Registro de Sistemas de Seguridad</p>
        </div>
        <div class="card-body" style="padding: 15px">
            <div class="p-3">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['class'=>'form-control class-content-title_series','disabled'=>true,'value'=>'Cantidad de Accesorios'])?>

    <?= $form->field($model, 'niveles')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ponderacion')->textInput() ?>

    <?= $form->field($model, 'puntuacion')->textInput() ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>


            </div>
        </div>
    </div>
</div>
