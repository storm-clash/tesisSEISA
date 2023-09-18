<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Sistemasfijosextincion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sistemasfijosextincion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sistemasIntalados_idsistemasIntalados')->textInput() ?>

    <?= $form->field($model, 'obstruccionEquipo_id')->textInput() ?>

    <?= $form->field($model, 'cantidadAccesorios_id')->textInput() ?>

    <?= $form->field($model, 'cantidadSistemasFijos_id')->textInput() ?>

    <?= $form->field($model, 'alturaMontaje_id')->textInput() ?>

    <?= $form->field($model, 'complejidadSistFijos_id')->textInput() ?>

    <?= $form->field($model, 'condAmbSistFijos_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
