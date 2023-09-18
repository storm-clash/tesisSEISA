<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Emails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="emails-form">
    <div class="card">
        <div class="card-header card-header-warning">
            <h4 class="card-title"><?=$this->title?></h4>
            <p class="card-category">Registro de Correspondencia</p>
        </div>
        <div class="card-body" style="padding: 15px">
            <div class="p-3">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'receiver_email')->textInput(['maxlength' => true,'placeholder'=>'Ej: seisa@seisa.cu']) ?>

    <?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>


                <div class="form-row">
                    <div class="form-group col-md-4">
                        <?= $form->field($model, 'attachment')->widget(FileInput::classname(), [
                            'options' => [
                                'accept' => 'image/*',
                                'language'=>"es",
                                'attribute' => 'attachment_1',
                            ],
                            'pluginOptions'=>[
                                'browseLabel'=>'Buscar',
                                'removeLabel'=>'Remover',
                                'uploadLabel'=>'Subir',
                                'captionLabel'=>"",
                                'removeClass'=>'btn btn-danger',
                                'showUpload'=>false,
                                //'showCaption'=>false,
                                'showClose'=>false,
                                'dropZoneEnabled'=>false,
                                'browseIcon'=>'<i class="fas fa-camera-retro"></i>',
                                'maxFileSize'=>1024,
                                'msgSizeTooLarge'=>'File"{name}"(<b>{size}kb</b>) exceeds maximun allowed size<b>{maxSize} KB</b>.',


                            ],
                        ]) ;?>
                    </div>

                </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>
