<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RegistromantenimientosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="registromantenimientos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idregistroMantenimientos') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'incidencias') ?>

    <?= $form->field($model, 'cliente_idcliente') ?>

    <?= $form->field($model, 'brigada_idbrigada') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
