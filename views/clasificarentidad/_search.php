<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClasificarentidadSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clasificarentidad-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'rangoInicial') ?>

    <?= $form->field($model, 'rangoFinal') ?>

    <?= $form->field($model, 'precioMN') ?>

    <?= $form->field($model, 'precioCUC') ?>

    <?php // echo $form->field($model, 'cantHombre') ?>

    <?php // echo $form->field($model, 'cantHoras') ?>

    <?php // echo $form->field($model, 'tipoParametro_id') ?>

    <?php // echo $form->field($model, 'tipoSistemaSeguridad_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
