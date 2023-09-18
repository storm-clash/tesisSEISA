<?php

use app\models\Cliente;
use app\models\Sistemasintalados;
use app\models\Brigada;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Ordenservicio */
/* @var $form yii\widgets\ActiveForm */
$plan=new \app\models\Planificacion();
//Recoger valores de la tabla Planificacion
$planificar=$plan->llenarAsignar($model->fecha);
$sistema=new Sistemasintalados();
$cliented=new Cliente();
$re=[];
$gg=[];
foreach ($planificar as $value) {//as key->$value

     $jesus= $sistema->comboidSist($value['sistemasIntalados_idsistemasIntalados']);
    $cliente=$cliented->comboId($jesus['cliente_idcliente']);

    if (empty($cliente) == false) {
        $re[] = $cliente;



    }
}

?>

<script type="text/javascript">
    $(document).ready(function () {


        $('#select').on('change',function () {
            var valor = document.getElementById('select');
            alert(valor);
            if (empty(valor) === true) {
                $(".btn btn-success").disable = true;
            }
        }

     });
</script>

<div class="ordenservicio-form">
    <div class="card">
        <div class="card-header card-header-warning">
            <h4 class="card-title"><?=$this->title?></h4>
            <p class="card-category">Registro de Orden de Servicio</p>
        </div>
        <div class="card-body" style="padding: 15px">
            <div class="p-3">

    <?php $form = ActiveForm::begin(); ?>




                <?= $form->field($model, 'cliente_idcliente')->widget(Select2::classname(), [
                    'data' => Cliente::clientesQNOrden(),
                    'options' => ['placeholder' => 'Seleccione ...',
                       // 'multiple'=>true,
                        'onchange'=>'
            $.post("http://mantenimiento.seisa/index.php/brigada/lists?id='.'"+$(this).val(),function(data){
           $("select#select" ).html(data); 
           });',
                        '
            $.post("http://mantenimiento.seisa/index.php/brigada/lists2?id='.'"+$(this).val(),function(data){
           $("select#selectos" ).html(data); 
           });'


                        ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]); ?>




                <?= $form->field($model, 'brigada_idbrigada')->widget(Select2::classname(), [
                    'data' => Brigada::combo(),
                    'options' => ['placeholder' => 'Seleccione ...',
                        'id'=>'select',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]); ?>



    <?= $form->field($model, 'fecha')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>


</div>
