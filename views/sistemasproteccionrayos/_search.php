<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SistemasproteccionrayosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sistemasproteccionrayos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idsistemasProteccionRayos') ?>

    <?= $form->field($model, 'sistemasIntalados_idsistemasIntalados') ?>

    <?= $form->field($model, 'nivelesSepresores_id') ?>

    <?= $form->field($model, 'mastilPararayo_id') ?>

    <?= $form->field($model, 'pararrayos_id') ?>

    <?php // echo $form->field($model, 'cantMediciones_id') ?>

    <?php // echo $form->field($model, 'perimetralMalla_id') ?>

    <?php // echo $form->field($model, 'tamanoBajante_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
