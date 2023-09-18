<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Equipos_Has_Proveedor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="equipos--has--proveedor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'equipos_idequipos')->textInput() ?>

    <?= $form->field($model, 'proveedor_idproveedor')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
