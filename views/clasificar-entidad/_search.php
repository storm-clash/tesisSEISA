<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClasificarEntidadSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clasificar-entidad-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idclasificarEntidad') ?>

    <?= $form->field($model, 'idJefeBrigada') ?>

    <?= $form->field($model, 'calificacion') ?>

    <?= $form->field($model, 'ubicacionInmueble') ?>

    <?= $form->field($model, 'alturaInmueble') ?>

    <?php // echo $form->field($model, 'cliente_idcliente') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
