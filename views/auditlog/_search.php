<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AuditlogSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auditlog-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'model') ?>

    <?= $form->field($model, 'action') ?>

    <?= $form->field($model, 'old') ?>

    <?= $form->field($model, 'new') ?>

    <?php // echo $form->field($model, 'at') ?>

    <?php // echo $form->field($model, 'by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
