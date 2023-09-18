<?php

use kartik\export\ExportMenu;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SistemaseguridadelectronicaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sistemas de Seguridad Electrónica';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sistemaseguridadelectronica-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Crear Sistema Tecnológico', [
            'value'=>Url::to('index.php?r=sistemaseguridadelectronica/create'),
            'class' => 'btn btn-success',
            'id'=>'BtnModalId',
            'data-toggle'=>'modal',
            'data-target'=>'#your-modal',
        ]) ?>
    </p>
    <?php
    Modal::begin(
        [
            'header'=>'<h4>Sistemas de Seguridad Electrónica</h4>',
            'id'=>'your-modal',
            'size'=>'modal-md',

        ]
    );
    echo "<div id='modalContent'></div>";
    Modal::end();
    ?>
    <?php
    $gridColumns=[
        //'idsistemaSeguridadElectronica',
        'sistemasIntalados_idsistemasIntalados',
        'cantSistemas_id',
        'cantDispositivos_id',
        'compEquiposElec_id',
        'altura_id',
        'condambSegElect_id',
        'obstruccionEquipo_id',
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

            //'idsistemaSeguridadElectronica',
            'sistemasIntalados_idsistemasIntalados',
            'cantSistemas_id',
            'cantDispositivos_id',
            'compEquiposElec_id',
            'altura_id',
            'condambSegElect_id',
            'obstruccionEquipo_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
