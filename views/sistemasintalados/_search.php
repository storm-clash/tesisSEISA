<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SistemasintaladosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sistemasintalados-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idsistemasIntalados') ?>

    <?= $form->field($model, 'cliente_idcliente') ?>

    <?= $form->field($model, 'tipoSistemaSeguridad_id') ?>

    <?= $form->field($model, 'local') ?>

    <?= $form->field($model, 'clasificacion') ?>

    <?php // echo $form->field($model, 'clasificarentidad_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
