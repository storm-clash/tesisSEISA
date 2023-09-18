<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OfertacomercialSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ofertacomercial-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cliente_idcliente') ?>

    <?= $form->field($model, 'ueb_id') ?>

    <?= $form->field($model, 'numeroDoc') ?>

    <?= $form->field($model, 'fecha') ?>

    <?php // echo $form->field($model, 'fechaVencimiento') ?>

    <?php // echo $form->field($model, 'elaborado') ?>

    <?php // echo $form->field($model, 'cargo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
