<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ofertaitems */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ofertaitems-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'clasificacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cantXano')->textInput() ?>

    <?= $form->field($model, 'precioMN')->textInput() ?>

    <?= $form->field($model, 'precioCUC')->textInput() ?>

    <?= $form->field($model, 'ofertaComercial_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
