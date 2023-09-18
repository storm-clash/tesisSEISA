<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EquiposHasOrdencompraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Equipos Has Ordencompras';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipos-has-ordencompra-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Equipos Has Ordencompra', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'equipos_idequipos',
            'ordenCompra_idordenCompra',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
