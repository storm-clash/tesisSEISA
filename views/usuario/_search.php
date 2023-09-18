<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idusuario') ?>

    <?= $form->field($model, 'nombreUsuario') ?>

    <?= $form->field($model, 'primerApellido') ?>

    <?= $form->field($model, 'segundoApellido') ?>

    <?= $form->field($model, 'codigoSEISA') ?>

    <?php // echo $form->field($model, 'contrasena') ?>

    <?php // echo $form->field($model, 'user') ?>

    <?php // echo $form->field($model, 'auth_key') ?>

    <?php // echo $form->field($model, 'contrasena_reset_token') ?>

    <?php // echo $form->field($model, 'correo') ?>

    <?php // echo $form->field($model, 'rol_idrol') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
