<?php

use app\models\Ofertaitems;
use app\models\Sistemasintalados;
use app\models\Tiposistemaseguridad;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Planificacion */
/* @var $form yii\widgets\ActiveForm */
$request=Yii::$app->request;
$id=$request->get('id');

$plan=new \app\models\Planificacion();
$sistema=\app\models\Planificacion::find()->where(['idplanificacion'=>$id])->one();





?>


<div class="planificacion-form">
    <div id="master">
        <div class="card">
            <div class="card-header card-header-warning">
                <h4 class="card-title"><?=$this->title?></h4>
                <p class="card-category">Planificación de los Mantenimientos</p>
            </div>
            <div class="card-body" style="padding: 15px">
                <div class="p-3">

    <?php $form = ActiveForm::begin(); ?>





                    <?= $form->field($model, 'sistemasIntalados_idsistemasIntalados')->widget(Select2::classname(), [
                        'data' => Sistemasintalados::comboJesus($sistema['sistemasIntalados_idsistemasIntalados']),
                        'options' => ['placeholder' => 'Seleccione ...',
                            'id'=>'select',
                            'name'=>'sistemas',

                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]); ?>

                    <?= $form->field($model,'fecha')->widget(DatePicker::className(),[
                        'value'=>date('y-m-d'),

                        'dateFormat'=>'php:y-m-d',
                        'clientOptions' => [
                            'value'=>date('y-m-d'),




                        ],

                        'options'=>[
                            'class'=>'form-control',
                            'placeholder'=>'Seleccione ...',
                            'showOn'=>'button',
                            'autoSize'=>true,

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
</div>
