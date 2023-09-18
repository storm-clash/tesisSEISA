<?php

use kartik\export\ExportMenu;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SistemasfijosextincionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sistemas Fijos de Extinción';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sistemasfijosextincion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Crear Sistemas Fijos de Extinción', [
            'value'=>Url::to('index.php?r=sistemasfijosextincion/create'),
            'class' => 'btn btn-success',
            'id'=>'BtnModalId',
            'data-toggle'=>'modal',
            'data-target'=>'#your-modal',
        ]) ?>
    </p>
    <?php
    Modal::begin(
        [
            'header'=>'<h4>Sistemas Fijos de Extinción</h4>',
            'id'=>'your-modal',
            'size'=>'modal-md',

        ]
    );
    echo "<div id='modalContent'></div>";
    Modal::end();
    ?>
    <?php
    $gridColumns=[
        //'idsistemasFijosExtincion',
        'sistemasIntalados_idsistemasIntalados',
        'obstruccionEquipo_id',
        'cantidadAccesorios_id',
        'cantidadSistemasFijos_id',
        'alturaMontaje_id',
        'complejidadSistFijos_id',
        'condAmbSistFijos_id',
    ];
    echo ExportMenu::widget([
        'dataProvider'=>$dataProvider,
        'columns'=>$gridColumns

    ]);
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idsistemasFijosExtincion',
            'sistemasIntalados_idsistemasIntalados',
            'obstruccionEquipo_id',
            'cantidadAccesorios_id',
            'cantidadSistemasFijos_id',
            'alturaMontaje_id',
            'complejidadSistFijos_id',
            'condAmbSistFijos_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
