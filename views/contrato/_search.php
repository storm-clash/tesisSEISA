<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ContratoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contrato-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cliente_idcliente') ?>

    <?= $form->field($model, 'monto') ?>

    <?= $form->field($model, 'dias') ?>

    <?= $form->field($model, 'firma') ?>

    <?php // echo $form->field($model, 'contrato') ?>

    <?php // echo $form->field($model, 'formasPago_id') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'motivo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
