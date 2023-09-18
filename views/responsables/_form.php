<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Responsables */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
$request=Yii::$app->request;
$id=$request->get('id');
$respo=\app\models\Responsables::find()->where(['cliente_idcliente'=>$id])->all();
foreach ($respo as $val){
    if($val['cargos_id']== $_GET("cargo")){
        \yii\bootstrap4\Alert::widget([
                'options'=>[
                  'class'=>'alert-info',
                ],
            'body'=>'Este Cliente ya tiene registrado'.\app\models\Cargos::comboPro($val['cargos_id']).' ',
        ]);

    }
}
?>
<div class="responsables-form">
    <div class="card">
        <div class="card-header card-header-warning">
            <h4 class="card-title"><?=$this->title?></h4>
            <p class="card-category">Registro de Responsables</p>
        </div>
        <div class="card-body" style="padding: 15px">
            <div class="p-3">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'primerApe')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'segApellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'carnet')->textInput() ?>




                <?= $form->field($model, 'cargos_id')->widget(Select2::classname(), [
                    'data' => \app\models\Cargos::combo(),
                    'options' => ['placeholder' => 'Seleccione ...'],
                    'id'=>'cargo',
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
</div>
</div>
</div>

</div>
