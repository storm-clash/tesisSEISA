<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SistemasfijosextincionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sistemasfijosextincion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idsistemasFijosExtincion') ?>

    <?= $form->field($model, 'sistemasIntalados_idsistemasIntalados') ?>

    <?= $form->field($model, 'obstruccionEquipo_id') ?>

    <?= $form->field($model, 'cantidadAccesorios_id') ?>

    <?= $form->field($model, 'cantidadSistemasFijos_id') ?>

    <?php // echo $form->field($model, 'alturaMontaje_id') ?>

    <?php // echo $form->field($model, 'complejidadSistFijos_id') ?>

    <?php // echo $form->field($model, 'condAmbSistFijos_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
