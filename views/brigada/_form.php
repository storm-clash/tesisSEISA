<?php


use app\models\Categoria;
use app\models\Ueb;
use app\models\Provincia;
use app\models\Profile;
use app\models\AuthAssignment;
use kartik\select2\Select2;
use yii\bootstrap4\Alert;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Brigada */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
$request=Yii::$app->request;
$id=$request->get('id');

$ueb=new Ueb();
$empresa=$ueb->Provincia($id);

$prov=new Provincia();
$provincia=$prov->provinciaXid($empresa['provincia_id']);

$auth=new AuthAssignment();
$asig=$auth->combo();

$uu=[];
$brig=\app\models\Brigada::find()->all();
$pro=new Profile();
foreach ($asig as $value) {

  $variante = $pro->comboXprovincia($provincia['id'], $value['user_id']);

    if(empty($variante)==false  ) {
     //&& $variante['name']!=$exc['idJefeBrigada']

        $uu[] = $variante;
    }

}




?>

<div class="col-md-6" style="margin-left: 300px">
    <div class="card">
        <div class="card-header card-header-warning">
            <h4 class="card-title"><?=$this->title?></h4>
            <p class="card-category">Registro de Brigada por Ueb</p>
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

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true,'placeholder'=>' ...']) ?>

    <?= $form->field($model, 'cantHombres')->textInput(['placeholder'=>' Valor mayor de 1...']) ?>

    <?= $form->field($model, 'horasTrabajadas')->textInput(['class'=>'form-control class-content-title_series','disabled'=>true,'value'=>'Valor por defecto es 0']) ?>

    <?= $form->field($model, 'horasPlanificadas')->textInput(['class'=>'form-control class-content-title_series','disabled'=>true,'value'=>'Valor por defecto es 0']) ?>


    <?= $form->field($model, 'idJefeBrigada')->widget(Select2::classname(), [
        'data' =>$uu,
    'theme'=>Select2::THEME_BOOTSTRAP,
     'options' => ['placeholder' => 'Seleccione ...'],
     'pluginOptions' => [
         'allowClear' => true
       ],
    ]); ?>


    <?= $form->field($model, 'categoria_id')->widget(Select2::classname(), [
        'data' => Categoria::combo(),
        'theme'=>Select2::THEME_BOOTSTRAP,
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
