<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BrigadaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="brigada-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idbrigada') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'cantHombres') ?>

    <?= $form->field($model, 'horasTrabajadas') ?>

    <?= $form->field($model, 'horasPlanificadas') ?>

    <?php // echo $form->field($model, 'idJefeBrigada') ?>

    <?php // echo $form->field($model, 'categoria_id') ?>

    <?php // echo $form->field($model, 'ueb_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
