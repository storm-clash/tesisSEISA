
<?php
use yii\bootstrap4\Modal;
use yii\helpers\Html;


?>

<div style="float: right">  <?= Html::a('Modificar Planificacion', ['planificacion/index'], ['class' => 'btn btn-danger'])?> </div>

<div class="container-fluid">

<?php
Modal::begin(
    [
         //'header'=>'<h4>Órdenes de Servicio</h4>',
         'title'=>'Órdenes de Servicio',

        'id'=>'modal',
        'size'=>'modal-md',
        //'clientOptions'=>['backdrop'=>'static']

    ]
);
echo "<div id='modalContent'></div>";
Modal::end();
?>




<div id="calendar">
<?= \yii2fullcalendar\yii2fullcalendar::widget(array(
       // 'id'=>'calendar',
    'options'=>[
            'lang'=>'es',
    ],
    'events'=> $planificacion,


));
?>
</div>



</div>
