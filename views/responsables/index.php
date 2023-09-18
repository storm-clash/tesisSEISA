<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ResponsablesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Responsables';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="responsables-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Responsables', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',
            'primerApe',
            'segApellido',
            'carnet',
            //'cliente_idcliente',
            //'cargos_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
