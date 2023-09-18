<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Sistemasproteccionrayos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sistemasproteccionrayos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sistemasIntalados_idsistemasIntalados')->textInput() ?>

    <?= $form->field($model, 'nivelesSepresores_id')->textInput() ?>

    <?= $form->field($model, 'mastilPararayo_id')->textInput() ?>

    <?= $form->field($model, 'pararrayos_id')->textInput() ?>

    <?= $form->field($model, 'cantMediciones_id')->textInput() ?>

    <?= $form->field($model, 'perimetralMalla_id')->textInput() ?>

    <?= $form->field($model, 'tamanoBajante_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
