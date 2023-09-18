<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClasificarEntidadSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clasificar Entidad';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clasificar-entidad-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::button('Clasificar Instalación', [
            'value'=>Url::to('index.php?r=clasificar-entidad/create'),
            'class' => 'btn btn-success',
            'id'=>'BtnModalId',
            'data-toggle'=>'modal',
            'data-target'=>'#your-modal',
        ]) ?>
    </p>
    <?php
    Modal::begin(
        [
            'header'=>'<h4>Clasificación</h4>',
            'id'=>'your-modal',
            'size'=>'modal-md',

        ]
    );
    echo "<div id='modalContent'></div>";
    Modal::end();
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idclasificarEntidad',
            'idJefeBrigada',
            'calificacion',
            'ubicacionInmueble',
            'alturaInmueble',
            'clienteIdcliente.nombreCliente',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
