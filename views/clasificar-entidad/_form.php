<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Cliente;

/* @var $this yii\web\View */
/* @var $model app\models\ClasificarEntidad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clasificar-entidad-form">


    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'ubicacionInmueble')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alturaInmueble')->textInput() ?>

    <?= $form->field($model,'cliente_idcliente')->dropDownList(
        ArrayHelper::map(Cliente::find()->all(),'idcliente','nombreCliente'),
        ['prompt'=>'Seleccione Cliente de Empresa']
    )?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
