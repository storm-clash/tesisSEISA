<?php

use kartik\export\ExportMenu;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SistemasproteccionrayosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sistema Protección contra Rayos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sistemasproteccionrayos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Crear Sistema Protección contra Rayos', [
            'value'=>Url::to('index.php?r=sistemasproteccionrayos/create'),
            'class' => 'btn btn-success',
            'id'=>'BtnModalId',
            'data-toggle'=>'modal',
            'data-target'=>'#your-modal',
        ]) ?>
    </p>
    <?php
    Modal::begin(
        [
            'header'=>'<h4>Sistema Protección contra Rayos</h4>',
            'id'=>'your-modal',
            'size'=>'modal-md',

        ]
    );
    echo "<div id='modalContent'></div>";
    Modal::end();
    ?>
    <?php
    $gridColumns=[
        //'idsistemasProteccionRayos',
        'sistemasIntalados_idsistemasIntalados',
        'nivelesSepresores_id',
        'mastilPararayo_id',
        'pararrayos_id',
        'cantMediciones_id',
        'perimetralMalla_id',
        'tamanoBajante_id',
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

            //'idsistemasProteccionRayos',
            'sistemasIntalados_idsistemasIntalados',
            'nivelesSepresores_id',
            'mastilPararayo_id',
            'pararrayos_id',
            'cantMediciones_id',
            'perimetralMalla_id',
            'tamanoBajante_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
