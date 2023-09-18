<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EquiposHasOrdencompra */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipos-has-ordencompra-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'equipos_idequipos')->textInput() ?>

    <?= $form->field($model, 'ordenCompra_idordenCompra')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
