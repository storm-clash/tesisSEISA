<?php

use app\models\Estado;
use kartik\select2\Select2;
use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Equipos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-md-6" style="margin-left: 300px">
    <div class="card">
        <div class="card-header card-header-warning">
            <h4 class="card-title"><?=$this->title?></h4>
            <p class="card-category">Registro de Equipos por Sistema de Seguridad</p>
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
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombreEquipo')->textInput(['maxlength' => 30]) ?>

    <?= $form->field($model, 'cantidad')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'precioCosto')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'precioIntalacion')->textInput(['maxlength' => 10]) ?>

    <?= $form->field($model, 'precioMantenimiento')->textInput(['maxlength' => 10]) ?>




     <?= $form->field($model, 'estado_id')->widget(Select2::classname(), [
        'data' => Estado::combo(),
         'options' => ['placeholder' => 'Seleccione ...'],
         'pluginOptions' => [
         'allowClear' => true
          ],
          ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>


</div>
