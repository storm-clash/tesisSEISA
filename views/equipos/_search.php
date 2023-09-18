<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EquiposSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idequipos') ?>

    <?= $form->field($model, 'nombreEquipo') ?>

    <?= $form->field($model, 'precioCosto') ?>

    <?= $form->field($model, 'precioIntalacion') ?>

    <?= $form->field($model, 'precioMantenimiento') ?>

    <?php // echo $form->field($model, 'sistemasIntalados_idsistemasIntalados') ?>

    <?php // echo $form->field($model, 'estado_id') ?>

    <?php // echo $form->field($model, 'cantidad') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
