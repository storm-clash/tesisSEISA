<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SistemaseguridadelectronicaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sistemaseguridadelectronica-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idsistemaSeguridadElectronica') ?>

    <?= $form->field($model, 'sistemasIntalados_idsistemasIntalados') ?>

    <?= $form->field($model, 'cantSistemas_id') ?>

    <?= $form->field($model, 'cantDispositivos_id') ?>

    <?= $form->field($model, 'compEquiposElec_id') ?>

    <?php // echo $form->field($model, 'altura_id') ?>

    <?php // echo $form->field($model, 'condambSegElect_id') ?>

    <?php // echo $form->field($model, 'obstruccionEquipo_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
