<?php

use yii\bootstrap4\Alert;
use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Registromantenimientos */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
$request=Yii::$app->request;
$id=$request->get('id');
?>

<div class="registromantenimientos-form">
    <div class="card">
        <div class="card-header card-header-warning">
            <h4 class="card-title"><?=$this->title?></h4>
            <p class="card-category">Registro de Mantenimientos</p>
        </div>
        <div class="card-body" style="padding: 15px">
            <div class="p-3">
                <?= yii\bootstrap4\Alert::widget(
                    [
                        'options' => [
                            'class' => 'alert-info alert-dismissible',
                        ],
                        'body' => Yii::t('usuario', 'Debe Llenar todos los campos, Gracias'),
                    ]
                ) ?>

    <?php $form = ActiveForm::begin(); ?>




    <?= $form->field($model, 'incidencias')->textInput(['maxlength' => 250])  ?>



    <div class="form-group">
        <?= Html::submitButton('Registrar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>


</div>
