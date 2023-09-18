<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ResponsablesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="responsables-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'primerApe') ?>

    <?= $form->field($model, 'segApellido') ?>

    <?= $form->field($model, 'carnet') ?>

    <?php // echo $form->field($model, 'cliente_idcliente') ?>

    <?php // echo $form->field($model, 'cargos_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
