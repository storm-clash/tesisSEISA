<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClienteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cliente-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idcliente') ?>

    <?= $form->field($model, 'fechaAct') ?>

    <?= $form->field($model, 'codigoREEUP') ?>

    <?= $form->field($model, 'nombreCliente') ?>

    <?= $form->field($model, 'telefono') ?>

    <?php // echo $form->field($model, 'correo') ?>

    <?php // echo $form->field($model, 'direccion') ?>

    <?php // echo $form->field($model, 'cuentaBancariaCUP') ?>

    <?php // echo $form->field($model, 'agenciaBanCup') ?>

    <?php // echo $form->field($model, 'direcAgenciaCup') ?>

    <?php // echo $form->field($model, 'cuentaBanCUC') ?>

    <?php // echo $form->field($model, 'agenciaBanCUC') ?>

    <?php // echo $form->field($model, 'direccionAgentBanCuc') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'provincia_id') ?>

    <?php // echo $form->field($model, 'organismo_idorganismo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
