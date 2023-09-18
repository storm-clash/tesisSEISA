<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PerimetralmallaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perimetralmalla-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'niveles') ?>

    <?= $form->field($model, 'ponderacion') ?>

    <?= $form->field($model, 'puntuacion') ?>

    <?php // echo $form->field($model, 'tamaño') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
