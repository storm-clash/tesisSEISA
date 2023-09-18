<?php

use kartik\select2\Select2;
use kartik\bs4dropdown\Dropdown;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Tiposistemaseguridad;
use app\models\Cliente;
use app\models\Altura;
use app\models\Cantsistemas;
use app\models\Cantdispositivos;
use app\models\Compequiposelec;
use app\models\Condambsegelect;
use app\models\Obstruccionequipo;
//Sistema Pararrayos
use app\models\Nivelessepresores;
use app\models\Mastilpararayo;
use app\models\Tamanobajante;
use app\models\Perimetralmalla;
use app\models\Pararrayos;
use app\models\Cantmediciones;
//Sistemas de Extintores
use app\models\Alturamontaje;
use app\models\Complejidadsistfijos;
use app\models\Condambsistfijos;
use app\models\Cantidadaccesorios;
use app\models\Cantidadsistemasfijos;

/* @var $this yii\web\View */
/* @var $model app\models\Sistemasintalados */
/* @var $form yii\widgets\ActiveForm */
?>
<script src="/web/js/sistemas/ocultar.js"></script>

<script type="text/javascript">


    $(document).ready(function () {


        $('#select').on('change',function () {
            var valor=document.getElementById('select');
            var selectValor=valor.options[valor.selectedIndex].text;

            if((selectValor==='Sistemas de Alarma Contra Intrusos')||(selectValor==='Sistema Control de Acceso')||(selectValor==='Circuito Cerrado de Televisión')||(selectValor==='Sistema Automático de Detección de Incendios')){

                $('#sistemaExtintores').hide();

                $('#sistemaRayo').hide();


                $('#sistemaTec').show();

            }
              else if(selectValor==='Sistema de Protección Contra Rayos'){
              // alert('5');
                $('#sistemaTec').hide();
                $('#sistemaExtintores').hide();

                $('#sistemaRayo').show();

               } else if ((selectValor==='Sistema de Suministro de Agua Contra Incendio')||(selectValor==='Sistemas Portátiles de Extinción')) {

                $('#sistemaTec').hide();
                $('#sistemaRayo').hide();

                $('#sistemaExtintores').show();
            }




        });
    });

</script>


<div class="sistemasintalados-form" id="">
<div id="master">
    <div class="card">
        <div class="card-header card-header-warning">
            <h4 class="card-title"><?=$this->title?></h4>
            <p class="card-category">Registro de Sistemas de Seguridad</p>
        </div>
        <div class="card-body" style="padding: 15px">
            <div class="p-3">

    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'cliente_idcliente')->widget(Select2::classname(), [
        'data' => Cliente::comboSoloClientesSinSistemas(),
        'theme'=>Select2::THEME_BOOTSTRAP,
        'options' => ['placeholder' => 'Seleccione ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'tipoSistemaSeguridad_id')->widget(Select2::classname(), [
        'data' => Tiposistemaseguridad::combo(),
        'options' => ['placeholder' => 'Seleccione ...','id'=>'select',],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

     <?= $form->field($model, 'local')->textInput(['maxlength' => 20]) ?>

    <div id="sistemaTec" style="display: none">
    <?= $form->field($model, 'idaltura')->widget(Select2::classname(), [
        'data' => Altura::combo(),
        'options' => ['placeholder' => 'Seleccione ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

        <?= $form->field($model, 'idCantSis')->widget(Select2::classname(), [
            'data' => Cantsistemas::combo(),
            'options' => ['placeholder' => 'Seleccione ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>
        <?= $form->field($model, 'idCant')->widget(Select2::classname(), [
            'data' => Cantdispositivos::combo(),
            'options' => ['placeholder' => 'Seleccione ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>
        <?= $form->field($model, 'idComp')->widget(Select2::classname(), [
            'data' => Compequiposelec::combo(),
            'options' => ['placeholder' => 'Seleccione ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>
        <?= $form->field($model, 'idAmb')->widget(Select2::classname(), [
            'data' => Condambsegelect::combo(),
            'options' => ['placeholder' => 'Seleccione ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>
        <?= $form->field($model, 'idObs')->widget(Select2::classname(), [
            'data' => Obstruccionequipo::combo(),
            'options' => ['placeholder' => 'Seleccione ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>
     </div>
    <div id="sistemaRayo" style="display: none">
        <?= $form->field($model, 'idsupresor')->widget(Select2::classname(), [
            'data' => Nivelessepresores::combo(),
            'options' => ['placeholder' => 'Seleccione ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>
        <?= $form->field($model, 'idmastil')->widget(Select2::classname(), [
            'data' => Mastilpararayo::combo(),
            'options' => ['placeholder' => 'Seleccione ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>
        <?= $form->field($model, 'idmalla')->widget(Select2::classname(), [
            'data' => Perimetralmalla::combo(),
            'options' => ['placeholder' => 'Seleccione ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>
        <?= $form->field($model, 'idbajante')->widget(Select2::classname(), [
            'data' => Tamanobajante::combo(),
            'options' => ['placeholder' => 'Seleccione ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>
        <?= $form->field($model, 'idpararrayo')->widget(Select2::classname(), [
            'data' => Pararrayos::combo(),
            'options' => ['placeholder' => 'Seleccione ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>
        <?= $form->field($model, 'idcantMed')->widget(Select2::classname(), [
            'data' => Cantmediciones::combo(),
            'options' => ['placeholder' => 'Seleccione ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>

    </div >

    <div id="sistemaExtintores" style="display: none">
        <?= $form->field($model, 'idobsExtintor')->widget(Select2::classname(), [
            'data' => Obstruccionequipo::combo(),
            'options' => ['placeholder' => 'Seleccione ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>
        <?= $form->field($model, 'idalturaMontaje')->widget(Select2::classname(), [
            'data' => Alturamontaje::combo(),
            'options' => ['placeholder' => 'Seleccione ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>
        <?= $form->field($model, 'idcomplejidad')->widget(Select2::classname(), [
            'data' => Complejidadsistfijos::combo(),
            'options' => ['placeholder' => 'Seleccione ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>
        <?= $form->field($model, 'idambiente')->widget(Select2::classname(), [
            'data' => Condambsistfijos::combo(),
            'options' => ['placeholder' => 'Seleccione ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>
        <?= $form->field($model, 'idaccesorios')->widget(Select2::classname(), [
            'data' => Cantidadaccesorios::combo(),
            'options' => ['placeholder' => 'Seleccione ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>
        <?= $form->field($model, 'idsistemas')->widget(Select2::classname(), [
            'data' => Cantidadsistemasfijos::combo(),
            'options' => ['placeholder' => 'Seleccione ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); ?>


    </div>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>


    <?php ActiveForm::end(); ?>
    <script src="/web/js/sistemas/ocultar.js"></script>
</div>
        </div>
    </div>
</div>


</div>
