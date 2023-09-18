<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Auditlog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auditlog-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'action')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'old')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'new')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'at')->textInput() ?>

    <?= $form->field($model, 'by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
