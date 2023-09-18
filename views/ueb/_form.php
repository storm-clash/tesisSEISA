<?php

use app\models\Provincia;
use kartik\select2\Select2;
use yii\bootstrap4\Alert;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ueb */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-md-6" style="margin-left: 300px">
    <div class="card">
        <div class="card-header card-header-warning">
            <h4 class="card-title"><?=$this->title?></h4>
            <p class="card-category">Registro de UEBs</p>
        </div>
        <div class="card-body" style="padding: 15px">
            <div class="p-3">
                <?= yii\bootstrap4\Alert::widget(
                    [
                        'options' => [
                            'class' => 'alert-info alert-dismissible',
                        ],
                        'body' => Yii::t('usuario', 'Debe llenar todos los campos, Gracias'),
                    ]
                ) ?>

                <?php $form = ActiveForm::begin([
                    'enableAjaxValidation'=>true,
                    'enableClientValidation'=>true,
                ]); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => 20,'placeholder'=>'UEB ...']) ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => 50,'placeholder'=>'Calle 1ra...']) ?>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => 10,'placeholder'=>'535...']) ?>

    <?= $form->field($model, 'correo')->textInput(['maxlength' => 25,'placeholder'=>'name@example.com']) ?>


      <?= $form->field($model, 'provincia_id')->widget(Select2::classname(), [
      'data' => Provincia::combo(),
      'theme'=>Select2::THEME_BOOTSTRAP,
       'options' => ['placeholder' => 'Seleccione ...'],
       'pluginOptions' => [
                'allowClear' => true
           ],
       ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Atras', ['index'], ['class' => 'btn btn-danger'])?>
    </div>

    <?php ActiveForm::end(); ?>


            </div>
        </div>
    </div>


</div>
