<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OfertaitemsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ofertaitems-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?= $form->field($model, 'clasificacion') ?>

    <?= $form->field($model, 'cantXano') ?>

    <?= $form->field($model, 'precioMN') ?>

    <?php // echo $form->field($model, 'precioCUC') ?>

    <?php // echo $form->field($model, 'ofertaComercial_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
