<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Sistemaseguridadelectronica */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sistemaseguridadelectronica-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sistemasIntalados_idsistemasIntalados')->textInput() ?>

    <?= $form->field($model, 'cantSistemas_id')->textInput() ?>

    <?= $form->field($model, 'cantDispositivos_id')->textInput() ?>

    <?= $form->field($model, 'compEquiposElec_id')->textInput() ?>

    <?= $form->field($model, 'altura_id')->textInput() ?>

    <?= $form->field($model, 'condambSegElect_id')->textInput() ?>

    <?= $form->field($model, 'obstruccionEquipo_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
